<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workupdate[]|\Cake\Collection\CollectionInterface $workupdates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workupdate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Works'), ['controller' => 'Works', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Work'), ['controller' => 'Works', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workupdates index large-9 medium-8 columns content">
    <h3><?= __('Workupdates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('work_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workupdates as $workupdate): ?>
            <tr>
                <td><?= $this->Number->format($workupdate->id) ?></td>
                <td><?= $workupdate->has('work') ? $this->Html->link($workupdate->work->name, ['controller' => 'Works', 'action' => 'view', $workupdate->work->id]) : '' ?></td>
                <td><?= h($workupdate->name) ?></td>
                <td><?= h($workupdate->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workupdate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workupdate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workupdate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workupdate->id)]) ?>
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
