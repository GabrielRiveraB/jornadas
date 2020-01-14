<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promoter $promoter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $promoter->id],
                ['confirm' => __('Se eliminará el promotor del sistema si presiona Aceptar', $promoter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Promotores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promoters form large-9 medium-8 columns content">
    <?= $this->Form->create($promoter) ?>
    <fieldset>
    <legend><?= __('Datos del promotor') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Nombre']);
            echo $this->Form->control('position',['label'=>'Puesto']);
            echo $this->Form->control('dependency',['label'=>'Dependencia']);
            echo $this->Form->control('status',['label'=>'Activo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>
