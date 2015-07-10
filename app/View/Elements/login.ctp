<ul>
  <?php echo $this->element('search');?>
  <li class="lastLi">
      <div id="container1">
          <div id="topnav" class="topnav"> 
          <?php if($actionName != 'Signup'):?>
            <a id="various1" href="#inline1" >
              <span style="font: normal 14px Tahoma, Geneva, sans-serif; color: #5420BD;">Sign Up</span>
            </a> 
           <?php endif; ?>  
            <a href="login" class='signin'>
              <span style="font: normal 14px Tahoma, Geneva, sans-serif; color: #5420BD;">Sign in</span>
            </a> 
          </div>
        <?php if($actionName != 'Signup'):?>
          <?php echo $this->element('popup_signup');?>  
        <?php endif; ?>           
          <?php echo $this->element('popup_signin');?>           
      </div>
      <script type="text/javascript">
              $(document).ready(function() {
                  $(".signin").click(function(e) {          
                      e.preventDefault();
                      $("fieldset#signin_menu").toggle();
                      $(".signin").toggleClass("menu-open");
                  });
            
                  $("fieldset#signin_menu").mouseup(function() {
                    return false
                  });

                $(document).mouseup(function(e) {
                    if($(e.target).parent("a.signin").length==0) {
                      $(".signin").removeClass("menu-open");
                      $("fieldset#signin_menu").hide();
                    }
                }); 
           });
      </script>
      <script src="<?php echo $this->webroot;?>js/jquery.tipsy.js" type="text/javascript"></script>
      <script type='text/javascript'>
          $(function() {
            $('#forgot_username_link').tipsy({gravity: 'w'});   
          });
      </script>
      <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
      </script>
   </li>
</ul>