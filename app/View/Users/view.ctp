<div class="users view">
    <h2><?php __('User'); ?></h2>
    <dl><?php $i = 0;
$class = ' class="altrow"'; ?>
        <dt<?php if ($i % 2 == 0)
    echo $class; ?>><?php __('Id'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['id']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('First Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
            <?php echo $user['User']['first_name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Last Name'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['last_name']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Email'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['email']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Created'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $user['User']['created']; ?>
            &nbsp;
        </dd>
        <dt<?php if ($i % 2 == 0)
                echo $class; ?>><?php __('Group'); ?></dt>
        <dd<?php if ($i++ % 2 == 0)
                echo $class; ?>>
<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Scores', true), array('controller' => 'scores', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Score', true), array('controller' => 'scores', 'action' => 'add')); ?> </li>
        </ul>
    </div>
    <div class="related">
        <h3><?php __('Related Scores'); ?></h3>
        <?php if (!empty($user['Score'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>
                    <th><?php __('Id'); ?></th>
                    <th><?php __('User Id'); ?></th>
                    <th><?php __('Score'); ?></th>
                    <th class="actions"><?php __('Actions'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($user['Score'] as $score):
                    $class = null;
                    if ($i++ % 2 == 0) {
                        $class = ' class="altrow"';
                    }
                ?>
                        <tr<?php echo $class; ?>>
                            <td><?php echo $score['id']; ?></td>
                            <td><?php echo $score['user_id']; ?></td>
                            <td><?php echo $score['score']; ?></td>
                            <td class="actions">
<?php echo $this->Html->link(__('View', true), array('controller' => 'scores', 'action' => 'view', $score['id'])); ?>
<?php echo $this->Html->link(__('Edit', true), array('controller' => 'scores', 'action' => 'edit', $score['id'])); ?>
<?php echo $this->Html->link(__('Delete', true), array('controller' => 'scores', 'action' => 'delete', $score['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $score['id'])); ?>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </table>
<?php endif; ?>

                    <div class="actions">
                        <ul>
                            <li><?php echo $this->Html->link(__('New Score', true), array('controller' => 'scores', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
