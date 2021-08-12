$('.plus-button').click(function () {
    $('#calculatormodal').modal('show');
})

$('[data-switch="true"]').on('switchChange.bootstrapSwitch', function (e, data) {
    var state = $(this).bootstrapSwitch('state');//returns true or false
    if (state) {
        $(".percent_row").removeClass('d-none');
        $(".value_row").removeClass('d-none');
        $(".value_row").addClass('d-none');
    }
    else {
        $(".value_row").removeClass('d-none');
        $(".percent_row").removeClass('d-none');
        $(".percent_row").addClass('d-none');
    }
});


// clear button 
$('.clear_button').click(function () {
    $("input[name='discount_value']").val('');
})

// percentage and value buttons 
$('.percentage_buttons').click(function () {

    $("input[name='discount_value']").val($(this).attr('value'));
})

// numbers button clicks 

$('.number_buttons').click(function () {

    // console.log($("input[name='discount_value']").val(), $(this).attr('value'));
    if ($(this).attr('value') == '.') {
        if ($("input[name='discount_value']").val().toString().length <= 0 || ($("input[name='discount_value']").val().toString().indexOf('.') > -1)) {
            return;
        }
    }


    $("input[name='discount_value']").val($("input[name='discount_value']").val() + $(this).attr('value'));
})


$('.enter_button , #add_discount_info').click(function () {

    if ($(".bill-info  input[name='discount_type']").length == 0) {
        // discount not present add the element 

        state = $('[data-switch="true"]').bootstrapSwitch('state');
        discount_type = state ? 'percent' : 'money';
        discount_value = $('input[name="discount_value"]').val();
        element = `
        <hr class="m-2">
        <div class="d-flex justify-content-between  my-2">
            <span class="bill-info-text">Discount</span>
            <span class="bill-info-text discount_in_money">AED 0.00</span>
            <input type="number" name="discount_amount" value="${discount_value}" hidden>
            <input type="text" name="discount_type" value="${discount_type}" hidden>
        </div>
        `;

        $('.bill-info').append(element);
    } else {
        state = $('[data-switch="true"]').bootstrapSwitch('state');
        discount_type = state ? 'percent' : 'money';
        discount_value = $('input[name="discount_value"]').val();

        $('input[name="discount_value"]').val(discount_value);
        $('input[name="discount_type"]').val(discount_type);

    }

    calculate_everything();
})

function change_discount_value(value) {
    $("input[name='discount_value']").val(value);
}


