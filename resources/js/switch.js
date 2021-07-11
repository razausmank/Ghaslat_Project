// Class definition

var KTBootstrapSwitch = function () {

    // Private functions
    var demos = function () {
        // minimum setup
        $('[data-switch="true"]').bootstrapSwitch();
    };

    return {
        // public functions
        init: function () {
            demos();
        },
    };
}();

jQuery(document).ready(function () {
    KTBootstrapSwitch.init();

    $('[data-switch="true"]').on('switchChange.bootstrapSwitch', function (e, data) {
        var state = $(this).bootstrapSwitch('state');//returns true or false
        if (state) {

            $(".switch_list").removeClass('d-none');
            $(".switch_tiles").removeClass('d-none');
            $(".switch_tiles").addClass('d-none');
        }
        else {
            $(".switch_tiles").removeClass('d-none');
            $(".switch_list").removeClass('d-none');
            $(".switch_list").addClass('d-none');
        }
    });
});
