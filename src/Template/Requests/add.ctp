<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
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
        <legend><?= __('Agregar solicitud') ?></legend>

        
        <?php
            echo $this->Form->control('journey_id', ['placeholder'=>'Selecciona una jornada','options' => $journeys, 'label'=>'Jornada',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('journey_id', ['class'=>'selectpicker']);
            echo $this->Form->control('promoter_id', ['options' => $promoters, 'label'=>'Promotor',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('promoter_id', ['options' => $promoters]);
            echo $this->Form->control('concept_id', ['empty'=>'Sin categoría','options' => $concepts, 'label'=>'Categoría',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('concept_id', ['options' => $concepts, 'empty' => true]);
            echo $this->Form->control('type_id', ['empty'=>'Sin tipo','options' => $types, 'label'=>'Tipo de trabajo',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('type_id', ['options' => $types, 'empty' => true]);
            echo $this->Form->control('petitioner_id', ['options' => $petitioners, 'label'=>'Solicitante',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('petitioner_id', ['options' => $petitioners]);
            
            echo $this->Form->control('folio');
            echo $this->Form->control('description');
            echo $this->Form->control('sibso');
            echo $this->Form->control('cespt');
            echo $this->Form->control('educacion');
            echo $this->Form->control('municipio');
            echo $this->Form->control('dif');
            echo $this->Form->control('juventud');
            echo $this->Form->control('other');
            echo $this->Form->control('gobernador');
            echo $this->Form->control('priority');
            echo $this->Form->control('request_status_id', ['options' => $requestStatuses, 'empty' => true]);
        ?>
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
    <!-- </div>
        </fieldset>
        <?= $this->Form->button(__('Agregar petición')) ?>
        <?= $this->Form->end() ?>
    </div> -->

<script>
  $( function() {
    var availableTags = <?php echo json_encode($petitioners, JSON_PRETTY_PRINT); ?>;
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
</script>