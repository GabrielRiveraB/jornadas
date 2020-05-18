<div class="large-9 medium-8 columns content pt-4">
<h3 class="mb-0"><strong> Resultados de la consulta</strong></h3>

<?php if(!$folios->isEmpty()) { ?>

<table class="table table-bordered table-bordered table-hover mt-4">
        <thead>
            <tr class="bg-danger">
            <th colspan="3" class="text-left text-white">SOLICITUDES POR FOLIO</th> 
            </tr>
            <tr class="table-secondary">
                <th style="width: 12%">Folio</th>
                <th style="width: 34%">Solicitante</th>
                <th style="width: 34%">Jornada</th>
                <!-- <th scope="col" class="actions" class="text-center" style="width: 20%"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($folios as $request): ?>
            <tr>
            <td>
                <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['controller'=>'requests','action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>
            <td><?= $this->Html->link($request['Petitioners']['name'], ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            <td><?= $request->has('Journeys') ? $this->Html->link($request['Journeys']['ubicacion'], ['controller' => 'Journeys', 'action' => 'view', $request['Journeys']['id']]) : '' ?></td>            
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
                <!-- <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Canalizar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['controller'=>'requests','action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller'=>'requests','action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
        <table class="table table-bordered table-bordered table-hover mt-4">
            <thead>
                <tr class="bg-danger">
                <th class="text-left text-white">SOLICITUDES POR FOLIO</th> 
                </tr>
                <tr>
                    <th class="text-left">No existen folios que coincidan con tu búsqueda.</th>
                </tr>
            </thead>
        </table>        
    <?php } ?>


    <?php if(!$nombres->isEmpty()) { ?>

    <table class="table table-responsive table-bordered table-hover mt-4">
        <thead>
            <tr class="bg-danger">
            <th colspan="3" class="text-left text-white">SOLICITUDES POR NOMBRE DEL SOLICITANTE</th> 
            </tr>
            <tr class="table-secondary">
                <th style="width: 12%">Folio</th>
                <th style="width: 34%">Solicitante</th>
                <th style="width: 34%">Jornada</th>
                <!-- <th scope="col" class="actions" class="text-center" style="width: 20%"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($nombres as $request): ?>
            <tr>
            <td>
                <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['controller'=>'requests','action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>
            <td><?= $this->Html->link($request['_matchingData']['Petitioners']['name'], ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            <td><?= $request->has('Journeys') ? $this->Html->link($request['Journeys']['ubicacion'], ['controller' => 'Journeys', 'action' => 'view', $request['Journeys']['id']]) : '' ?></td>            
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
                <!-- <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Canalizar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['controller'=>'requests','action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller'=>'requests','action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
        <table class="table table-responsive table-bordered table-hover mt-4">
            <thead>
                <tr class="bg-danger">
                <th class="text-left text-white">SOLICITUDES POR NOMBRE DEL SOLICITANTE</th> 
                </tr>
                <tr>
                    <th class="text-left">No existen solicitantes que coincidan con tu búsqueda.</th>
                </tr>
            </thead>
        </table>        
    <?php } ?>
    
    

    <?php if(!$solicitud->isEmpty()) { ?>

    <table class="table table-responsive table-bordered table-hover mt-4">
        <thead>
            <tr class="bg-danger">
            <th colspan="3" class="text-left text-white">SOLICITUDES POR DESCRIPCIÓN</th> 
            </tr>
            <tr class="table-secondary">
                <th style="width: 12%">Folio</th>
                <th style="width: 34%">Solicitante</th>
                <th style="width: 35%">Jornada</th>
                <!-- <th scope="col" class="actions" class="text-center" style="width: 20%"><?= __('Actions') ?></th> -->
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($solicitud as $request): ?>
            <tr>
            <td>
                <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['controller'=>'requests','action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>
            <td><?= $this->Html->link($request['Petitioners']['name'], ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            <td><?= $request->has('Journeys') ? $this->Html->link($request['Journeys']['ubicacion'], ['controller' => 'Journeys', 'action' => 'view', $request['Journeys']['id']]) : '' ?></td>            
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
                <!-- <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Canalizar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['controller'=>'requests','action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller'=>'requests','action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
        <table class="table table-responsive table-bordered table-hover mt-4">
            <thead>
                <tr class="bg-danger">
                <th class="text-left text-white">SOLICITUDES POR DESCRIPCIÓN</th> 
                </tr>
                <tr>
                    <th class="text-left">No existen solicitudes que coincidan con tu búsqueda.</th>
                </tr>
            </thead>
        </table>        
    <?php } ?>    
</div>