<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="icon" href="<?php echo $this->webroot; ?>favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/admin-style.css"/>        
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>themes/base/jquery.ui.all.css" />
         
            <?php
                echo $this->Html->css(array(                   
                    'jquery-ui-1.8.4.custom'
                ));
                
               echo $this->Html->script(array(
                    'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
                    'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js' 
                )); 
            ?>
            
    </head>

    <body>
        <div id="wrapper">
            <div id="containerDiv">
                <?php echo $this->fetch('content'); ?><!--leftSiderBar--> 
                <div class="clr"></div>
            </div><!--containerDiv-->    
        </div><!--wrapper-->

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/site.js"></script>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
