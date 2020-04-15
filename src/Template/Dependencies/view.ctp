<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependency $dependency
 */
?>

<div class="dependencies view large-9 medium-8 columns content">
    <h3><?= h($dependency->longname. ' (' .$dependency->name . ')') ?></h3>

    <div class="related">
        <h4><?= __('Actividades asignadas') ?></h4>
        <?php if (!empty($dependency->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Request Id') ?></th>
                <th scope="col"><?= __('Dependency Id') ?></th>
                <th scope="col"><?= __('Concept Id') ?></th>
                <th scope="col"><?= __('Folio') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dependency->activities as $activities): ?>
            <tr>
                <td><?= h($activities->id) ?></td>
                <td><?= h($activities->request_id) ?></td>
                <td><?= h($activities->dependency_id) ?></td>
                <td><?= h($activities->concept_id) ?></td>
                <td><?= h($activities->folio) ?></td>
                <td><?= h($activities->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
