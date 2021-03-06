<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workupdate $workupdate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workupdate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workupdate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Workupdates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Works'), ['controller' => 'Works', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Work'), ['controller' => 'Works', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workupdates form large-9 medium-8 columns content">
    <?= $this->Form->create($workupdate) ?>
    <fieldset>
        <legend><?= __('Edit Workupdate') ?></legend>
        <?php
            echo $this->Form->control('work_id', ['options' => $works, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
