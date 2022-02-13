'use strict';
// Class definition

var KTDatatableHtmlTableDemo = function() {
  // Private functions

  // demo initializer
  var demo = function() {

    var datatable = $('#kt_datatable').KTDatatable({
      data: {
        saveState: false
      },
      search: {
        input: $('#kt_datatable_search_query'),
        key: 'generalSearch',
      },
      layout: {
        class: 'datatable-bordered',
      },
      rows : {
          autoHide: false
        },
      columns: [
        {
          field: 'Status',
          title: 'Status',
          autoHide: false,
          // callback function support for column rendering
          template: function(row) {
            var status = {
              'New Order': {
                'title': 'New Order',
                'color': '80808F',
              },
              'In Progress': {
                'title': 'In Progress',
                'color': '007bff',
              },
              'Delivered': {
                'title': 'Delivered',
                'color': '28a745',
              },
              'Waiting For Delivery': {
                'title': 'Waiting For Delivery',
                'color': 'ffc107',
              },
              'Cancelled': {
                'title': 'Cancelled',
                'color': 'F64E60',
              },
              'Waiting For Pickup': {
                'title': 'Waiting For Pickup',
                'color': 'fd7e14',
              },
            };
            return `<span class="label label-primary label-inline " style="background-color: #${status[row.Status].color} !important">${ status[row.Status].title}</span>`;

          },
        },

      ],
    });

    $('#kt_datatable_search_status').on('change', function() {
      datatable.search($(this).val(), 'Status');
    });



    $('#kt_datatable_search_status').selectpicker();

  };

  return {
    // Public functions
    init: function() {
      // init dmeo
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  KTDatatableHtmlTableDemo.init();
});
