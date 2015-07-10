<ul>
	<?php echo $this->element('search');?>
    <li class="lastLi">
    	<table border="0" cellspacing="0" cellpadding="0" class="userProf">
          <tr>
            <td>
            <div class="nitifbox" id="n1">
              <a href="#"><span id="total-notif"><?php echo $countNotification; ?></span></a>
            </div>
            <div id="topnav" class="topnav" style="border-bottom: 1px solid #D9CFEF;">
                <a href="login" class="signin">
                    <img src="<?php echo $this->webroot; ?>img/notif.jpg" class="notifclass" alt="" />
                </a>
                 <a class="username" href="<?php echo $this->webroot.$authUser['username'];?>">
                  <b><?php echo $authUser['username'];?></b>
                </a>
            </div>            
            <div id="signin_menu">
                <div id="signin" >
                  <?php echo $this->element('profile/notification');?>
                </div><!--signin-->
            </div><!--signin_menu-->
            </td>
            <td rowspan="2">
                <?php if ($usersImageList[$authUser['id']]!=''): ?>
                    <img src="<?php echo $this->webroot; ?>img/user/small/<?php echo $usersImageList[$authUser['id']]; ?>" width="39px" height="40px"/>
                <?php else: ?>
                     <img src="<?php echo $this->webroot; ?>img/default_profile.gif" width="39px" height="40px"/>
                <?php endif;?>
            </td>
          </tr>
          <tr>
            <td>
            <div class="nitifbox1"><a href="<?php echo $this->webroot; ?>inbox"><?php echo $countMsg; ?></a></div>
            <div class="nitifbox2"><a href="#">0</a></div>
            	<ul class="userProfList">
                	<li><a href="<?php echo $this->webroot; ?>inbox"><img src="<?php echo $this->webroot; ?>img/message.png" alt="" /></a></li>
                  <li><a href="<?php echo $this->webroot; ?>inbox"><img src="<?php echo $this->webroot; ?>img/userFri.png" alt="" /></a></li>
                  <li><a href="<?php echo $this->webroot?>logout" class="last-child">Logout</a></li>
                </ul>
                <div class="clr"></div>
            </td>
          </tr>
        </table>
   </li>
</ul>