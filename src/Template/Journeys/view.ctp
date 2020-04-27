<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
?>
<div class="journeys view large-9 medium-8 columns content">
    <h3 class="mb-0"><strong> Solicitudes de la Jornada <br> <?= h($journey->ubicacion . ", " .$journey->municipio) ?></strong></h3>
    <p><?= "El día " . date("d-M-y", strtotime($journey->date)) . " | Desde las " . date("H:i A", strtotime($journey->horainicio)) . " hasta las " . date("H:i A", strtotime($journey->horatermino)) ?></p>
<?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add', $journey->id],['class'=>'btn btn-info mr-3']) ?>
</div>

<div class="requests index large-9 medium-8 columns content pt-4">

    <div class="table-responsive-md">
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
            <tr>
                <th>Folio</th>
                
                <th>Solicitante</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journey->requests as $request): ?>
            <tr>
            <td> <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>

            
            <td><?= $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) ?></td>
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
                <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Canalizar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
