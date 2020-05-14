<?php
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];

// $jornada = $actividades->toarray();
$resumen = [['id'=>'','ubicacion'=>'','municipio'=>'','pavimentacion'=>0,'regularizacion'=>0,'espacios'=>0,'otros'=>0]];
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
    if($actividad->concepto=='PAVIMENTACIÓN') {
        $resumen[$contador]['pavimentacion']=$actividad->cantidad;
    } elseif($actividad->concepto=='REGULARIZACIÓN') {
        $resumen[$contador]['regularizacion']=$actividad->cantidad;
    } elseif($actividad->concepto=='REHABILITACIÓN DE ESPACIOS PÚBLICOS') {
        $resumen[$contador]['espacios']=$actividad->cantidad;
    } else {
        $resumen[$contador]['otros']=$resumen[$contador]['otros']+$actividad->cantidad;
    }
    $jornadaprevia = $actividad->jornada;
    // debug($jornadaprevia);
endforeach;
// debug($resumen);

?>
<div class="index large-9 medium-8 columns content pt-4">
  <?= $this->Form->create(null, ['url' => ['controller' => 'Users','action' => 'results']]) ?>  
  <div class="row p-0">
        <div class="input-group col-sm-12">
              <input type="text" minlength="3" class="form-control bg-light border-0 small" placeholder="Buscar registros..." aria-label="Search" aria-describedby="basic-addon2" required>
              <div class="input-group-append">
                
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <br>
    <h3 class="mb-0"><strong> Resúmen de la última jornada </strong></h3>
    <p> Del <?php echo (date_format($fechaUltimaJornada,'d M Y')); ?></p>

    <div class="table-responsive">
                <table class="table table-bordered table-striped table-bordered table-hover" id="dataTable" cellspacing="0">
                  <thead>
                    <tr class="bg-danger">
                      <th colspan="2" class="text-center text-white" style="width: 40%">UBICACION</th>
                      <th class="text-center text-white">PAVIMENTACION</th>
                      <th class="text-center text-white">ESPACIOS PUB.</th>
                      <th class="text-center text-white">REGULARIZACION</th>
                      <th class="text-center text-white">OTROS</th>
                      <th class="text-center text-white">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($resumen as $colonia): ?>
                    <?php $total = 0; ?>
                    <tr> 
                        <td colspan="2" ><?= $this->Html->link($colonia['ubicacion'].", ".$colonia['municipio'], ['controller' => 'Journeys', 'action' => 'view', $colonia['id']]) ?></td>                       
                        <td class="text-center"><?php echo isset($colonia['pavimentacion'])  ? $colonia['pavimentacion'] : 0 ; ?></td>
                        <td class="text-center"><?php echo isset($colonia['espacios']) ? $colonia['espacios'] : 0 ; ?></td>
                        <td class="text-center"><?php echo isset($colonia['regularizacion'])  ? $colonia['regularizacion'] : 0 ; ?></td>
                        <td class="text-center"><?php echo isset($colonia['otros'])  ? $colonia['otros'] : 0 ; ?></td>
                        <?php  
                        if(isset($colonia['pavimentacion'])) { $total = $total + $colonia['pavimentacion']; }
                        
                        if(isset($colonia['espacios'])) { $total = $total + $colonia['espacios']; }
                        
                        if(isset($colonia['regularizacion'])) { $total = $total + $colonia['regularizacion']; }
                        
                        if(isset($colonia['otros'])) { $total = $total + $colonia['otros']; }
                        
                        ?>
                        <td class="text-center"><?php echo $total; ?></td>
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


<!-- 
    <div class="row mt-3">
        <div class="col-sm-12">
        <div class="table-responsive-md">
            <table class="table table-striped table-bordered table-hover">
            <thead>
                    <tr class="table-primary">
                        <th scope="col" colspan="4">Resúmen de la última jornada</th>
                        <th colspan='2' class="text-center"><?php echo (date_format($fechaUltimaJornada,'d M Y')); ?></th>
                    </tr>
                    <tr class="table-secondary">
                        <th scope="col" class="small">UBICACION</th>
                        <th scope="col" class="small">PAVIMENTACION</th>
                        <th scope="col" class="small">ESPACIOS PUB.</th>
                        <th scope="col" class="small">REGULARIZACION</th>
                        <th scope="col" class="small">OTROS</th>
                        <th scope="col" class="small">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($resumen as $colonia): ?>
                    <?php $total = 0; ?>
                    <tr>
                        <td><?php echo($colonia['ubicacion'].', '.$colonia['municipio']); ?></td>                       
                        <td><?php echo isset($colonia['pavimentacion'])  ? $colonia['pavimentacion'] : 0 ; ?></td>
                        <td><?php echo isset($colonia['espacios']) ? $colonia['espacios'] : 0 ; ?></td>
                        <td><?php echo isset($colonia['regularizacion'])  ? $colonia['regularizacion'] : 0 ; ?></td>
                        <td><?php echo isset($colonia['otros'])  ? $colonia['otros'] : 0 ; ?></td>
                        <?php  
                        if(isset($colonia['pavimentacion'])) { $total = $total + $colonia['pavimentacion']; }
                        
                        if(isset($colonia['espacios'])) { $total = $total + $colonia['espacios']; }
                        
                        if(isset($colonia['regularizacion'])) { $total = $total + $colonia['regularizacion']; }
                        
                        if(isset($colonia['otros'])) { $total = $total + $colonia['otros']; }
                        
                        ?>
                        <td><?php echo $total; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div> -->


    <!-- <div class="row mt-3">
        <div class="col-sm-12">
        <div class="table-responsive-md">
            <table class="table table-striped table-bordered table-hover">
            <thead>
                    <tr class="thead-light">
                        <th scope="col" colspan="3">Resúmen de la última jornada</th>
                        <th>fecha</th>
                    </tr>
                    <tr class="thead">
                        <th scope="col">Ubicación</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Espacios</th>
                        <th scope="col">Regularización</th>
                        <th scope="col">Ordenamiento</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php //foreach ($actividades as $actividad): ?>
                    <?php //debug($actividad); ?>
                    <tr>
                        <td><?php //echo($actividad['jornada'].', '.$actividad['mun']); ?></td>                       
                        <td><?php //echo h($actividad->concepto); ?></td>
                        <td><?php //echo h($actividad->cantidad); ?></td>
                    </tr>
                <?php //endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div> -->



</div>