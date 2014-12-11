//client side form validation

$(document).ready(function() {
	
	$('#buttonLogin').click(function() {
		$('#loginform').submit();
	});
	
	$('#registerSubmit').click(function() {
        $('#registerform').submit();
	});
});


(function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#registerform").validate({
                rules: {
                    firstname: {
                        required: true,
                        minlength: 3
                    },
                    lastname: {
                        required: true,
                        minlength: 3
                    },
                    emailreg: {
                        required: true,
                        email: true
                    },
                    passwordreg1: {
                        required: true,
                        minlength: 6
                    },
                },
                messages: {
                    firstname: {
                        required: "Please provide a first name",
                        minlength: "Your first name must be at least 3 characters long"
                    },
                    lastname: {
                        required: "Please provide a last name",
                        minlength: "Your last name must be at least 3 characters long"
                    },
                    passwordreg1: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    emailreg: "Please enter a valid email address",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }
 
    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);