<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requeststatus $requeststatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requeststatus'), ['action' => 'edit', $requeststatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requeststatus'), ['action' => 'delete', $requeststatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requeststatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requeststatuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requeststatus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requeststatuses view large-9 medium-8 columns content">
    <h3><?= h($requeststatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($requeststatus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requeststatus->id) ?></td>
        </tr>
    </table>
</div>
