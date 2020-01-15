<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey[]|\Cake\Collection\CollectionInterface $journeys
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nueva Jornada'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeys index large-9 medium-8 columns content">
    <h3><?= __('Jornadas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('date','Fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ubicacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('horainicio','Hora') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journeys as $journey): ?>
            <tr>
                <td><?= h(date("d-m-y", strtotime($journey->date))) ?></td>
                <td><?= h($journey->ubicacion) ?></td>
                <td><?= h($journey->municipio) ?></td>
                <!-- <td><?= "De las ". date("H:i A", strtotime($journey->horainicio))." a las " . date("H:i A", strtotime($journey->horatermino)) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $journey->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $journey->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $journey->id], ['confirm' => __('Se eliminarán todos los datos de la jornada si presionas Aceptar', $journey->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
