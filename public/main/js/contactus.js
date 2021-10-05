$("#contact_us_form").submit(function (e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: "Thanks!",
                text: response,
                confirmButtonColor: '#60BA62'
            });
            $('#contact_us_form').each(function () {
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



// $('.loaderImage').show();
// $.ajax({
//     type: "POST",
//     url: "/cart/ajax_update_item",
//     data: { rowid: rowid, qty: qty },
//     dataType: 'json',
//     success: function (data) {
//         render_cart(data);
//         $('.loaderImage').hide();
//     },
//     error: function (response) {
//         //Handle error
//         $("#progressBar").hide();

//     }
// });
