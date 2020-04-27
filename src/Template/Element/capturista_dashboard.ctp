<?php
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];
// debug($solicitudes->toarray());
?>
<div class="index large-9 medium-8 columns content pt-4">

    <div class="container p-0">
        <div class="col-12 p-0">
            <input type="text" placeholder="Buscar registros..." id="mySearch" class="form-control"/>
        </div>
    </div>

    <h3><?= __('Jornadas sin solicitudes capturadas') ?></h3>

    <div class="row">
    <?php foreach ($jornadas as $jornada): ?>
    <div class="col-sm-12 col-md-6 mb-3">
        <div class="card">
        <div class="card-body">
        <small class="float-sm-right"> <?= $this->Html->link('Agregar',['controller'=>'requests','action' => 'add', $jornada->id],['class' => 'btn  btn-sm btn-primary stretched-link']) ?></small>
            <h5 class="card-title"><?php echo h($jornada->jornada); ?></h5>
            <p class="card-subtitle"> <?php echo h(date("d-M-y", strtotime($jornada->fecha))); ?></p>
        </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="table-responsive-md">
    
        <h3><?= __('Últimas solicitudes capturadas') ?></h3>

        <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="thead-light">
                        <th scope="col">Capturada</th>
                        <th scope="col">Folio</th>
                        <th scope="col">Solicitante</th>
                        <th scope="col" colspan="2">Jornada</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?php echo h(date("d-M-y", strtotime($request->modified))); ?></td>
                        <td><?php echo h($request->folio); ?></td>
                        <td><?php echo h($request->Petitioners['name']); ?></td>
                        <td><?php echo h($request->Journeys['ubicacion']) . ', '. strtoupper($request->Journeys['municipio']); ?></td>
                        <td><?= $this->Html->link(__('Editar'), ['controller'=>'requests','action' => 'edit', $request->id]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?></td>
                    </tr>
                <?php endforeach; ?>  
                </tbody>
            </table>


        </div>
        </div>

    </div>