<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Work[]|\Cake\Collection\CollectionInterface $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nueva acción'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva jornada'), ['controller' => 'Journeys', 'action' => 'add']) ?></li>
        <!-- <li><?= $this->Html->link(__('List Work Statuses'), ['controller' => 'Workstatuses', 'action' => 'index']) ?></li> -->
        <!-- <li><?= $this->Html->link(__('New Work Status'), ['controller' => 'Workstatuses', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="works index large-9 medium-8 columns content">
    <h3><?= __('Acciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('journey_id','Jornada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name','Acción') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('description') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('responsables','Responsable') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('folio') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('fecha_compromiso') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('completed','Terminado?') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('workStatus_id') ?></th> -->
                <!-- <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($works as $work): ?>
            <tr>
                <!-- <td><?= $this->Number->format($work->id) ?></td> -->
                <td><?= $work->has('journey') ? $this->Html->link($work->journey->ubicacion, ['controller' => 'Journeys', 'action' => 'view', $work->journey->id]) : '' ?></td>
                <td><?= h($work->name) ?></td>
                <!-- <td><?= h($work->description) ?></td> -->
                <td><?= h($work->responsables) ?></td>
                <!-- <td><?= h($work->folio) ?></td> -->
                <td><?= h($work->fecha_compromiso) ?></td>
                <!-- <td><?= h($work->start) ?></td>
                <td><?= h($work->end) ?></td>
                <td><?= $this->Number->format($work->cost) ?></td> -->
                <td><?= $this->Number->format($work->completed) ?></td>
                <!-- <td><?= $this->Number->format($work->paid) ?></td>
                <td><?= $work->has('work_status') ? $this->Html->link($work->work_status->name, ['controller' => 'Workstatuses', 'action' => 'view', $work->work_status->id]) : '' ?></td> -->
                <!-- <td><?= $this->Number->format($work->latitude) ?></td>
                <td><?= $this->Number->format($work->longitude) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $work->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $work->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $work->id], ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
