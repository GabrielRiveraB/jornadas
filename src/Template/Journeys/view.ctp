<?php
/**
 * @var \App\View\AppView $this
 * * @var \App\Eddit\AppEdit $this
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
<div class="card shadow mb-4">
  <div class="card-body">
    <h5 class="mb-1 font-weight-bold text-primary">Jornada <?= h($journey->ubicacion . ", " .$journey->municipio) ?></h5>
    <p class="m-0"><?= "Día " . date("d-M-y", strtotime($journey->date)) . " | De las " . date("H:i A", strtotime($journey->horainicio)) . " a las " . date("H:i A", strtotime($journey->horatermino)) ?></p>
  </div>
</div>

<div class="row">
  
<div class="col-sm-12 col-md-2 mb-2 ">
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


              <div class="col-sm-12 col-md-2 mb-2">
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


              <div class="col-sm-12 col-md-2 mb-2">
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
              
              
              <div class="col-sm-12 col-md-2 mb-2">
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


<div class="journeys view large-9 medium-8 columns content">
    
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
                      <th class="text-center" style="width:  36%">UBICACION</th>

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
                     
                     
                     <td class="text-center"><?= $pavimentacion->dependency_id?>  
                    
                       
                      
                      </td>

                      <td class="text-center"><?= $pavimentacion->dependencie['name'] ? $pavimentacion->dependencie['name'] : ""; ?></td>
                      
                      <td class="text-center"><?= $pavimentacion->ubicacion ?></td>

                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                    </tr>

                <?php endforeach; ?>
                  </tbody>

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

                </table>
              </div>
            </div>            
        </div>



    <?php } else { ?>
    
    
    <?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add', $journey->id],['class'=>'btn btn-info mt-4']) ?>

    <?php } ?>
</div>


<div class="card shadow my-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Solicitudes de la </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
            <tr>
                <th style="width: 10%">Folio</th>                
                <th style="width: 45%">Solicitante</th>
                <th style="width: 15%">Peticiones</th>
                <th style="width:  16">Activities</th>
               
            </tr>
        </thead>
        <tbody>
       
        
   
            <?php foreach ($journey->requests as $request): ?>
              <tr style="<?php if(h ($request->gobernador)) { echo "background-color:yellow;";}?>">
            <td> <?php if($request->folio) { ?>
            <?= $this->Html->link($request->folio, ['action' => 'edit', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>





            
            <td><?= $this->Html->link($request->petitioner->name, []) ?></td>
            
            <td class="text-center"><?= $this->Html->link($request->activities[0]['cantidad'], []) ?></td>
            
            <td>
            <td class="text-center"><?= $this->Html->link($request->activities[0]['cantidad'], ['controller' => 'requests', 'action' => 'view', $request->id]) ?></td>
            <td class="text-center"><?= $this->Html->link($request->dependencies[0]['cantidad'], ['controller' => 'requests','action' => 'view', $request->id]) ?></td>
            
            <?= $this->Html->link($this->Html->tag('i', '', array('class' =>'fa fa-arrow-right')), array('controller' =>'activities','action'=>'create', $request->id), array('escape' =>false))?>
            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list-alt')), array('controller' => 'requests','action'=>'edit', $request->id), array('escape' => false)) ?>                    
                                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-trash')), array('controller' => 'requests', 'action' =>'delete', $request->id), array('escape' => false), __('Deseas eliminar esta dependencia?')); ?>
            </td>
            <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
               
            
                

                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    
                    
                    <?php } ?>
                    
                
                </td>
            

                
            
            
              
<tr>



            <?php endforeach; ?>
            
           


        </tbody>
    </table>      
    </div>
  </div>
</div>


<?php if (isset($current_user['role']) && $current_user['role'] != 'Secretaria') { ?>
<div class="requests index large-9 medium-8 columns content pt-4">

    <div class="table-responsive-md">

    </div>
</div>

<?php } ?>
