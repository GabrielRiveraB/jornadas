<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type $type
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $type->id],
                ['confirm' => __('Se eliminará el tipo si presiona Aceptar', $type->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Tipos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="types form large-9 medium-8 columns content">
    <?= $this->Form->create($type) ?>
    <fieldset>
    <legend><?= __('Datos del tipo') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Nombre del tipo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>
