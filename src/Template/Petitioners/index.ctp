<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petitioner[]|\Cake\Collection\CollectionInterface $petitioners
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Petitioner'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="petitioners index large-9 medium-8 columns content">
    <h3><?= __('Petitioners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civilstatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petitioners as $petitioner): ?>
            <tr>
                <td><?= $this->Number->format($petitioner->id) ?></td>
                <td><?= h($petitioner->name) ?></td>
                <td><?= $this->Number->format($petitioner->age) ?></td>
                <td><?= h($petitioner->civilstatus) ?></td>
                <td><?= h($petitioner->address) ?></td>
                <td><?= h($petitioner->phone) ?></td>
                <td><?= h($petitioner->email) ?></td>
                <td><?= h($petitioner->created) ?></td>
                <td><?= h($petitioner->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $petitioner->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $petitioner->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $petitioner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $petitioner->id)]) ?>
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
