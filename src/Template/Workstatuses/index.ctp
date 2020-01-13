<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workstatus[]|\Cake\Collection\CollectionInterface $workstatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workstatus'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workstatuses index large-9 medium-8 columns content">
    <h3><?= __('Workstatuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workstatuses as $workstatus): ?>
            <tr>
                <td><?= $this->Number->format($workstatus->id) ?></td>
                <td><?= h($workstatus->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workstatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workstatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workstatus->id)]) ?>
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
