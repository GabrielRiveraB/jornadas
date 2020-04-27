<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concept $concept
 */
?>
<div class="concepts form large-9 medium-8 columns content">
    <?= $this->Form->create($concept) ?>
    <fieldset>
        <legend class="mb-3"><?= __('Concepto') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Nombre del concepto']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar concepto')) ?>
    <?= $this->Form->end() ?>
</div>
