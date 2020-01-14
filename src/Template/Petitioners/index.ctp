<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petitioner[]|\Cake\Collection\CollectionInterface $petitioners
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nuevo solicitante'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petitioners index large-9 medium-8 columns content">
    <h3><?= __('Solicitantes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone','Teléfono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email','Correo electrónico') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petitioners as $petitioner): ?>
            <tr>
                <td><?= h($petitioner->name) ?></td>
                <td><?= h($petitioner->phone) ?></td>
                <td><?= h($petitioner->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $petitioner->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $petitioner->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $petitioner->id], ['confirm' => __('Se eliminará al solicitante si presiona Aceptar', $petitioner->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
