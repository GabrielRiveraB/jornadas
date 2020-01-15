<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workupdate $workupdate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workupdate'), ['action' => 'edit', $workupdate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workupdate'), ['action' => 'delete', $workupdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workupdate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workupdates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workupdate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Works'), ['controller' => 'Works', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work'), ['controller' => 'Works', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workupdates view large-9 medium-8 columns content">
    <h3><?= h($workupdate->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Work') ?></th>
            <td><?= $workupdate->has('work') ? $this->Html->link($workupdate->work->name, ['controller' => 'Works', 'action' => 'view', $workupdate->work->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($workupdate->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($workupdate->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workupdate->id) ?></td>
        </tr>
    </table>
</div>
