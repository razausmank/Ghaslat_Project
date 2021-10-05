jQuery(document).ready(function () {



    $.ajax({
        url: '/pos/order/get_basic_data',
        type: "GET",
        success: function (data) {
            console.log(data.products.length);
            populateBasicData(data);

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

function populateBasicData(data) {
    $('#products_tab').empty();

    for (let i = 0; i < data.products.length; i++) {
        $('#products_tab').append(`

            <div class="col-3 my-3">
                <a class=" d-flex flex-column justify-content-center item border border-dark py-3">
                    <div class="symbol symbol-150 symbol-lg-150 m-auto">
                        <img alt="product_image" class=""
                            src="{{ $product->image ? asset(Storage::url($product->image)) : asset('assets/media/svg/icons/Clothes/Hanger.svg') }}">
                    </div>

                    <p class="clothes-titles m-0">${data.products[i].name}</p>
                    <input type=" text" name="name" value="${data.products[i].name}" hidden>
                    <input type="number" name="id" value="${data.products[i].id}" hidden>
                    <input type="number" name="price" value="${data.products[i].price}" hidden>
                </a>
            </div>

        `);
    }
}
