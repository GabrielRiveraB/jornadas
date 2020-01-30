<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$solicitantes = $solicitantes->toArray();

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Jornada'), ['controller' => 'Journeys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Promotores'), ['controller' => 'Promoters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo promotor'), ['controller' => 'Promoters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Categorías'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva categoría'), ['controller' => 'Concepts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Tipos'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Tipo'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitantes'), ['controller' => 'Petitioners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo solicitantes'), ['controller' => 'Petitioners', 'action' => 'add']) ?></li>
        <!-- <li><?= $this->Html->link(__('List Request Statuses'), ['controller' => 'Requeststatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Request Status'), ['controller' => 'Requeststatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requestupdates'), ['controller' => 'Requestupdates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requestupdate'), ['controller' => 'Requestupdates', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="requests form large-9 medium-8 columns content">
    <?= $this->Form->create($request) ?>
    <fieldset>
        <legend><?= __('Formato de peticiones') ?></legend>
        <br>
        <?php
            echo $this->Form->control('folio');
            echo $this->Form->control('journey_id', ['placeholder'=>'Selecciona una jornada','options' => $journeys, 'label'=>'Jornada',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // DATOS DEL SOLICITANTE
            echo $this->Form->control('petitioner', ['label'=>'Nombre del Solicitante']);
            echo $this->Form->control('edad', ['label'=>'Edad']);
            echo $this->Form->control('civilstatus',['label'=>'Estado civil']);
            echo $this->Form->control('address',['label'=>'Dirección']);
            echo $this->Form->control('phone',['label'=>'Teléfono']);
            echo $this->Form->control('email',['label'=>'Correo electrónico']);

            // DATOS DE LA PETICIÓN
            echo $this->Form->control('description',['label'=>'Descripción de la petición','type'=>'textarea']);
            echo "<p><strong>Canalizar a:</strong></p>";
            echo $this->Form->control('sibso');
            echo $this->Form->control('cespt');
            echo $this->Form->control('educacion');
            echo $this->Form->control('municipio');
            echo $this->Form->control('dif');
            echo $this->Form->control('juventud');
            // echo $this->Form->control('gobernador');
            echo $this->Form->control('other',['label'=>'Otro']);

            // echo $this->Form->control('promoter_id', ['options' => $promoters, 'label'=>'Promotor',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('concept_id', ['empty'=>'Sin categoría','options' => $concepts, 'label'=>'Categoría',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('type_id', ['empty'=>'Sin tipo','options' => $types, 'label'=>'Tipo de trabajo',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('priority');
            // echo $this->Form->control('request_status_id', ['label'=>'Esstado de solicitud','options' => $requestStatuses, 'empty' => true, 'value'=>'1']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar petición')) ?>
    <?= $this->Form->end() ?>
</div>
<!--
<script>
  $( function() {
    var availableTags = [<?php echo '"' . implode ('","', array_values ($solicitantes)) . '"'; ?>];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script> -->
