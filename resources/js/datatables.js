
$(function() {
$('#' + $('.basic_datatable').attr('id')).DataTable({
    dom: 'frtipB',
    scrollX: true,
    buttons: [
        { extend: 'copy', className: 'hidebuttons' },
        { extend: 'csv', className: 'hidebuttons' },
        { extend: 'excel', className: 'hidebuttons' },
        { extend: 'pdf', className: 'hidebuttons' },
        { extend: 'print', className: 'hidebuttons' }
    ]
} );

// Make sure there are not multiple datatables on one page

$('.datatable_copy_button').on('click' , function(){ $('.buttons-copy').trigger("click"); });
$('.datatable_csv_button').on('click' , function(){ $('.buttons-csv').trigger("click"); });
$('.datatable_excel_button').on('click' , function(){ $('.buttons-excel').trigger("click"); });
$('.datatable_pdf_button').on('click' , function(){ $('.buttons-pdf').trigger("click"); });
$('.datatable_print_button').on('click' , function(){ $('.buttons-print').trigger("click"); });

});
