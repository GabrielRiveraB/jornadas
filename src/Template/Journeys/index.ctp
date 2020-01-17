<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey[]|\Cake\Collection\CollectionInterface $journeys
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Nueva Jornada'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Acciones'), ['controller' => 'Works', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="journeys index large-9 medium-8 columns content">
    <h3><?= __('Jornadas') ?></h3>
    <div class="small-12 bg-light p-3 mb-3">
        <p><strong>Filtros</strong></p>
        <?= $this->Form->create(null,['type' => 'file']) ?>
            <?php echo $this->Form->control('municipios',['label'=>'Municipio','Selected'=>'Mexicali']);?>
        <?= $this->Form->end() ?>
    </div>
    <?php foreach ($journeys as $journey): ?>
    <div class="card mb-3" >
    <div class="card-body">
        <h5 class="card-title"><?= $this->Html->link(h($journey->ubicacion.', '.$journey->municipio), ['action' => 'view', $journey->id], ["class"=>"stretched-link"]) ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= h(date("d-M-y", strtotime($journey->date))) ?></h6>
        <a href="#" class="card-link"><?= $this->Html->link('Editar', ['action' => 'edit',$journey->id], ['class'=>'btn btn-primary btn-sm']) ?></a>
        <a href="#" class="card-link"><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $journey->id],['class'=>'btn btn-danger btn-sm'], 
        ['confirm' => __('Se eliminarán todos los datos de la jornada si presionas Aceptar', $journey->id)]) ?></a>
    </div>
    </div>

    <?php endforeach; ?>
    <?php echo $this->element('table_paginate'); ?>
</div>
<script>
function filterResults(){
    // Now get the values of checkbox
    var chk1 = $('#checkbox1').val(); // checkbox1 is id of checkbox
    $.ajax({
     type : 'POST',
     url : 'process.php';
     data : 'check='+chk1,
     success : function(data){
          $('#data-div').html(data); // replace the contents coming from php file
     }  
    });
}
</script>