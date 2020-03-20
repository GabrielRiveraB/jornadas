<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependency $dependency
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dependencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dependencies form large-9 medium-8 columns content">
    <?= $this->Form->create($dependency) ?>
    <fieldset>
        <legend><?= __('Add Dependency') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('longname');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
