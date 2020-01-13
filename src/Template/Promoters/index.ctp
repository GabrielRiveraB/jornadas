<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Promoter[]|\Cake\Collection\CollectionInterface $promoters
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Promoter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="promoters index large-9 medium-8 columns content">
    <h3><?= __('Promoters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dependency') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promoters as $promoter): ?>
            <tr>
                <td><?= $this->Number->format($promoter->id) ?></td>
                <td><?= h($promoter->name) ?></td>
                <td><?= h($promoter->position) ?></td>
                <td><?= h($promoter->dependency) ?></td>
                <td><?= h($promoter->created) ?></td>
                <td><?= h($promoter->modified) ?></td>
                <td><?= h($promoter->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promoter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promoter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promoter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promoter->id)]) ?>
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
