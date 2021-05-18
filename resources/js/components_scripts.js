// page hierachy json


$( document ).ready(function() {
$('#page_hierarchy_js_tree_form_submit').on('click', function(e){

    e.preventDefault();

        var data = JSON.stringify( $('#kt_tree_5').jstree(true).get_json('#', {flat:true}) ) ;

        $.ajax({
               type: 'POST',
               url: $('#page_hierarchy_form').attr('action'),
               data: {
                "_token": $('input[name="page_hierarchy_csrf_token"]').val(),
                "data" : data
               },
               success: function(data) {
                console.log(data);
                location.reload();
               }
           }).fail(function (jqXHR, textStatus, error) {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(error);

                        });;
    });


    $('#page_hierarchy_js_tree_form_reset').on('click', function(e){
        $('#kt_tree_5').jstree(true).refresh();
    });

    var page_hierarchy_json = JSON.parse($('input[name="page_hierarchy_json"]').val());
    $("#kt_tree_5").jstree({
        "core": {

            "themes": {
                "responsive": false
            },
            // so that create works
            "check_callback": true,

            "data" : page_hierarchy_json

        },
        "types": {
            "default": {
                "icon": "fa fa-folder text-success"
            },
            "file": {
                "icon": "fa fa-file  text-success"
            }
        },
        "state": {
            "key": "demo2"
        },
        "plugins": ["dnd", "state", "types"]
    });
});
