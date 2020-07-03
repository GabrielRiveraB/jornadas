<?php
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];
?>
<div class="index large-9 medium-8 columns content">

    <h3 class="h3 mb-3 text-gray-800"><?= __('Jornadas sin solicitudes') ?></h3>

    <div class="row">
    <?php foreach ($jornadas as $jornada): ?>
        <div class="col-sm-12 col-md-3 mb-3">
        <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo h(date("d-M-y", strtotime($jornada->fecha))); ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo h($jornada->jornada); ?></div>
                    </div>
                    <div class="col-auto">
                    <?= $this->Html->link('Agregar',['controller'=>'requests','action' => 'add', $jornada->id],['class' => 'btn btn-sm btn-primary stretched-link']) ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>

    <?php endforeach; ?>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
        <div class="table-responsive-md">
        
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Últimas solicitudes registradas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

        <table class="table table-striped table-bordered">
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


        </div>
        </div>

    </div>