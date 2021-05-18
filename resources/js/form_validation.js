
module.exports = {


    
    /* Validate is the main Function, it takes 3 inputs one of which is optional
    the first input is the form id
    the second input takes an object which defines the fields to be validated and the type of validations each field will have with a custom message for each validation type
    the third parameter is optional it has a few default plugins, it takes an object that defines the plugings to be used
    */
    validate: function( formID, form_data , form_validation_plugin = this.form_validation_plugin ) {

        var fields_data  = this.make_form_data( form_data );

        var form_id = document.getElementById( formID ) ;

        this.form_validation_function( form_id , fields_data , form_validation_plugin ) ;
    },

    //this makes call to the validation library
    form_validation_function: function( form_id , fields_data , form_validation_plugin) {
        FormValidation.formValidation(
            form_id,
            {
                fields : fields_data,

                plugins : form_validation_plugin
            }
        )
    },

    //parses the input object into a valid object structure that the validation library requires
    make_form_data : function( form_data ) {

        var fields_with_validators = {};
        for ( var field_name in form_data )
        {
            fields_with_validators[field_name] = { validators : {} } ;

            for ( var key in form_data[field_name] )
            {
                fields_with_validators[field_name].validators[key] =  form_data[field_name][key] ;
            }
        }

        return fields_with_validators ;
    },

    // default plugins to be used if plugins not explicitly mentioned
    form_validation_plugin : {
        trigger: new FormValidation.plugins.Trigger(),
        // Bootstrap Framework Integration
        bootstrap: new FormValidation.plugins.Bootstrap(),
        // Validate fields when clicking the Submit button
        submitButton: new FormValidation.plugins.SubmitButton(),
                                        // Submit the form when all fields are valid
        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
    }


}


// pass in the form id
// go through every field and filter out the inputs with attribute "data-validation='true' "
// each input will have the types of validation mentioned in attribute which would be
