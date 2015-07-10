<div class="groups view">
    <?php
    if (isset($created)) {
        echo '<h2>Successfully Built!</h2>';
        echo '<pre>';
        print_r($created);
    } else {
        echo '<h2>No new action is found !</h2>';
    }
    ?>

</div>

<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Go Back', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
    </ul>
</div>
