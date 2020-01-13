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
                __('Delete'),
                ['action' => 'delete', $concept->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $concept->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Concepts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concepts form large-9 medium-8 columns content">
    <?= $this->Form->create($concept) ?>
    <fieldset>
        <legend><?= __('Edit Concept') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
