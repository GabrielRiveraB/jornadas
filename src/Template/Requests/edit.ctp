<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $request->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Journeys'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey'), ['controller' => 'Journeys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promoters'), ['controller' => 'Promoters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promoter'), ['controller' => 'Promoters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concepts'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concept'), ['controller' => 'Concepts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Petitioners'), ['controller' => 'Petitioners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Petitioner'), ['controller' => 'Petitioners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Request Statuses'), ['controller' => 'Requeststatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Status'), ['controller' => 'Requeststatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requestupdates'), ['controller' => 'Requestupdates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requestupdate'), ['controller' => 'Requestupdates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="requests form large-9 medium-8 columns content">
    <?= $this->Form->create($request) ?>
    <fieldset>
        <legend><?= __('Edit Request') ?></legend>
        <?php
            echo $this->Form->control('journey_id', ['options' => $journeys]);
            echo $this->Form->control('promoter_id', ['options' => $promoters]);
            echo $this->Form->control('concept_id', ['options' => $concepts, 'empty' => true]);
            echo $this->Form->control('type_id', ['options' => $types, 'empty' => true]);
            echo $this->Form->control('petitioner_id', ['options' => $petitioners]);
            echo $this->Form->control('folio');
            echo $this->Form->control('description');
            echo $this->Form->control('sibso');
            echo $this->Form->control('cespt');
            echo $this->Form->control('educacion');
            echo $this->Form->control('municipio');
            echo $this->Form->control('dif');
            echo $this->Form->control('juventud');
            echo $this->Form->control('other');
            echo $this->Form->control('gobernador');
            echo $this->Form->control('priority');
            echo $this->Form->control('request_status_id', ['options' => $requestStatuses, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
