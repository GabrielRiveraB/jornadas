<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Work $work
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Work'), ['action' => 'edit', $work->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Work'), ['action' => 'delete', $work->id], ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journeys'), ['controller' => 'Journeys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey'), ['controller' => 'Journeys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Work Statuses'), ['controller' => 'Workstatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work Status'), ['controller' => 'Workstatuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="works view large-9 medium-8 columns content">
    <h3><?= h($work->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Journey') ?></th>
            <td><?= $work->has('journey') ? $this->Html->link($work->journey->ubicacion, ['controller' => 'Journeys', 'action' => 'view', $work->journey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($work->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($work->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsables') ?></th>
            <td><?= h($work->responsables) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio') ?></th>
            <td><?= h($work->folio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Work Status') ?></th>
            <td><?= $work->has('work_status') ? $this->Html->link($work->work_status->name, ['controller' => 'Workstatuses', 'action' => 'view', $work->work_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($work->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($work->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completed') ?></th>
            <td><?= $this->Number->format($work->completed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paid') ?></th>
            <td><?= $this->Number->format($work->paid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($work->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($work->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Compromiso') ?></th>
            <td><?= h($work->fecha_compromiso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($work->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($work->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($work->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($work->modified) ?></td>
        </tr>
    </table>
</div>
