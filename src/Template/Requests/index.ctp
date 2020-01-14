<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva jornada'), ['controller' => 'Journeys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Promotores'), ['controller' => 'Promoters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo promotor'), ['controller' => 'Promoters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Conceptos'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo concepto'), ['controller' => 'Concepts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Tipos'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo tipo'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitantes'), ['controller' => 'Petitioners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo solicitante'), ['controller' => 'Petitioners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Estados de solicitud'), ['controller' => 'Requeststatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo estado de solicitud'), ['controller' => 'Requeststatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Actualizaciones'), ['controller' => 'Requestupdates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Actualización de estado'), ['controller' => 'Requestupdates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Solicitudes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('journey_id'),'Jornada' ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('promoter_id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('concept_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>

                <th scope="col"><?= $this->Paginator->sort('folio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sibso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cespt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('educacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('juventud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gobernador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_status_id') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= $request->has('journey') ? $this->Html->link($request->journey->id, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></td>
                <!-- <td><?= $request->has('promoter') ? $this->Html->link($request->promoter->name, ['controller' => 'Promoters', 'action' => 'view', $request->promoter->id]) : '' ?></td> -->
                <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td>
                <td><?= $request->has('type') ? $this->Html->link($request->type->name, ['controller' => 'Types', 'action' => 'view', $request->type->id]) : '' ?></td>
                <!-- <td><?= $request->has('petitioner') ? $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) : '' ?></td> -->
                <td><?= $this->Number->format($request->folio) ?></td>
                <td><?= h($request->description) ?></td>
                <td><?= h($request->sibso) ?></td>
                <td><?= h($request->cespt) ?></td>
                <td><?= h($request->educacion) ?></td>
                <td><?= h($request->municipio) ?></td>
                <td><?= h($request->dif) ?></td>
                <td><?= h($request->juventud) ?></td>
                <td><?= h($request->other) ?></td>
                <td><?= h($request->gobernador) ?></td>
                <td><?= $this->Number->format($request->priority) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
