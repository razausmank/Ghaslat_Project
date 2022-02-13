
$("#find_order_form").submit(function (e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');
    $('.spinner_over_screen_2').show();
    $('#order_search_details').hide();
    $('#no_order_found').hide();
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            console.log(data) ;
            if ( data )
            {
                console.log(data);
                populateSearchScreenData(data);
                $('#order_search_details').show();

            } else {
                $('#no_order_found').show();
            }
        },
        complete: function () {
            $('.spinner_over_screen_2').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen_2').hide();
        }
    });


});

$('#order_print_via_search_screen').on('click', function (e) {
    e.preventDefault();
    $('.spinner_over_screen_2').show();
    console.log($(this).attr('href'));
    getDataForPrint($(this).attr('href'), true , 'spinner_over_screen_2') ;
});

function populateSearchScreenData(data) {
    $('#search_screen_order_date').text(moment(data.created_at).format('DD MMMM YYYY'));
    $('#search_screen_order_status').val(data.status);
    $('#search_screen_customer_name').text(data.customer.name);
    $('#search_screen_payment_type').val(data.payment_option);
    $('#search_screen_payment_received').val(data.payment_received == "1" ? 1 : 0);
    $('#search_screen_order_number').text(data.order_number ?? '--------');

    $('#search_screen_items_list').empty();
    subtotal = 0;
    for (i = 0; i < data.products.length; i++) {
        subtotal += Number(data.products[i].pivot.quantity * data.products[i].pivot.price, 2);
        $('#search_screen_items_list').append(`
        <tr class="font-weight-boldest">
            <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                    <div class="symbol-label"
                        style="background-image: url('${data.products[i].image ? asset_url + data.products[i].image.replace("public", "storage") : asset_url + 'assets/media/svg/icons/Clothes/Hanger.svg'}')">
                    </div>
                </div>
                ${data.products[i].name}
            </td>
            <td class=" border-0 text-right pt-7 align-middle">${Number(data.products[i].pivot.quantity, 2)}</td>
            <td class=" border-0 text-right pt-7 align-middle">AED ${Number(data.products[i].pivot.price, 2).toFixed(2)}</td>
            <td class=" border-0 text-primary pr-0 pt-7 text-right align-middle">AED ${Number(data.products[i].pivot.quantity * data.products[i].pivot.price, 2).toFixed(2)}</td>
        </tr>
        `);
    }
    $('#search_screen_order_history').empty();
    for (i = 0; i < data.order_logs.length; i++) {
        $('#search_screen_order_history').append(`
        <tr >
            <td >${data.order_logs[i].status}</td>
            <td >${data.order_logs[i].payment_option}</td>
            <td >${data.order_logs[i].payment_received ? 'No' : 'Yes'}</td>
            <td > ${data.order_logs[i].updated_by.name}</td>
            <td > ${moment(data.order_logs[i].updated_at).format('DD MMMM YYYY')}</td>
        </tr>
        `);
    }

    $('#search_screen_sub_total').text('AED ' + Number(data.sub_total, 2).toFixed(2));

    $('#search_screen_discount_amount').text('AED ' + Number(data.discount_in_money, 2).toFixed(2));

    $('#search_screen_vat_amount').text('AED ' + Number(data.vat_in_money, 2).toFixed(2));

    $('#search_screen_total_amount').text('AED ' + Number(data.total_price, 2).toFixed(2));
    $('#search_screen_order_id').val(data.id);

    $('#order_print_via_search_screen').attr('href', `/pos/order/show/${data.id}`);
}

$('#search_update_order').on('click', function () {

    $.ajax({
        url: '/pos/order/update',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $('#search_screen_order_id').val(),
            payment_type: $('#search_screen_payment_type').val(),
            status: $('#search_screen_order_status').val(),
            payment_received: $('#search_screen_payment_received').val()
        },
        success: function (data) {
            Swal.fire({
                icon: 'success',
                title: "Succes!",
                text: data,
                confirmButtonColor: '#60BA62'
            }).then((result) => {
                loadOrders();
            });
        },
        complete: function () {
            $('.spinner_over_screen_2').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen_2').hide();
        }
    });
})
