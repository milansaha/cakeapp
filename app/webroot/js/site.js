var app = this.app || {};

// Application Settings
app.settings = {
    'ajax' : {
        'timeout'   : 50000,
        'delay'     : 0
    }
}

// URLs
app.urls = {

    }


app.fixTextarea = function($textarea) {
    // $textarea is a jquery object.
    $textarea.val(
        $.trim($textarea.val()).replace(/\s*[\r\n]+\s*/g, '\n')
        .replace(/(<[^\/][^>]*>)\s*/g, '$1')
        .replace(/\s*(<\/[^>]+>)/g, '$1'));
}


app.init =  function (){
    fixIE();
    // Define console.log if it is not supported
    try {
        console.log('Running app...');
    } catch (err) {
        console = {};
        console.log = function(text) {
        // leave it

        }
    }
//Sign in and Sign up from anywhere in the site
    $('#signin_menu img#img-loader').hide();
    $('#btn-pop-sign-up').click(app.AllPages.popSignup); 
    $('#signin_submit').click(app.AllPages.popSignin);
    $('#password').keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                app.AllPages.popSignin();
            }
    });
};

function fixIE() {
    $('div.control-panel h2').each(function () {

        $(this).wrapInner('<span />');
    });
    $('<!--[if lte IE 8 ]> <div class="content_footer"> <div> </div> </div> <![endif]-->').insertAfter('div.control-panel .content');
}

//     Global objects
//------------------------
var date = new Date();
var currentYear = date.getYear() + 1900;
var currentMonth = date.getMonth() + 1;
var currentDate = date.getDate();
//console.log('Today is: ' + currentDate +'/'+ currentMonth +'/'+ currentYear)

app.AllPages = {
    init:function () {
        $('#btn-signup').click(app.AllPages.signup); 
        $('#btn-signin').click(app.AllPages.signin); 
        $('#btn-forgotpass').click(app.AllPages.forgotpass);
        $('#pass-signin').keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                app.AllPages.signin();
            }
        });

        $('#txt-forgot-email').keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                app.AllPages.forgotpass();
            }
        });

       
    },
    
    signup : function () {
       console.log('Sign up from page...');
       $('#signup img#img-loader').show();
       var data = $('#frm-signup-page').serializeArray(); 

        if($('#txt-signup-username').val().length != 0 &&
         $('#txt-signup-password').val().length != 0 &&
         $('#txt-signup-c-password').val().length != 0 &&
         $('#txt-signup-email').val().length != 0) { 
            if($('#txt-signup-password').val() == $('#txt-signup-c-password').val()) {
                $.ajax({
                    url: '/users/adduser',
                    data: data,
                    type: 'POST',
                    success: function (response) {
                        if(response !='successfully saved'){
                            $('#signup img#img-loader').hide();
                            $('#signup_error_page').html(response);
                            $('#signup_error_page').show();
                        }else if(response =='successfully saved'){
                            console.log(response);
                            $('#signup img#img-loader').hide();
                            $('#signup_error_page').html('Your account is created.Check your email to verify.');
                            $("#signup_error_page").css({"color":"#009446"});
                        }
                    },
                    timeout: 5 * 60 * 1000,
                    error: function () {
                       $('#login_error_page').hide();
                    }
                });
            }else{
                $('#signup img#img-loader').hide();
                $('#signup_error_page').html('Plese confirm password');
                $('#signup_error_page').show();
            }

        }else{
            $('#signup img#img-loader').hide();
            $('#signup_error_page').html('Enter required fields!');
            $('#signup_error_page').show();
        }
    },

    signin : function () {
           console.log('Signin from page...');
           $('#signin img#img-loader').show();
           var data = $('#frm-signin-page').serializeArray(); 
           console.log(data);   
           if($('#username-signin').val().length != 0 && $('#pass-signin').val().length != 0) {
            $.ajax({
                url: '/users/signin',
                data: data,
                type: 'POST',
                success: function (response) {
                    if(response =='Wrong username or password.'){
                        $('#signin img#img-loader').hide();
                        $('#login_error_page').html(response);
                        $('#login_error_page').show();
                    }else if(response =='welcome'){
                        console.log('Success!!');
                        $('#signin img#img-loader').hide();
                        $('#login_error_page').hide();
                        var host = window.location.href;
                        var url = host+"users/index"
                        $(location).attr('href',url);
                    }
                },
                timeout: 5 * 60 * 1000,
                error: function () {
                   $('#login_error_page').hide();
                }
            });
        }else{
            $('#signin img#img-loader').hide();
            $('#login_error_page').html('Enter username and password');
            $('#login_error_page').show();
        }
    },forgotpass : function () {
           console.log('Send new pass...');
           $('#forgot-pass img#img-loader').show();
           var data = $('#frm-forgot-pass').serializeArray(); 
           console.log(data);   
           if($('#txt-forgot-email').val().length != 0) {
            $.ajax({
                url: '/users/forgotpass',
                data: data,
                type: 'POST',
                success: function (response) {
                    if(response =='Not a valid email.'){
                        $('#forgot-pass img#img-loader').hide();
                        $('#forgotpass_error').html(response);
                        $('#forgotpass_error').show();
                    }else if(response =='Password sent to your email.'){
                        console.log('Success!!');
                        $('#forgot-pass img#img-loader').hide();
                        $('#forgotpass_error').html(response);
                        $('#forgotpass_error').show();
                    }
                },
                timeout: 5 * 60 * 1000,
                error: function () {
                   $('#forgotpass_error').hide();
                }
            });
        }else{
            $('#forgot-pass img#img-loader').hide();
            $('#forgotpass_error').html('Enter your email');
            $('#forgotpass_error').show();
        }
    },

	
}




app.routes = [
{
    url:new RegExp("/.*"),
    callback:app.AllPages.init
}
];

app.urlResolver = function (url) {
    var count = app.routes.length;
    for (var index = 0; index < count; index++) {
        var urlpattern = app.routes[index];
        if (url.search(urlpattern.url) > -1) {
            urlpattern.callback();
            break;
        }
    }
}

$(document).ready(function () {
    app.init();
    app.urlResolver(location.pathname);
});
