<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Work[]|\Cake\Collection\CollectionInterface $works
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Work'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="works index large-9 medium-8 columns content">
    <h3><?= __('Works') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('completed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('workStatus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($works as $work): ?>
            <tr>
                <td><?= $this->Number->format($work->id) ?></td>
                <td><?= h($work->name) ?></td>
                <td><?= h($work->description) ?></td>
                <td><?= h($work->folio) ?></td>
                <td><?= h($work->start) ?></td>
                <td><?= h($work->end) ?></td>
                <td><?= $this->Number->format($work->cost) ?></td>
                <td><?= $this->Number->format($work->completed) ?></td>
                <td><?= $this->Number->format($work->paid) ?></td>
                <td><?= $this->Number->format($work->workStatus_id) ?></td>
                <td><?= $this->Number->format($work->latitude) ?></td>
                <td><?= $this->Number->format($work->longitude) ?></td>
                <td><?= h($work->created) ?></td>
                <td><?= h($work->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $work->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $work->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $work->id], ['confirm' => __('Are you sure you want to delete # {0}?', $work->id)]) ?>
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
