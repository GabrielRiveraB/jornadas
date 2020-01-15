<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Work $work
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $work->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Journeys'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey'), ['controller' => 'Journeys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Work Statuses'), ['controller' => 'Workstatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Work Status'), ['controller' => 'Workstatuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?= $this->Form->create($work) ?>
    <fieldset>
        <legend><?= __('Edit Work') ?></legend>
        <?php
            echo $this->Form->control('journey_id', ['options' => $journeys]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('responsables');
            echo $this->Form->control('folio');
            echo $this->Form->control('fecha_compromiso', ['empty' => true]);
            echo $this->Form->control('start', ['empty' => true]);
            echo $this->Form->control('end', ['empty' => true]);
            echo $this->Form->control('cost');
            echo $this->Form->control('completed');
            echo $this->Form->control('paid');
            echo $this->Form->control('workStatus_id', ['options' => $workStatuses, 'empty' => true]);
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
