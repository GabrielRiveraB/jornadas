<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$solicitantes = $solicitantes->toArray();

?>
<?php echo $this->element('menu_capturista'); ?>
<div class="requests form large-9 medium-8 columns content">
<?= $this->Flash->render() ?>
    <?= $this->Form->create($request) ?>
    <fieldset>
        <legend><?= __('Captura los datos de la solicitud') ?></legend>
        <br>
        <?php
            echo $this->Form->control('folio');
            echo $this->Form->control('journey_id', ['placeholder'=>'Selecciona una jornada','options' => $journeys, 'label'=>'Jornada',
            'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);

            // DATOS DE LA PETICIÓN
            echo $this->Form->control('description',['label'=>'Descripción de la petición','type'=>'textarea']);

            // DATOS DEL SOLICITANTE
            echo "<p><strong>DATOS DEL SOLICITANTE</strong></p>";
            echo $this->Form->control('name', ['label'=>'Nombre del Solicitante','required'=>true]);
            echo $this->Form->control('edad', ['label'=>'Edad']);
            echo $this->Form->control('civilstatus',['label'=>'Estado civil']);
            echo $this->Form->control('address',['label'=>'Dirección']);
            echo $this->Form->control('phone',['label'=>'Teléfono','required'=>true]);
            echo $this->Form->control('email',['label'=>'Correo electrónico']);


            if(isset($user['role']) && $user['role'] === 'Administrador'){
                echo "<p><strong>Canalizar a:</strong></p>";
                echo $this->Form->control('sibso');
                echo $this->Form->control('cespt');
                echo $this->Form->control('educacion');
                echo $this->Form->control('municipio');
                echo $this->Form->control('dif');
                echo $this->Form->control('juventud');
                echo $this->Form->control('other',['label'=>'Otro']);
            }
            // echo $this->Form->control('gobernador');
            // echo $this->Form->control('promoter_id', ['options' => $promoters, 'label'=>'Promotor',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('concept_id', ['empty'=>'Sin categoría','options' => $concepts, 'label'=>'Categoría',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('type_id', ['empty'=>'Sin tipo','options' => $types, 'label'=>'Tipo de trabajo',
            // 'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true']);
            // echo $this->Form->control('priority');
            echo $this->Form->control('request_status_id', ['options' => $requestStatuses, 'value'=>'1', 'type'=>'hidden']);
        ?>
    </fieldset>
    <?php //echo $this->Form->button(__('Guardar'),['class'=>'btn btn-primary ml-3']); ?>
    <?php echo $this->Form->button(__('Guardar'),['class'=>'btn btn-primary mb-3']); ?>
    <?php echo $this->Form->end(); ?>
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
