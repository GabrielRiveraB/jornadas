<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey[]|\Cake\Collection\CollectionInterface $journeys
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Journey'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeys index large-9 medium-8 columns content">
    <h3><?= __('Journeys') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('map') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journeys as $journey): ?>
            <tr>
                <td><?= $this->Number->format($journey->id) ?></td>
                <td><?= h($journey->municipio) ?></td>
                <td><?= h($journey->date) ?></td>
                <td><?= h($journey->from) ?></td>
                <td><?= h($journey->to) ?></td>
                <td><?= h($journey->map) ?></td>
                <td><?= h($journey->created) ?></td>
                <td><?= h($journey->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $journey->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journey->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journey->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
