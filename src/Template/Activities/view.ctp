<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<?php //debug($activity); ?>
<div class="activities view large-9 medium-8 columns content">
    <h3><?= 'Solicitud de '. h($activity->concept['name']) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Request') ?></th>
            <td><?= $activity->has('request') ? $this->Html->link($activity->request->id, ['controller' => 'Requests', 'action' => 'view', $activity->request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concept') ?></th>
            <td><?= $activity->has('concept') ? $this->Html->link($activity->concept->name, ['controller' => 'Concepts', 'action' => 'view', $activity->concept->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notes') ?></th>
            <td><?= h($activity->notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($activity->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dependency Id') ?></th>
            <td><?= $this->Number->format($activity->dependency_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio') ?></th>
            <td><?= $this->Number->format($activity->folio) ?></td>
        </tr>
    </table>
</div>
