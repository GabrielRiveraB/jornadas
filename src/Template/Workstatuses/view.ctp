<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workstatus $workstatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workstatus'), ['action' => 'edit', $workstatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workstatus'), ['action' => 'delete', $workstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workstatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workstatuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workstatus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workstatuses view large-9 medium-8 columns content">
    <h3><?= h($workstatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($workstatus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workstatus->id) ?></td>
        </tr>
    </table>
</div>
