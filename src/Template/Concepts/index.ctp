<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concept[]|\Cake\Collection\CollectionInterface $concepts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nuevo concepto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concepts index large-9 medium-8 columns content">
    <h3><?= __('Conceptos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($concepts as $concept): ?>
            <tr>
                <td><?= h($concept->name) ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('Ver'), ['action' => 'view', $concept->id]) ?> -->
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $concept->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $concept->id], ['confirm' => __('Are you sure you want to delete # {0}?', $concept->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
