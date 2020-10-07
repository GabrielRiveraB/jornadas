<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petitioner $petitioner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $petitioner->id],
                ['confirm' => __('Se eliminará al solicitante si presiona Aceptar', $petitioner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Solicitantes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petitioners form large-9 medium-8 columns content">
    <?= $this->Form->create($petitioner) ?>
    <fieldset>
    <legend><?= __('Datos del solicitante') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Nombre']);
            echo $this->Form->control('age',['label'=>'Edad']);
            echo $this->Form->control('civilstatus',['label'=>'Estado civil']);
            echo $this->Form->control('address',['label'=>'Dirección']);
            echo $this->Form->control('phone',['label'=>'Teléfono']);
            echo $this->Form->control('email',['label'=>'Correo electrónico']);
            echo $this->Form->control('photo',['file'=>'photo']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>
