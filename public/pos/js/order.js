jQuery(document).ready(function () {
});

$('.order').click(function (e) {
    $('.spinner_over_screen').show();
    e.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: "GET",
        success: function (data) {
            console.log(data);
            $('#modal_order_date').text(moment(data.created_at).format('DD MMMM YYYY'));
            $('#modal_order_status').text(data.status ?? '-----');
            $('#modal_customer_name').text(data.customer.name);
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
                    <td class=" border-0 text-right pt-7 align-middle">AED ${Number(data.products[i].pivot.price, 2)}</td>
                    <td class=" border-0 text-primary pr-0 pt-7 text-right align-middle">AED ${Number(data.products[i].pivot.quantity * data.products[i].pivot.price, 2)}</td>
                </tr>
                `);
            }
            $('#modal_payment_type').text(data.payment_option);

            discount_in_money = 0;
            if (data.discount_type == 'percent') {
                discount_in_money = ((Number(subtotal) / 100) * Number(data.discount_amount)).toFixed(2);
            } else if (data.discount_type == 'money') {
                discount_in_money = Number(data.discount_amount)
            }
            $('#modal_discount_amount').text('AED ' + discount_in_money);

            vat_in_money = (((Number(subtotal) - Number(discount_in_money)) / 100) * Number(data.vat)).toFixed(2);

            $('#modal_vat_amount').text('AED ' + vat_in_money);

            total_amount = Number(subtotal) + Number(vat_in_money) - Number(discount_in_money);

            $('#modal_total_amount').text('AED ' + total_amount);
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
