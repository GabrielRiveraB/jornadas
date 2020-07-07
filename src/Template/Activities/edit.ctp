<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $activity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concepts'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concept'), ['controller' => 'Concepts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Edit Activity') ?></legend>
        <?php
            echo $this->Form->control('request_id', ['options' => $requests, 'empty' => true]);
            echo $this->Form->control('dependency_id');
            echo $this->Form->control('concept_id', ['options' => $concepts, 'empty' => true]);
            echo $this->Form->control('folio');
            echo $this->Form->control('notes');
        ?>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
