<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
<div class="requests view large-9 medium-8 columns content">
    <h2 class="mb-0">Solicitud<?= h(' Folio '.$request->folio) ?></h2>
    <p class="mb-3">Jornada del <?= $request->journey->date ?> en <?= $request->has('journey') ? $this->Html->link($request->journey->ubicacion.', '.$request->journey->municipio, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></p>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><?= $request->has('petitioner') ? $request->petitioner->name : '' ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= 'Teléfono: ' . $request->petitioner->phone . '   ' . 'Email: ' . $request->petitioner->email?></h6>
        </div>
        <div class="card-body">
            <p class="card-text"><?= h($request->description) ?></p>

        </div>
        <ul class="list-group list-group-flush m-0">
            <li class="list-group-item pl-0">
                <div class="small-12 medium-4 columns">
                   <strong>Contacto </strong><?= $request->contacto ? ' Contactado' : ' Pendiente' ?>
                </div>
                <div class="small-12 medium-4 columns">
                    <strong>Viabilidad </strong><?= $request->contacto ? ' Viable' : ' Pendiente' ?>
                </div>
                <div class="small-12 medium-4 columns">
                    <strong>Presupuesto </strong><?= $request->contacto ? ' Presupuestado' : ' Pendiente' ?>
                </div>
            </li>
        </ul>


    </div>

    <div class="related">
        <h4><?= __('Últimas actualizaciones') ?></h4>
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
        <?php else: ?>
            <p>No existen actualizaciones disponibles.</p>

        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Peticiones') ?></h4>
        <?php if (!empty($request->activities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Categoria') ?></th>
                <th scope="col"><?= __('Dependencia') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($request->activities as $activity): ?>
            <tr>
                <td><?= h($activity['Concepts']['name']) ?></td>
                <td><?= h($activity['Dependencies']['name']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>

                    <!-- <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-eye pr-1')), array('action' => 'view', $dependency->id), array('escape' => false)) ?>                   -->
                    <!-- <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-trash')), array('action' => 'delete', $dependency->id), array('escape' => false), __('Deseas eliminar esta dependencia?')); ?> -->

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
