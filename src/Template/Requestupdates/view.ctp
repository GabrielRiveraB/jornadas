<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requestupdate $requestupdate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Requestupdate'), ['action' => 'edit', $requestupdate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Requestupdate'), ['action' => 'delete', $requestupdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestupdate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requestupdates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requestupdate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requestupdates view large-9 medium-8 columns content">
    <h3><?= h($requestupdate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Request') ?></th>
            <td><?= $requestupdate->has('request') ? $this->Html->link($requestupdate->request->id, ['controller' => 'Requests', 'action' => 'view', $requestupdate->request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($requestupdate->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($requestupdate->id) ?></td>
        </tr>
    </table>
</div>
