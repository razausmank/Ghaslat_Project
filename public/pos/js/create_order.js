jQuery(document).ready(function () {
    $('#select2').select2({
        placeholder: 'Select a Customer'
    });

    $("#order_form").submit(function () {
        if ($("#cart input[name='id[]']").length <= 0) {
            Swal.fire("Uh Oh!", "Please Add some products before creating an Order!");
            return false
        }
    });

});

$('#modal_product_quantity_increase_button').on('click', function () {
    $('.modal_product_quantity').attr('value', parseInt($('.modal_product_quantity').val()) + 1);
    $('.modal_product_value').text('AED ' + (parseFloat($('.modal_product_quantity').val()) * parseFloat(($('.modal_product_value').attr('value')))).toFixed(2));
});

$('#modal_product_quantity_decrease_button').on('click', function () {
    $('.modal_product_quantity').attr('value', (parseInt($('.modal_product_quantity').val()) - 1 < 0 ? 0 : parseInt($('.modal_product_quantity').val()) - 1));
    $('.modal_product_value').text('AED ' + (parseFloat($('.modal_product_quantity').val()) * parseFloat(($('.modal_product_value').attr('value')))).toFixed(2));
});

$('#add_product_info').click(function () {

    product_id = parseInt($("input[name='modal_product_id']").val());
    product_quantity = parseInt($("input[name='modal_product_quantity']").val());

    element = $("#cart input[name='id[]']").filter(function (i, obj) {
        if (product_id == obj.value) {
            return true;
        }
    }).first();

    if (product_quantity == 0) {
        element.parent().parent().remove();
    } else {
        if (element.siblings("input[name='quantity[]']").val() == product_quantity) {
            // do nothing
        } else {
            old_quantity = element.siblings("input[name='quantity[]']").val();
            // change quantity
            element.siblings("input[name='quantity[]']").attr('value', product_quantity);
            element.siblings('#product_price').text("AED " + parseFloat(element.siblings("input[name='price[]']").val() * product_quantity).toFixed(2));

            if (old_quantity <= 1) {
                element.siblings('.symbol').append(`
                <span class="badge badge-danger badge-pill  notify-badge p-2 ">${product_quantity}</span>
                `);
            } else {
                element.siblings('.symbol').find('.notify-badge').text(product_quantity);
            }
        }
    }

    calculate_everything();
})

$('.item').on('click', function () {
    var element_clicked = {
        'image': $(this).find("img").first().attr('src'),
        'name': $(this).find("input[name='name']").first().val(),
        'id': $(this).find("input[name='id']").first().val(),
        'price': $(this).find("input[name='price']").first().val(),
    };
    add_item(element_clicked);
    calculate_everything();
});

$(function () {

    $(document).on('shown.bs.modal', '#product_adjustment', function (event) {
        var triggerElement = $(event.relatedTarget); // Button that triggered
        ;

        $("input[name='modal_product_id']").attr('value', $(triggerElement[0]).find("input[name='id[]']").val());
        $('#modal_product_title').text($(triggerElement[0]).find("input[name='name[]']").val());

        $('.modal_product_quantity').attr('value', $(triggerElement[0]).find("input[name='quantity[]']").val())

        $('.modal_product_value').text('AED ' + (parseFloat($(triggerElement[0]).find("input[name='quantity[]']").val()) * parseFloat($(triggerElement[0]).find("input[name='price[]']").val())));

        $('.modal_product_value').attr('value', parseFloat($(triggerElement[0]).find("input[name='price[]']").val()))
    });


});

function add_item(element_clicked) {

    // check in bill-info if that item is already present
    if ($("#cart input[name='id[]']").filter(function (i, obj) {
        if (element_clicked.id == obj.value) {
            return true;
        }
    }).length > 0) {
        // it is present increase its quantity

        // get the element's quantity field
        matched_element_quantity_input = $("#cart input[name='id[]']").filter(function (i, obj) {
            if (element_clicked.id == obj.value) {
                return true;
            }
        }).first().siblings("input[name='quantity[]']");

        //convert it into integer
        matched_element_quantity = parseInt(matched_element_quantity_input.val());
        // update it by 1
        matched_element_quantity_input.attr('value', matched_element_quantity + 1);
        // if badge is not present add the badge
        if (matched_element_quantity_input.val() == 2) {
            matched_element_quantity_input.siblings('.symbol').append(`
            <span class="badge badge-danger badge-pill  notify-badge p-2 ">${matched_element_quantity_input.val()}</span>
            `);
        } else {
            // if it is present increment the value by 1
            matched_element_quantity_input.siblings('.symbol').find('.notify-badge').text(matched_element_quantity_input.val());
        }
        // get the price input value
        price = matched_element_quantity_input.siblings("input[name='price[]']").val();
        // get the price element i.e heading , multiply the price by quantity and update it in
        price_element = matched_element_quantity_input.siblings('#product_price').text("AED " + parseFloat(price * matched_element_quantity_input.val()).toFixed(2));

    } else {
        // it is not present add it
        element = `
        <a class=" d-flex flex-column justify-content-center added_item" data-toggle="modal" data-target="#product_adjustment">
            <div class="d-flex my-2">
                <div class="symbol align-self-center pr-3">
                    <img alt="product_image" class="item_image"
                        src="${element_clicked.image}">

                </div>
                <div class="flex-fill align-self-center">
                    <h1 class="m-0 pl-2">${element_clicked.name}</h1>
                </div>
                <h4 id="product_price" class="align-self-center  m-0">Aed ${element_clicked.price}</h4>
                <input type="text" name="name[]" value="${element_clicked.name}" hidden>
                <input type="number" name="id[]" value="${element_clicked.id}" hidden>
                <input type="number" name="price[]" value="${element_clicked.price}" hidden>
                <input type="number" name="quantity[]" value="1" hidden>
            </div>
        </a>
        `;

        $('#cart').append(element);
    }
    // <span class="badge badge-danger badge-pill  notify-badge p-2 ">9</span>



}

function calculate_everything() {


    prices_quantities_array = $("#cart input[name='quantity[]'], #cart input[name='price[]'] ").map(function (ab, cd) {
        return $(this).val();
    }).get();

    $('#no_of_items_in_cart').text(prices_quantities_array.length / 2);

    sum = 0;
    for (i = 0; i < prices_quantities_array.length; i += 2) {
        sum += prices_quantities_array[i] * prices_quantities_array[i + 1];
    }
    sum = sum.toFixed(2);
    $('.subtotal').text("AED " + sum);


    discount_type = $('input[name="discount_type"]').val();
    discount_value = $('input[name="discount_value"]').val();
    if (discount_type == 'percent') {
        discount_in_money = ((sum / 100) * discount_value).toFixed(2);
    } else {
        discount_in_money = discount_value
    }
    $('.discount_in_money').text("AED " + discount_in_money);

    vat_in_money = (((sum - discount_in_money) / 100) * $("input[name='vat']").val()).toFixed(2);
    $('.vat_in_money').text("AED " + vat_in_money);


    if ($(".bill-info  input[name='discount_type']").length > 0) {
        total = parseFloat(sum) + parseFloat(vat_in_money) - parseFloat(discount_in_money);
    } else {
        total = parseFloat(sum) + parseFloat(vat_in_money);
    }
    total = total.toFixed(2);

    $('.total_in_money').text('AED ' + total);

}


function remove_item() {
    // check if the item exists in bill-info
    // if yes then
}


$("#order_form").submit(function (e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (response) {
            console.log(response);
            Swal.fire({
                icon: 'success',
                title: "Thanks!",
                text: response,
                confirmButtonColor: '#60BA62'
            });
            $('#order_form').each(function () {
                this.reset();
            });;
        },
        error: function (response) {
            console.log(response);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                confirmButtonColor: '#60BA62'
            });
        }
    });


});
