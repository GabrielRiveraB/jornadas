<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */

// $request = $request->toArray();
// debug($request->toArray());
?>

<div class="requests view large-9 medium-8 columns content">
    <h3 class="mb-0">Solicitud<?= h(' Folio '.$request->folio) ?></h3>
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

    <!-- <div class="related">
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
        <?php endif; ?>
    </div> -->
</div>
<div class="activities form large-9 medium-8 columns content">
    <?= $this->Form->create($activity) ?>
    <fieldset>
        <legend><?= __('Turnar a') ?></legend>
        <?php
            echo $this->Form->control('request_id', ['type' => 'hidden','value'=>$rid]);
            echo $this->Form->control('dependency_id',['label'=>'Dependencia']);
            echo $this->Form->control('concept_id', ['label'=>'Categoría','options' => $concepts, 'empty' => true]);
            echo $this->Form->control('ubicacion', ['label'=>'Ubicación']);
            // echo $this->Form->control('folio');
            echo $this->Form->control('notes',['label'=>'Comentarios','type'=>'textarea']);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
