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

<style>
.button {
  padding: 15px 25px;
  font-size: 22px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

<style type="text/css">
      td.details-control {
            text-align:center;
            color:forestgreen;
            cursor: pointer;
        }
        tr.shown td.details-control {
            text-align:center; 
            color:red;
        }

       
</style>

    <script>
     $(function () {
      /* Formatting function for row details - modify as you need */
      function format ( d ) {
          // `d` is the original data object for the row
          return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
              '<tr>'+
                  '<td>Full name:</td>'+
                  '<td>'+d.name+'</td>'+
              '</tr>'+
              '<tr>'+
                  '<td>Extension number:</td>'+
                  '<td>'+d.quantity+'</td>'+
              '</tr>'+
              '<tr>'+
                  '<td>Extra info:</td>'+
                  '<td>And any further details here (images etc)...</td>'+
              '</tr>'+
          '</table>';
      }

  var table = $("#basket-table").DataTable( {
      "searching": false,
      "lengthChange": false,
      "pageLength": 5,
      "info": false,

      "columns": [
          {
               "className": 'details-control',
               "orderable": false,
               "data": null,
               "defaultContent": '',
               "render": function () {
                   return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
               },
               width:"15px"
           },
          { "data": "name" },
          { "data": "quantity" },
          { "data": "unit_price" },
          { "data": "total" }
      ],
      "order": [[1, 'asc']]
    });

  // Add event listener for opening and closing details
    $('#basket-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
       var tdi = tr.find("i.fa");
       var row = table.row(tr);

       if (row.child.isShown()) {
           // This row is already open - close it
           row.child.hide();
           tr.removeClass('shown');
           tdi.first().removeClass('fa-minus-square');
           tdi.first().addClass('fa-plus-square');
       }
       else {
           // Open this row
           row.child(format(row.data())).show();
           tr.addClass('shown');
           tdi.first().removeClass('fa-plus-square');
           tdi.first().addClass('fa-minus-square');
       }
    });
});
</script>

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
                        self.isItemDown = false;
                        this.afterAddWidget = function (items) {
                            if (grid == null) {
                                grid = $(componentInfo.element).find('.grid-stack').gridstack({
                                    auto: false,
                                    float: false,
                                    animate: true,
                                    height: 5,

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
               <div data-bind="style: {background: $data.backgroundColor}" class="grid-stack-item-content button"><p data-bind='text: $data.display_name'></p></div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>


@endsection
