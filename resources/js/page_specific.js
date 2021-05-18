

let FormValidator = require('./form_validation');




// main master Component

$('#logout_button').on( 'click' , function( event ){
    event.preventDefault();
    $('#logout_form').submit();
});

var image_field = new KTImageInput('image_field');


// Create Product Category


// Edit Product Category
$(document).ready(function() {

    $('#page_table').DataTable();
    $('#product_categories_table').DataTable();
    $('#products_table').DataTable();
    $('#users_table').DataTable();
    $('#usertypes_table').DataTable();
    $('#customer_types_table').DataTable();
    $('#customer_table').DataTable();
    $('#stores_table').DataTable();


        var groupColumn = 0;
        var table = $('#product_stocks_table').DataTable({
            "columnDefs": [
                { "visible": false, "targets": groupColumn }
            ],
            "order": [[ groupColumn, 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;

                api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group"><td colspan="7" ><div class="d-flex justify-content-between font-weight-bolder  font-size-lg">'+group+'</div></td></tr>'
                        );

                        last = group;
                    }
                } );
            }
        } );

        // Order by the grouping
        $('#product_stocks_table tbody').on( 'click', 'tr.group', function () {
            var currentOrder = table.order()[0];
            if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
                table.order( [ groupColumn, 'desc' ] ).draw();
            }
            else {
                table.order( [ groupColumn, 'asc' ] ).draw();
            }
        } );

} );

// Product Create Image



// Create page
$(document).ready(function(){




FormValidator.validate(
    "kt_form_1" ,
    {
        "url" : {
            "stringLength": {
                "min":"50",
                "max":"100",
                "message" : 'Please enter a menu within text length range 50 and 100'
            }
        },
    },

);

});





// testing


// Class definition

var KTSelect2 = function() {

	var demos = function() {
        // basic
		$('#user_create_usertype_select').select2({
			placeholder: "Select a state"
		});

		// nested
		$('#kt_select2_2').select2({
			placeholder: "Select a state"
		});

		// multi select
		$('#kt_select2_3_validate').select2({
			placeholder: "Select a state",
		});
	}

	// Public functions
	return {
		init: function() {
			demos();
		}
	};
}();

// Initialization
jQuery(document).ready(function() {
	KTSelect2.init();
});



// FormValidator.validate(
//     "page_create_form" ,
//     {
//         "name" : {
//             "notEmpty" : {"message" :"Name is required"} ,
//             "emailAddress" :{ "message" : "The value is not a valid email address modified" }
//         },
//         "url" : {
//             "notEmpty" : { "message" : "Url is required :)" } ,

//             "uri" : {"message" :"this is mad" },

//         },
//     },

// );
