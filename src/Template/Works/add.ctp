<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Work $work
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Works'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="works form large-9 medium-8 columns content">
    <?= $this->Form->create($work) ?>
    <fieldset>
        <legend><?= __('Add Work') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('folio');
            echo $this->Form->control('start', ['empty' => true]);
            echo $this->Form->control('end', ['empty' => true]);
            echo $this->Form->control('cost');
            echo $this->Form->control('completed');
            echo $this->Form->control('paid');
            echo $this->Form->control('workStatus_id');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
