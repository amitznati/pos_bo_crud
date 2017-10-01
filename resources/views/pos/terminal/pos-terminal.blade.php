@extends('pos/layout')

@section('after_styles')
<link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
<style type="text/css">
    
</style>
@endsection

@section('sidebar-collapse')
sidebar-collapse
@endsection

@section('header')
    <section class="content-header">
      <h1>
        myPos<small>Point Of Sale</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('pos/home') }}">POS Home</a></li>
        <li>{{$employee->person->full_name}}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
      <div class="col-md-4">
          @include('pos.terminal.basket')
      </div>
      <div class="col-md-8">
        @include('pos.terminal.menu-grid')
      </div>
    </div>
    <div class="row">
      <div class="col-ms-12">
        @include('pos.terminal.actions')
      </div>
    </div>
@endsection

@section('after_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/gridstack.all.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/jquery.ui.touch.js"></script>
    @include('pos.terminal.pos_ko_models')

    <script type="text/javascript">
        ko.components.register('dashboard-grid', {
            viewModel: {
                createViewModel: function (controller, componentInfo) {
                    var ViewModel = function (controller, componentInfo) {
                        var grid = null;

                        this.widgets = controller.widgets;
                        
                        this.afterAddWidget = function (items) {
                          console.log('here')
                            if (grid == null) {
                                grid = $(componentInfo.element).find('.grid-stack').gridstack({
                                    auto: false,
                                    float: true,
                                    height: 7,

                                }).data('gridstack');
                            }
                            

                            var item = _.find(items, function (i) { return i.nodeType == 1 });
                            grid.addWidget(item);
                            grid.movable('.grid-stack-item', false);
                            grid.resizable('.grid-stack-item', false);

                            $($(item).find('.jscolor')[0]).change(function(){
                                $($(item).find('.grid-stack-item-content')[0]).css('background',hexToRgb($(this).val()));
                            })

                            
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
                
                this.widgets = ko.observableArray({!!$currentMenu->containsDisplayInfos!!});
                this.currentMenu = ko.observable({!!$currentMenu!!});
                this.currentOrder = ko.observable(new Order());

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
   <template id="gridstack-template">
        <div class="grid-stack grid-stack-static" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">
           <div class="grid-stack-item" data-bind="attr: {'display_name': $data.display_name, 'displayable_type': $data.displayable_type, 'displayable_id': $data.displayable_id, 'data-gs-x': $data.x, 'data-gs-y': $data.y, 'data-gs-width': $data.width, 'data-gs-height': $data.height, 'data-gs-auto-position': $data.auto_position}">
               <div data-bind="style: {background: $data.backgroundColor}" class="grid-stack-item-content"><p data-bind='text: $data.display_name'></p></div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>

@endsection