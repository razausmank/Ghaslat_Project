// Generic Form Repeater
// Class definition
var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('.form_repeater').each(function(i, obj) {
            $('#' + $(this).attr('id')).repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
        });

    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
}();

jQuery(document).ready(function() {
    KTFormRepeater.init();
});
