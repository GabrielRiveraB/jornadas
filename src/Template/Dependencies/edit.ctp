<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependency $dependency
 */
?>

<div class="dependencies form large-9 medium-8 columns content">
    <?= $this->Form->create($dependency) ?>
    <fieldset>
        <legend class="mb-3"><?= __('Editar dependencia') ?></legend>
        <?php
            echo $this->Form->control('name',['label'=>'Siglas']);
            echo $this->Form->control('longname',['label'=>'Nombre']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
