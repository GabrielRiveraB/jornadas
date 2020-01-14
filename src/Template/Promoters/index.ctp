<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promoter[]|\Cake\Collection\CollectionInterface $promoters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nuevo promotor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promoters index large-9 medium-8 columns content">
    <h3><?= __('Promotores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position','Puesto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dependency','Dependencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status','Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promoters as $promoter): ?>
            <tr>
                <td><?= h($promoter->name) ?></td>
                <td><?= h($promoter->position) ?></td>
                <td><?= h($promoter->dependency) ?></td>
                <td><?php if ($promoter->status) { echo "Activo"; } else { echo "Desactivado"; } ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $promoter->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $promoter->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $promoter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promoter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
