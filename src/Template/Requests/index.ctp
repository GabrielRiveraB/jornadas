<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?></li>
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
<div class="requests index large-9 medium-8 columns content">
    <h3><?= __('Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('journey_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promoter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concept_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('petitioner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('folio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sibso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cespt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('educacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('juventud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gobernador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('request_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
            <tr>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $request->has('journey') ? $this->Html->link($request->journey->id, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></td>
                <td><?= $request->has('promoter') ? $this->Html->link($request->promoter->name, ['controller' => 'Promoters', 'action' => 'view', $request->promoter->id]) : '' ?></td>
                <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td>
                <td><?= $request->has('type') ? $this->Html->link($request->type->name, ['controller' => 'Types', 'action' => 'view', $request->type->id]) : '' ?></td>
                <td><?= $request->has('petitioner') ? $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) : '' ?></td>
                <td><?= $this->Number->format($request->folio) ?></td>
                <td><?= h($request->description) ?></td>
                <td><?= h($request->sibso) ?></td>
                <td><?= h($request->cespt) ?></td>
                <td><?= h($request->educacion) ?></td>
                <td><?= h($request->municipio) ?></td>
                <td><?= h($request->dif) ?></td>
                <td><?= h($request->juventud) ?></td>
                <td><?= h($request->other) ?></td>
                <td><?= h($request->gobernador) ?></td>
                <td><?= $this->Number->format($request->priority) ?></td>
                <td><?= $request->has('request_status') ? $this->Html->link($request->request_status->name, ['controller' => 'Requeststatuses', 'action' => 'view', $request->request_status->id]) : '' ?></td>
                <td><?= h($request->created) ?></td>
                <td><?= h($request->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $request->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
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
