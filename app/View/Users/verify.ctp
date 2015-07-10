<div id="leftSiderBar">
    <div id="verify">
        <p class="msg">
            <?php echo isset($msg)?$msg:'';?>
        </p>
        <p class="msg">
            <?php if($verified):?>
            <span>Click here to <a href="<?php echo $this->webroot?>signup">login</a>.
             <?php endif;?>
        </p>
    </div><!--userSign-->    
</div><!--leftSiderBar-->