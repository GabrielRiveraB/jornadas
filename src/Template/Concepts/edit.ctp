<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concept $concept
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $concept->id],
                ['confirm' => __('Se eliminará el concepto si presionas en Aceptar', $concept->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Conceptos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concepts form large-9 medium-8 columns content">
    <?= $this->Form->create($concept) ?>
    <fieldset>
    <legend><?= __('Concepto') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Nombre del concepto']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>
