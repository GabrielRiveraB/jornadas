<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concept $concept
 */
?>

<div class="concepts view large-9 medium-8 columns content">
    <h3><?= h($concept->name) ?></h3>

    <div class="related">
        <h4><?= __('Solicitudes relacionadas') ?></h4>
        <?php if (!empty($concept->requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Journey Id') ?></th>
                <th scope="col"><?= __('Promoter Id') ?></th>
                <th scope="col"><?= __('Concept Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>
                <th scope="col"><?= __('Petitioner Id') ?></th>
                <th scope="col"><?= __('Folio') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Sibao') ?></th>
                <th scope="col"><?= __('Cespt') ?></th>
                <th scope="col"><?= __('Educacion') ?></th>
                <th scope="col"><?= __('Municipio') ?></th>
                <th scope="col"><?= __('Dif') ?></th>
                <th scope="col"><?= __('Juventud') ?></th>
                <th scope="col"><?= __('Other') ?></th>
                <th scope="col"><?= __('Priority') ?></th>
                <th scope="col"><?= __('Request Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($concept->requests as $requests): ?>
            <tr>
                <td><?= h($requests->id) ?></td>
                <td><?= h($requests->journey_id) ?></td>
                <td><?= h($requests->promoter_id) ?></td>
                <td><?= h($requests->concept_id) ?></td>
                <td><?= h($requests->type_id) ?></td>
                <td><?= h($requests->petitioner_id) ?></td>
                <td><?= h($requests->folio) ?></td>
                <td><?= h($requests->description) ?></td>
                <td><?= h($requests->sibao) ?></td>
                <td><?= h($requests->cespt) ?></td>
                <td><?= h($requests->educacion) ?></td>
                <td><?= h($requests->municipio) ?></td>
                <td><?= h($requests->dif) ?></td>
                <td><?= h($requests->juventud) ?></td>
                <td><?= h($requests->other) ?></td>
                <td><?= h($requests->priority) ?></td>
                <td><?= h($requests->request_status_id) ?></td>
                <td><?= h($requests->created) ?></td>
                <td><?= h($requests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Requests', 'action' => 'edit', $requests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Requests', 'action' => 'delete', $requests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
