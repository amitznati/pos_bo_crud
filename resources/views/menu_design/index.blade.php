@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
    <script src="{{asset('jscolor-2.0.4')}}/jscolor.min.js"></script>


    <style type="text/css">
        .grid-stack {
            /*background: lightgoldenrodyellow;*/
        }
        .grid-stack-item{
            

        }
        .grid-stack-item-content{
            
            text-align: center;
            vertical-align: middle;
            
        }

       

    </style>
@endsection
@section('content')

    <div class="content">
        <div class="clearfix"></div>

        
        <div class="clearfix">
            <div class="box-body">
            <a data-bind="click: showItemSelect, text: showText" class="btn btn-primary"></a>
            <a data-bind="click: save" class='btn btn-primary'><i class="glyphicon glyphicon-eye-open"></i>שמור</a>
            </div>
        </div>
        <div>
            <p data-bind="text: currentMenu().name"></p>
        </div>
        <div class="grid-stack-div">                  
            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body" style="height: 720px;">
                    <div class="row-fluid" >
                        <div class="col-sm-12">
                            <div data-bind="visible: itemSelectVisible()==false, component: {name: 'dashboard-grid', params: $data}"></div>
                            <div data-bind="visible: itemSelectVisible">
                               @include('menu_design.select_item')
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
</div>
    
@endsection

@section('after_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/gridstack.all.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/jquery.ui.touch.js"></script>

    <script type="text/javascript">
        ko.components.register('dashboard-grid', {
            viewModel: {
                createViewModel: function (controller, componentInfo) {
                    var ViewModel = function (controller, componentInfo) {
                        var grid = null;

                        this.widgets = controller.widgets;
                        
                        this.color = ko.observable('ff6699');
                        this.afterAddWidget = function (items) {
                            if (grid == null) {
                                grid = $(componentInfo.element).find('.grid-stack').gridstack({
                                    auto: false,
                                    float: true,
                                    height: 9
                                }).data('gridstack');
                            }
                            

                            var item = _.find(items, function (i) { return i.nodeType == 1 });
                            grid.addWidget(item);

                            $($(item).find('.jscolor')[0]).change(function(){
                                $($(item).find('.grid-stack-item-content')[0]).css('background',hexToRgb($(this).val()));
                            })

                            jscolor.installByClassName('jscolor');
                            ko.utils.domNodeDisposal.addDisposeCallback(item, function () {
                                grid.removeWidget(item);
                            });
                        };
                    };

                    return new ViewModel(controller, componentInfo);
                }
            },
            template: { element: 'gridstack-template' }
        });

        $(function () {
            var Controller = function (widgets) {
                var self = this;
                
                this.itemSelectVisible = ko.observable(false);
                this.showText = ko.observable('הוסף פריט');
                this.widgets = ko.observableArray({!!$currentMenu->containsDisplayInfos!!});
                this.products = ko.observableArray({!!$products!!});
                this.menus = ko.observableArray({!!$menus!!});
                this.currentMenu = ko.observable({!!$currentMenu!!});

                this.deleteWidget = function (item) {
                    self.widgets.remove(item);
                    console.log(item);
                    return false;
                };

                this.showItemSelect = function(){
                    self.itemSelectVisible(!self.itemSelectVisible());
                    self.showText('הוסף פריט');
                    if(self.itemSelectVisible())
                        self.showText('בטל הוספת פריט');
                }

                this.save = function(){
                    this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        var bg = el.find('.grid-stack-item-content').css('background');
                        bg = bg.substring(0,bg.indexOf(')')+1);
                        return {
                            x: node.x,
                            y: node.y,
                            width: node.width,
                            height: node.height,
                            displayable_type: el.attr('displayable_type'),
                            displayable_id: el.attr('displayable_id'),
                            display_name: el.attr('display_name'),
                            backgroundColor: bg

                        };
                    }, this);
                    var nodes = JSON.stringify(this.serializedData, null, '    ');
                    $.post("{{route('admin.menu_design.saveMenu') }}",
                    {
                        nodes: nodes,
                        menu_id: self.currentMenu().id
                    },
                    function(data, status){
                        if(data == "success"){
                            window.location.replace('{{route('admin.menu_design') }}?menu_id='+self.currentMenu().id);
                        }
                        else
                            console.log("Error");
                    })
                }

                this.addItem = function(item,type){
                    self.widgets.push({
                        x: 0,
                        y: 0,
                        width: 2,
                        height: 2,
                        auto_position: true,
                        displayable_type: type,
                        display_name: item.name,
                        displayable_id: item.id,
                        backgroundColor: ko.observable('rgb(72, 149, 212)'),
                    });
                    self.showItemSelect();
                    return false;
                }
                this.productSelect = function(item){
                    return self.addItem(item,'App\\Models\\Product');
                }
                this.menuSelect = function(item){
                    return self.addItem(item,'App\\Models\\Menu');
                }

                this.openMenu = function(menu){
                    //console.log(menu);
                    ko.utils.arrayForEach(self.menus(),function(m){
                        if(menu.displayable_id == m.id){
                            self.currentMenu(m);
                            self.widgets(m.contains_display_infos)
                        }
                    });
                }

            };
            var widgets = [];
            var controller = new Controller(widgets);
            ko.applyBindings(controller);
        });
    </script>
    </script>
    <template id="gridstack-template">
        <div class="grid-stack" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">
           <div class="grid-stack-item" data-bind="attr: {'display_name': $data.display_name, 'displayable_type': $data.displayable_type, 'displayable_id': $data.displayable_id, 'data-gs-x': $data.x, 'data-gs-y': $data.y, 'data-gs-width': $data.width, 'data-gs-height': $data.height, 'data-gs-auto-position': $data.auto_position}">
               <div data-bind="style: {background: $data.backgroundColor}" class="grid-stack-item-content"><p data-bind='text: $data.display_name'></p>
               <div  style="bottom: 1px;position: absolute;left: 1px;">
                    <button class="btn btn-danger btn-xs" data-bind="click: $root.deleteWidget"><i class="glyphicon glyphicon-trash"></i></button>
                   
                    <button  data-bind="click: $root.openMenu, visible: $data.displayable_type == 'App\\Models\\Menu'" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i></button>
                  
                    Color: <input data-bind="value: $data.backgroundColor" style="width: 50px;" class="jscolor btn btn-default btn-xs">
               </div>
               </div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>

    <script>
        $('.grid-stack').addTouch();
        function hexToRgb(hex) {
            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? 'rgb( '+parseInt(result[1], 16)+', '+parseInt(result[2], 16)+', '+parseInt(result[3], 16)+')'
                 : null;
        }
    </script>

@endsection