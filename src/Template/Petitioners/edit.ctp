<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petitioner $petitioner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $petitioner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $petitioner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Petitioners'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petitioners form large-9 medium-8 columns content">
    <?= $this->Form->create($petitioner) ?>
    <fieldset>
        <legend><?= __('Edit Petitioner') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('age');
            echo $this->Form->control('civilstatus');
            echo $this->Form->control('address');
            echo $this->Form->control('phone');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
