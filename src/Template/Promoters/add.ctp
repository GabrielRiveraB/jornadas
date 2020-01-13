<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promoter $promoter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promoters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promoters form large-9 medium-8 columns content">
    <?= $this->Form->create($promoter) ?>
    <fieldset>
        <legend><?= __('Add Promoter') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('position');
            echo $this->Form->control('dependency');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
