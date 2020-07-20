<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Activity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requests'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Concepts'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Concept'), ['controller' => 'Concepts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="card shadow mb-4">
  <div class="card-header py-3">
<div class="activities index large-9 medium-8 columns content">
    <h3><?= __('Activities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dependency_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concept_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ubicacion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
            <tr>
                <td><?= $this->Number->format($activity->id) ?></td>
                <td><?= $activity->has('request') ? $this->Html->link($activity->request->id, ['controller' => 'Requests', 'action' => 'view', $activity->request->id]) : '' ?></td>
                <td><?= $this->Number->format($activity->dependency_id) ?></td>
                <td><?= $activity->has('concept') ? $this->Html->link($activity->concept->name, ['controller' => 'Concepts', 'action' => 'view', $activity->concept->id]) : '' ?></td>
                <td><?= $this->Number->format($activity->folio) ?></td>
                <td><?= h($activity->notes) ?></td>
                <td><?= h ($activity->ubicacion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $activity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
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
