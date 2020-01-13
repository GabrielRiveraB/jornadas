<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Request'), ['action' => 'edit', $request->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Request'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journeys'), ['controller' => 'Journeys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey'), ['controller' => 'Journeys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promoters'), ['controller' => 'Promoters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promoter'), ['controller' => 'Promoters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Concepts'), ['controller' => 'Concepts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Concept'), ['controller' => 'Concepts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Petitioners'), ['controller' => 'Petitioners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Petitioner'), ['controller' => 'Petitioners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Request Statuses'), ['controller' => 'Requeststatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Request Status'), ['controller' => 'Requeststatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requestupdates'), ['controller' => 'Requestupdates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requestupdate'), ['controller' => 'Requestupdates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="requests view large-9 medium-8 columns content">
    <h3><?= h($request->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Journey') ?></th>
            <td><?= $request->has('journey') ? $this->Html->link($request->journey->id, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promoter') ?></th>
            <td><?= $request->has('promoter') ? $this->Html->link($request->promoter->name, ['controller' => 'Promoters', 'action' => 'view', $request->promoter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concept') ?></th>
            <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $request->has('type') ? $this->Html->link($request->type->name, ['controller' => 'Types', 'action' => 'view', $request->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Petitioner') ?></th>
            <td><?= $request->has('petitioner') ? $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($request->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other') ?></th>
            <td><?= h($request->other) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Status') ?></th>
            <td><?= $request->has('request_status') ? $this->Html->link($request->request_status->name, ['controller' => 'Requeststatuses', 'action' => 'view', $request->request_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($request->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio') ?></th>
            <td><?= $this->Number->format($request->folio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $this->Number->format($request->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($request->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($request->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sibso') ?></th>
            <td><?= $request->sibso ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cespt') ?></th>
            <td><?= $request->cespt ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Educacion') ?></th>
            <td><?= $request->educacion ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= $request->municipio ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dif') ?></th>
            <td><?= $request->dif ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Juventud') ?></th>
            <td><?= $request->juventud ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gobernador') ?></th>
            <td><?= $request->gobernador ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Requestupdates') ?></h4>
        <?php if (!empty($request->requestupdates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Request Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($request->requestupdates as $requestupdates): ?>
            <tr>
                <td><?= h($requestupdates->id) ?></td>
                <td><?= h($requestupdates->request_id) ?></td>
                <td><?= h($requestupdates->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requestupdates', 'action' => 'view', $requestupdates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requestupdates', 'action' => 'edit', $requestupdates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requestupdates', 'action' => 'delete', $requestupdates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requestupdates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
