// Class definition
var KTSelect2 = function () {
    // Private functions
    var demos = function () {
        // basic
        $('#select2').select2({
            placeholder: 'Select a Customer'
        });


    }

    // Public functions
    return {
        init: function () {
            demos();
        }
    };
}();

// Initialization
jQuery(document).ready(function () {
    KTSelect2.init();
});
