<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
    //  debug($request);

?>
<div class="journeys view large-9 medium-8 columns content">
    <!-- <h3><?= h($journey->ubicacion . ", " .$journey->municipio) ?></h3> -->
    <h3 class="mb-0 pb-0">Resúmen de solicitudes</h3>
    <h5 class="mb-0"><strong> Jornada <?= h($journey->ubicacion . ", " .$journey->municipio) ?></strong></h5>
    <p><?= "El día " . date("d-M-y", strtotime($journey->date)) . " | Desde las " . date("H:i A", strtotime($journey->horainicio)) . " hasta las " . date("H:i A", strtotime($journey->horatermino)) ?></p>
    <!-- <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mapa') ?></th>
            <td><?= h($journey->photo) ?></td>
        </tr>
    </table> -->
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Solicitudes</th>
      <th scope="col">Contacto</th>
      <th scope="col">Viabilidad</th>
      <th scope="col">Presupuesto</th>
      <th scope="col">Concluidas</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php if($GobernadorSinFolio) { echo $GobernadorSinFolio->count(); } else { echo '0'; }?></td>
      <td>Compromisos del Gobernador</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <td><?php if($GobernadorConFolio) { echo $GobernadorConFolio->count(); } else { echo '0'; }?></td>
      <td>Compromisos del Gobernador con Folio</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <td><?php echo $SolicitudesNormales->count(); ?></td>
      <td>Folios asignados a SIDURT</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
    <tr>
      <td><strong><?php echo $total_solicitudes; ?></strong></td>
      <td></td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
    </tr>
  </tbody>
</table>
<?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add', $journey->id],['class'=>'btn btn-info mr-3']) ?>
<?= $this->Html->link(__('Ver solicitudes de la jornada'), ['controller' => 'Requests', 'action' => 'index', $journey->id],['class'=>'btn btn-info']) ?>
</div>
