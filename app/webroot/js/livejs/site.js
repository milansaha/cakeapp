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

        $('#add-friend').click(app.AllPages.addFriend); 
        $('#remove-friend').click(app.AllPages.removeFriend); 
        $('input.tag').click(app.AllPages.addTag);
        $('.blogs input.blog-comment').click(app.AllPages.blogComment);

    },
     blogComment : function (e) {
        console.log('Commenting from profile area..');
        var blog = $(e.target).data('blogid');   
        var data = $('#blog-comment-'+blog).serializeArray();        
        console.log(data);
        $.ajax({
           url: '/users/blogcomment',
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#blog-msg-'+blog).html(response); 
                $('.txt-blog-'+blog).val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
     },

    popSignup : function (e) {
        e.preventDefault();
        console.log('Sign up from Pop Up...');
        $('#signup img#img-loader').show();
        var data = $('#form-pop-signup').serializeArray(); 

        if($('#txt-signup-username').val().length != 0 &&
         $('#txt-signup-password').val().length != 0 &&
         $('#txt-signup-c-password').val().length != 0 &&
         $('#txt-signup-email').val().length != 0) { 
            if($('#txt-signup-password').val() == $('#txt-signup-c-password').val()) {
                $.ajax({
                    url: '/users/pop_signup',
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

    popSignin : function () {
        //$('#login-msg').html('');
        $('#signin_menu img#img-loader').show();
        console.log('signin...');
        var data = $('#signin').serializeArray();     
        $.ajax({
            url: '/users/pop_signin',
            data: data,
            type: 'POST',
            success: function (response) {
                $('#signin_menu img#img-loader').hide();
                if(response =='wrong username or password.'){
                    $('#login-msg').html(response);
                }else{
                    console.log('Success!!');
                    $('#login-msg').html('');
                    window.location.reload();
                }
            },
            timeout: 5 * 60 * 1000,
            error: function () {
                $('#signin_menu img#img-loader').hide();
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
                        var url = "http://www.noobfeed.com";  
                        //var url = "http://localhost:8888/noobfeedv2/"
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

    addTag : function (e) {
        console.log('Saving Tag...');
        var data = $('#tag-it').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#tag-msg').html(response);
                $('#txt-tag').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               $('#tag-msg').html('Ooops! Please try again.');
            }
        });
    
    },
    editComment:function(e) {
        e.preventDefault();
        console.log('Editing comment...');
        var commentId = $(e.target).data('comment-id');
        var url = $(e.target).data('url');
        var comment = $('#txt-comment-edit-'+commentId).val();
       
        console.log('Comment Id: '+commentId);
        console.log('Url: '+url);
        console.log('Content: '+comment);
        
        //$(e.target).hide();
        //$(e.target).parent().find('img').removeClass('hide');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: commentId,
                content: comment              
            },
            timeout: app.settings.ajax.timeout,
            success: function (response) {
                console.log(response);
                $('#comment-edit-'+commentId).hide();
                $('#comment-'+commentId).html(response);
                $('#comment-'+commentId).show();
                $('#txt-comment-edit-'+commentId).html(response);
                
                //$('span#total-likes-'+commentId).html(response);
            },
            error: function(xhr, status, error) {
                console.error('Ajax response: ' + xhr.responseText);
                //$(e.target).parent().find('img').addClass('hide');
            }
        });
        
    },
    addFriend : function (e) {
        e.preventDefault();
        console.log('Adding friend...');        
        $('#img-friend').show();
        var data = $('#friend').serializeArray();    
        //console.log(data);  
       
        $.ajax({            
            url: 'friends/add',
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);                
                $('#img-friend').hide();
                $('#add-friend').hide();
                $('#remove-friend').show();              
            //alert(response);
            },
            timeout: 5 * 60 * 1000,
            error: function () {
                $('#add-friend').hide();
                $('#add-friend').html('Please try again!');
            }
        });
    
    },
    removeFriend : function (e) {
        e.preventDefault();
        console.log('Removing friend...');
        $('#img-friend').show();
        var data = $('#friend').serializeArray();    
        //console.log(data); 
        
        $.ajax({            
            url: 'friends/remove',
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#add-friend').show();
                $('#remove-friend').hide();
                $('#img-friend').hide();
            //alert(response);
            },
            timeout: 5 * 60 * 1000,
            error: function () {
                $('#remove-friend').hide();
                $('#remove-friend').html('Please try again!');
            }
        });
    
    }
}


app.PreviewPages = {
    init:function () {
        //Generate provider report
        $('input.comment').click(app.PreviewPages.saveComment);
        $('input.tag').click(app.AllPages.addTag);
        
    },

    saveComment : function (e) {
        console.log('Saving Comment...');
        var data = $('#preview-comment').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#userComments ul li:last').after(response); 
                $('#txt-comment').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
    
    }
}

app.NewsPages = {
    init:function () {
        $('input.comment').click(app.NewsPages.saveComment);
        $('input.tag').click(app.AllPages.addTag);
        $('input.edit-comment').click(app.AllPages.editComment);
       
       
    
        //$('#btn-pop-sign-up').click(app.AllPages.popSignup);
        //$('#btn-sign-in').click(app.AllPages.signin); 
        
       /* $('#UserPassword').keypress(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                app.AllPages.signin();
            }
        });*/
       
    },

    saveComment : function (e) {
        console.log('Saving Comment...');
        var data = $('#news-comment').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#userComments ul li:last').after(response); 
                $('#txt-comment').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
    
    },
    
}

app.ReviewPages = {
    init:function () {
        //Generate provider report
        $('input.comment').click(app.ReviewPages.saveComment);
        $('input.tag').click(app.AllPages.addTag);
        
    },

    saveComment : function (e) {
        console.log('Saving Comment...');
        var data = $('#review-comment').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#userComments ul li:last').after(response); 
                $('#txt-comment').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
    
    }
}


app.BlogPages = {
    init:function () {
        //Generate provider report
        $('input.comment').click(app.BlogPages.saveComment);
        $('input.tag').click(app.AllPages.addTag);
        
    },

    saveComment : function (e) {
        console.log('Saving Comment...');
        var data = $('#blog-comment').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#userComments ul li:last').after(response); 
                $('#txt-comment').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
    
    }
}

app.FeaturePages = {
    init:function () {
        //Generate provider report
        $('input.comment').click(app.FeaturePages.saveComment);
        $('input.tag').click(app.AllPages.addTag);
        
    },

    saveComment : function (e) {
        console.log('Saving Comment...');
        var data = $('#feature-comment').serializeArray(); 
        var url = $(e.target).data('url');   
        console.log(data); 
       
        $.ajax({
            url: url,
            data: data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $('#userComments ul li:last').after(response); 
                $('#txt-comment').val('');
            },
            timeout: 5 * 60 * 1000,
            error: function () {
               // $('#all-comment img.loading').hide();
            }
        });
    
    }
}



app.routes = [
/*{
    url:new RegExp("/manages/.*"),
    callback:app.AdminPages.init
},*/
{
    url:new RegExp("/news/"),
    callback:app.NewsPages.init
},
{
    url:new RegExp("/reviews/"),
    callback:app.ReviewPages.init
},
{
    url:new RegExp("/blogs/"),
    callback:app.BlogPages.init
},
{
    url:new RegExp("/previews/"),
    callback:app.PreviewPages.init
},
{
    url:new RegExp("/features/"),
    callback:app.FeaturePages.init
},
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
