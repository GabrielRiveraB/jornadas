<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requestupdate $requestupdate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Requestupdates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requestupdates form large-9 medium-8 columns content">
    <?= $this->Form->create($requestupdate) ?>
    <fieldset>
        <legend><?= __('Add Requestupdate') ?></legend>
        <?php
            echo $this->Form->control('request_id', ['options' => $requests, 'empty' => true]);
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
