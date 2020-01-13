<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Journeys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeys form large-9 medium-8 columns content">
    <?= $this->Form->create($journey) ?>
    <fieldset>
        <legend><?= __('Add Journey') ?></legend>
        <?php
            echo $this->Form->control('municipio');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('from', ['empty' => true]);
            echo $this->Form->control('to', ['empty' => true]);
            echo $this->Form->control('map');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
