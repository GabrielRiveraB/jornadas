<?php
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];
?>

<div class="row">
  
    <div class="col-sm-12 col-md-3 mb-2 ">
        <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-0">
                  <div class="row no-gutters align-items-center">

                    <div class="col-auto">
                    <div class="small-6 medium-3 columns">
                      <h2><strong><?= $total_solicitudes ?></h2></strong>
                      </div>
                    </div>

                    <div class="col">
                      <div class="text-xs font-weight-bold text-primary text-uppercase pl-3">SOLICITUDES</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>

                  </div>
                </div>
              </div>
    </div>


    <div class="col-sm-12 col-md-3 mb-2">
        <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-0">
                  <div class="row no-gutters align-items-center">

                    <div class="col-auto">
                    <div class="small-6 medium-3 columns">
                      <h2><strong><?= $total_peticiones ?></h2></strong>
                      </div>
                    </div>

                    <div class="col">
                      <div class="text-xs font-weight-bold text-primary text-uppercase pl-3">PETICIONES</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>

                  </div>
                </div>
              </div>
              </div>


              <div class="col-sm-12 col-md-3 mb-2">
        <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-0">
                  <div class="row no-gutters align-items-center">

                    <div class="col-auto">
                    <div class="small-6 medium-3 columns">
                      <h2><strong><?= $total_peticionesTurnadas ?></h2></strong>
                      </div>
                    </div>

                    <div class="col">
                      <div class="text-xs font-weight-bold text-primary text-uppercase pl-3">TURNADAS</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>

                  </div>
                </div>
              </div>
              </div>
              
              
              <div class="col-sm-12 col-md-3 mb-2">
        <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-0">
                  <div class="row no-gutters align-items-center">

                    <div class="col-auto">
                    <div class="small-6 medium-3 columns">
                      <h2><strong><?= $total_peticionesAtendidas ?></h2></strong>
                      </div>
                    </div>

                    <div class="col">
                      <div class="text-xs font-weight-bold text-primary text-uppercase pl-3">ATENDIDAS</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>

                  </div>
                </div>
              </div>
              </div>              
</div>

<div class="row mt-3">
    <div class="col-md-6">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitudes prioritaras</h6>
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
                                <?php foreach ($actividades as $request): ?>
                                <?php //debug($request->request); ?>
                                    <tr style="<?php if(h ($request->gobernador)) { echo "background-color:yellow;";}?>">
                                        <td><?php echo h(date("d-M-y", strtotime($request->modified))); ?></td>
                                        <td><?php echo h($request->request->folio); ?></td>
                                        <td><?php echo h($request->request->petitioner['name']); ?></td>

                                    

                                        <td><?php echo h($request->journey['ubicacion']) . ', '. strtoupper($request->journey['ubicacion']); ?></td>

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

        <div class="col-md-6">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Solicitudes asignadas</h6>
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
                            <?php foreach ($actividades as $request): ?>
                                <tr style="<?php if(h ($request->gobernador)) { echo "background-color:yellow;";}?>">
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




