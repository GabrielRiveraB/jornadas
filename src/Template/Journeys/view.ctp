<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 * @var \App\Model\Entity\journeys $journeys
 */

$resumen = [['id'=>'','ubicacion'=>'','municipio'=>0,'pavimentacion'=>0,'regularizacion'=>0,'espacios'=>0,'otros'=>0]];
$contador = 0;
$jornadaprevia = '';

// debug($actividades->toarray());

foreach ($actividades as $actividad):
    if($jornadaprevia != $actividad->jornada && $jornadaprevia!='') {
        $contador = $contador + 1;
        $resumen[$contador]['otros']=0;
    }
    $resumen[$contador]['id']=$actividad->id;
    $resumen[$contador]['ubicacion']=$actividad->jornada;
    $resumen[$contador]['municipio']=$actividad->mun; 
    $resumen[$contador]['dependencia']=$actividad->dep;

    if($actividad->concepto=='PAVIMENTACIÓN') {
        $resumen[$contador]['pavimentacion']=$actividad->cantidad;
    } elseif($actividad->concepto=='REGULARIZACIÓN'){
        $resumen[$contador]['regularizacion']=$actividad->cantidad;
    } elseif($actividad->concepto=='REHABILITACIÓN DE ESPACIOS PÚBLICOS') {
        $resumen[$contador]['espacios']=$actividad->cantidad;
    } else {
        $resumen[$contador]['otros']=$resumen[$contador]['otros']+$actividad->cantidad;
    }
    $jornadaprevia = $actividad->jornada;
    // debug($jornadaprevia);
endforeach;

?>
<div class="journeys view large-9 medium-8 columns content">
    <h3 class="mb-0"><strong> Solicitudes de la Jornada <?= h($journey->ubicacion . ", " .$journey->municipio) ?></strong></h3>
    <p><?= "Día " . date("d-M-y", strtotime($journey->date)) . " | De las " . date("H:i A", strtotime($journey->horainicio)) . " a las " . date("H:i A", strtotime($journey->horatermino)) ?></p>
    <div class="row">
            <div class="small-6 medium-3 columns">
            <h2><strong><?= $total_solicitudes ?></h2></strong>solicitudes
            </div>
            <div class="small-6 medium-3 columns">
            <h2> <strong><?= $total_peticiones ?></h2></strong> peticiones
            </div>
            <div class="small-6 medium-3 columns">
            <h2><strong><?= $total_peticionesTurnadas ?></h2></strong> turnadas
            </div>
            <div class="small-6 medium-3 columns">
            <h2><strong><?= $total_peticionesAtendidas ?></h2></strong> atendidas
            </div>
        </div> 
    
    <?php if (isset($current_user['role']) && $current_user['role'] === 'Secretaria') { ?>

        <div class="row">        
        <div class="card-body">
              
             
             
             
              <div class="table-responsive">
                <table class="table table-bordered table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-danger">
                        <th colspan="9 " class="text-left text-white">PAVIMENTACIONES</th>
                        <th colspan="2" class="text-center text-white"><?= $totalPavimentaciones . " EN TOTAL" ?></th>
                    </tr>
                    <tr class="table-secondary">
                      <th class="text-center" style="width: 2%">No. DE SOL. </th>
                      <th class="text-center" style="width: 10%">FOLIO</th>
                       <th class="text-center" style="width: 36%">TIPO</th>
                      <th class="text-center" style="width: 26%">ESTATUS</th>

                      <th class="text-center" style="width: 36%">ASIGNADA A</th>
                      <th class="text-center" style="with:  36%">UBICACION</th>

                      <th class="text-center" style="width: 16%">ML</th>
                      <th class="text-center" style="width: 10%">MDP</th>
                      <th class="text-center" style="width: 2%">PROY</th> 
                      <th class="text-center" style="width: 2%">LICI</th>
                      <th class="text-center" style="width: 2%">EJEC</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($pavimentaciones as $pavimentacion): ?>
                  <tr>
                      <td class="text-center"></td>
                      <td class="text-center"><?= $pavimentacion->request['folio'] ?  $pavimentacion->request['folio'] : ""; ?></td>
                      <td class="text-center"><?= $pavimentacion->concept['name'] ?  $pavimentacion->concept['name'] : ""; ?></td>
                      <td class="text-center"><?= $pavimentacion->status ?></td>
                     
                     
                      <td class="text-center"><?= $pavimentacion->dependency_id?></td>
                      <td class="text-center"><?= $pavimentacion->ubicacion ?></td>

                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                    </tr>

                <?php endforeach; ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="2" ></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> </th>
                      <th></th>
                    </tr>
                  </tfoot>                   -->
                </table>
              </div>
            </div>

          
          
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-danger">
                        <th colspan="9" class="text-left text-white">ESPACIOS PÚBLICOS</th>
                        <th colspan="2" class="text-center text-white"><?= $totalEspaciosPublicos . " EN TOTAL" ?></th>
                    </tr>
                    <tr class="table-secondary">
                      <th class="text-center" style="width: 5%">No. DE SOL.	</th>
                      <th class="text-center" style="width: 10%">FOLIO</th>
                      <th class="text-center" style="width: 20%">TIPO</th>
                      <th class="text-center" style="width: 30%">ESTATUS</th>
                      <th class="text-center" style="width: 36%">ASIGNADA A</th>
                      <th class="text-center" style="width: 30%">UBICACION</th>
                      <th class="text-center" style="width: 5%">ML</th>
                      <th class="text-center" style="width: 10%">MDP</th>
                      <th class="text-center" style="width: 5%">PROY</th>
                      <th class="text-center" style="width: 5%">LICI</th>
                      <th class="text-center" style="width: 5%">EJEC</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($espaciosPublicos as $espacio): ?>
                  <tr>
                      <td class="text-center"></td>
                      <td class="text-center"><?= $espacio->request['folio'] ?  $espacio->request['folio'] : ""; ?></td>
                      <td class="text-center"><?= $espacio->concept['name'] ?  $espacio->concept['name'] : ""; ?></td>
                      <td class="text-center"><?= $espacio->status ?></td>
                      <td class="text-center"><?= $espacio->dependency_id?></td>
                      <td class="text-center"><?= $espacio->ubicacion ?></td>
                      
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                    </tr>
                <?php endforeach; ?>
                  
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="2" ></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> </th>
                      <th></th>
                    </tr>
                  </tfoot>                   -->
                </table>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-danger">
                        <th colspan="9" class="text-left text-white">REGULARIZACIÓN</th>
                        <th colspan="2" class="text-center text-white"><?= $totalRegularizaciones . " EN TOTAL" ?></th>
                    </tr>
                    <tr class="table-secondary">
                      <th class="text-center" style="width: 5%">No. DE SOL.	</th>
                      <th class="text-center" style="width: 10%">FOLIO</th>
                      <th class="text-center" style="width: 20%">TIPO</th>
                      <th class="text-center" style="width: 30%">ESTATUS</th>
                      <td class="text-center" style="width: 36%">ASIGNADA A</td>
                      <th class="text-center" style="width: 35%">UBICACION</th>
                      <th class="text-center" style="width: 5%">ML</th>
                      <th class="text-center" style="width: 10%">MDP</th>
                      <th class="text-center" style="width: 5%">PROY</th>
                      <th class="text-center" style="width: 5%">LICI</th>
                      <th class="text-center" style="width: 5%">EJEC</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($regularizaciones as $regularizacion): ?>
                  <tr>
                      <td class="text-center"></td>
                      <td class="text-center"><?= $regularizacion->request['folio'] ?  $regularizacion->request['folio'] : ""; ?></td>
                      <td class="text-center"><?= $regularizacion->concept['name'] ?  $regularizacion->concept['name'] : ""; ?></td>
                      <td class="text-center"><?= $regularizacion->status ?></td>
                      <td class="text-center"><?= $regularizacion->dependency_id?></td>
                      <td class="text-center"><?= $regularizacion->ubicacion ?></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                    </tr>
                <?php endforeach; ?>
                  
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="2" ></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> </th>
                      <th></th>
                    </tr>
                  </tfoot>                   -->
                </table>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="bg-danger">
                        <th colspan="9" class="text-left text-white">OTROS</th>
                        <th colspan="2" class="text-center text-white"><?= $totalOtros . " EN TOTAL" ?></th>
                    </tr>
                    <tr class="table-secondary">
                      <th class="text-center" style="width: 5%">No. DE SOL.</th>
                      <th class="text-center" style="width: 10%">FOLIO</th>
                      <th class="text-center" style="width: 20%">TIPO</th>
                      <th class="text-center" style="width: 30%">ESTATUS</th>
                      <td class="tezt-center" style="width: 36%"> ASIGNADA A </th>
                      <th class="text-center" style="width: 35%">UBICACION</th>
                      <th class="text-center" style="width: 5%">ML</th>
                      <th class="text-center" style="width: 10%">MDP</th>
                      <th class="text-center" style="width: 5%">PROY</th>
                      <th class="text-center" style="width: 5%">LICI</th>
                      <th class="text-center" style="width: 5%">EJEC</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($otros as $otro): ?>
                  <tr>
                      <td class="text-center"></td>
                      <td class="text-center"><?= $otro->request['folio'] ?  $otro->request['folio'] : ""; ?></td>
                      <td class="text-center"><?= $otro->concept['name'] ?  $otro->concept['name'] : ""; ?></td>
                     <td class="text-center"><?= $otro->status ?></td>

                   <td class="text-center"><?= $otro->dependency_id?></td>
                     <td class="text-center"><?= $otro->ubicacion ?></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      
                    </tr>
                <?php endforeach; ?>
                  
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="2" ></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th> </th>
                      <th></th>
                    </tr>
                  </tfoot>                   -->
                </table>
              </div>
            </div>            
        </div>



    <?php } else { ?>
    
    
    <?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add', $journey->id],['class'=>'btn btn-info mt-4']) ?>

    <?php } ?>
</div>

<?php if (isset($current_user['role']) && $current_user['role'] != 'Secretaria') { ?>
<div class="requests index large-9 medium-8 columns content pt-4">

    <div class="table-responsive-md">
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
            <tr>
                <th style="width: 10%">Folio</th>
                
                <th style="width: 45%">Solicitante</th>
                <th style="width: 15%">Peticiones</th>
                <th scope="col" class="actions" style="width: 30%"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
       
        

                 
            <?php foreach ($journey->requests as $request): ?>
            <tr>
            <td> <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['controller'=>'requests','action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>





           
            <?php $this->loadModel('Activities');
            $activities = $this->Activities->find('all',
            ['conditions'=> ['Activities.dependency_id' => $id],
            'contain' => ['dependencies','Requests'],
            ]);?>







            
            <td><?= $this->Html->link($request->petitioner->name, ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            
            <td class="text-center"><?= $this->Html->link($request->activities[0]['cantidad'], ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            <td class="text-center"><?= $this->Html->link($request->dependencies[0]['cantidad'], ['controller' => 'requests','action' => 'view', $request->id]) ?></td>              ])
            
            <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
               
               
                <td class="actions">

                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Turnar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td>
            

                
            
            
              
<tr>



            <?php endforeach; ?>
            
           


        </tbody>
    </table>
    </div>
</div>

<?php } ?>
