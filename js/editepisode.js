//client side form validation 

(function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#newepisodeform").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    episode: {
                        required: true,
                        minlength: 15
                    },
                },
                messages: {
                    title: {
                        required: "Please provide a title",
                        minlength: "The title must be at least 3 characters long"
                    },
                    episode: {
                        required: "Please write a story",
                        minlength: "The must be at least 15 characters long"
                    },
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

//client side form validation

(function($,W,D)
{
    var JQUERY4U = {};
 
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#editepisodeform").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    episode: {
                        required: true,
                        minlength: 15
                    },
                },
                messages: {
                    title: {
                        required: "Please provide a title",
                        minlength: "The title must be at least 3 characters long"
                    },
                    episode: {
                        required: "Please write a story",
                        minlength: "The must be at least 15 characters long"
                    },
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