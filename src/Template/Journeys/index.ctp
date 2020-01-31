<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey[]|\Cake\Collection\CollectionInterface $journeys
 */
$municipio = "";
$sinfolio = $confolio = 0;
// debug($current_user);
?>
<?php echo $this->element('menu_capturista'); ?>
<div class="journeys index large-9 medium-8 columns content">
    <h3><?= __('Resúmen de jornadas') ?></h3>
    <div class="small-12 bg-light p-3 mb-3">
        <?= $this->Form->create(null,['type' => 'file']) ?>
            <?php echo $this->Form->control('municipios',['label'=>'Filtrar por municipio','Selected'=>'Mexicali']);?>
        <?= $this->Form->end() ?>
    </div>
    <!-- <?php debug($journeys); ?> -->
    <div class="table-responsive-md">
<table class="table">
    <?php foreach ($journeys as $journey): ?>


  <?php if($municipio != $journey->municipio) {?>

  <thead class="thead-light">
    <tr>
      <th scope="col" colspan="5"><?php echo "Municipio de " . $journey->municipio; ?></th>
    </tr>
  </thead>
  <tr>
      <th >Colonia</th>
      <th scope="col">Fecha</th>
      <th scope="col">Con Folio</th>
      <th scope="col">Sin Folio</th>
      <th scope="col">Presupuesto</th>
    </tr>
  <tbody>
  <?php }  ?>
    <tr>
      <td scope="row"><?= $this->Html->link(h($journey->ubicacion), ['action' => 'view', $journey->id]) ?></td>
      <td><?php echo h(date("d-M-y", strtotime($journey->date))); ?></td>
      <td>
        <?php
            foreach ($journey->requests as $request):
                if($request->folio)
                {
                    $confolio++;
                } else {
                    $sinfolio++;
                }
            endforeach;
            echo $confolio;
        ?>
      </td>
      <td><?php echo $sinfolio; ?></td>
      <td></td>
      <?php $confolio = $sinfolio = 0; ?>
    </tr>
</tbody>


    <!-- <div class="card mb-3" >
    <div class="card-body">
        <h5 class="card-title"><?= $this->Html->link(h($journey->ubicacion.', '.$journey->municipio), ['action' => 'view', $journey->id], ["class"=>"stretched-link"]) ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= h(date("d-M-y", strtotime($journey->date))) ?></h6>
        <a href="#" class="card-link"><?= $this->Html->link('Editar', ['action' => 'edit',$journey->id], ['class'=>'btn btn-primary btn-sm']) ?></a>
        <a href="#" class="card-link"><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $journey->id],['class'=>'btn btn-danger btn-sm'],
        ['confirm' => __('Se eliminarán todos los datos de la jornada si presionas Aceptar', $journey->id)]) ?></a>
    </div>
    </div> -->


<?php



    $municipio = $journey->municipio;

?>
    <?php endforeach; ?>
    </table>
    </div>
    <?php echo $this->element('table_paginate'); ?>
</div>
<script>
function filterResults(){
    // Now get the values of checkbox
    var chk1 = $('#checkbox1').val(); // checkbox1 is id of checkbox
    $.ajax({
     type : 'POST',
     url : 'process.php',
     data : 'check='+chk1,
     success : function(data){
          $('#data-div').html(data); // replace the contents coming from php file
     }
    });
}
</script>
