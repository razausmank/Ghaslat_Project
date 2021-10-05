jQuery(document).ready(function () {
    loadOrders();
    setInterval(loadOrders, 1000 * 60 * 2);
});


$('body').on('click', '.order', function (e) {

    $('.spinner_over_screen').show();
    e.preventDefault();
    $('#order_print_via_order_modal').attr('href', $(this).attr('href'));

    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        success: function (data) {
            $('#modal_order_date').text(moment(data.created_at).format('DD MMMM YYYY'));
            $('#modal_order_status').val(data.status);
            $('#modal_customer_name').text(data.customer.name);
            $('#modal_payment_type').val(data.payment_option);
            $('#modal_payment_received').val(data.payment_received == "1" ? 1 : 0);
            $('#modal_order_number').text(data.order_number ?? '--------');

            $('#modal_items_list').empty();
            subtotal = 0;
            for (i = 0; i < data.products.length; i++) {
                subtotal += Number(data.products[i].pivot.quantity * data.products[i].pivot.price, 2);
                $('#modal_items_list').append(`
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

            $('#modal_sub_total').text('AED ' + Number(data.sub_total, 2).toFixed(2));

            $('#modal_discount_amount').text('AED ' + Number(data.discount_in_money, 2).toFixed(2));

            $('#modal_vat_amount').text('AED ' + Number(data.vat_in_money, 2).toFixed(2));

            $('#modal_total_amount').text('AED ' + Number(data.total_price, 2).toFixed(2));
            $('#modal_order_id').val(data.id);
        },
        complete: function () {
            $('.spinner_over_screen').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen').hide();
        }
    });
});


$('#update_order').on('click', function () {

    $.ajax({
        url: '/pos/order/update',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $('#modal_order_id').val(),
            payment_type: $('#modal_payment_type').val(),
            status: $('#modal_order_status').val(),
            payment_received: $('#modal_payment_received').val()
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
            $('.spinner_over_screen').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen').hide();
        }
    });
})



// loads and populates orders
function loadOrders() {
    $('.spinner_over_screen').show();
    statuses = [];
    statuses["New Order"] = '80808F';
    statuses["In Progress"] = '007bff';
    statuses["Delivered"] = '28a745';
    statuses["Waiting For Pickup"] = 'fd7e14';
    statuses["Waiting For Delivery"] = 'ffc107';
    statuses["Cancelled"] = 'F64E60';
    $.ajax({
        url: '/pos/order/get_basic_data',
        type: "GET",
        success: function (data) {
            $('#orders_tab_orders_list').empty();
            for (let i = 0; i < data.orders.length; i++) {
                $('#orders_tab_orders_list').append(`
                <div class="col-3 my-3">
                    <a href="/pos/order/show/${data.orders[i].id}" data-target="#orderModal"
                        data-toggle="modal"
                        class=" d-flex flex-column justify-content-between order border  pt-3 pb-0" style="border-color: #${statuses[data.orders[i].status]} !important;">
                        <div class="d-flex flex-column align-items-center my-5">
                            <span
                                class="font-weight-bolder text-dark h4 mb-2">${data.orders[i].order_number}</span>
                            <span class="h5 text-muted"> AED ${data.orders[i].total_price}</span>

                        </div>
                        <span
                            class="h5 text-center text-white bg-success m-0" style="background-color: #${statuses[data.orders[i].status]} !important;">${data.orders[i].customer.name}</span>

                    </a>
                </div>
                `);
            }

        },
        complete: function () {
            $('.spinner_over_screen').hide();
        },
        error: function (xhr) {
            console.log(xhr);
            $('.spinner_over_screen').hide();
        }
    });

}
