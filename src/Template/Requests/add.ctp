<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
$solicitantes = $solicitantes->toArray();

?>
<div class="requests form large-9 medium-8 columns content">
<?= $this->Flash->render() ?>
    <?= $this->Form->create($request) ?>
    <fieldset>
        <legend><?= __('Captura los datos de la solicitud') ?></legend>
        <br>
        <div class="row m-0">
          <div class="col-6 pl-0">
            <?php echo $this->Form->control('folio'); ?>
          </div>
          <div class="col-6 pr-0">
            <?php
                echo $this->Form->control('journey_id', ['placeholder'=>'Selecciona una jornada','options' => $journeys, 'label'=>'Jornada',
                'onchange'=>'', 'class'=>'selectpicker', 'data-live-search'=>'true', 'data-size'=>'8']);
            ?>
          </div>
        </div>

        <?php
            // DATOS DE LA PETICIÓN
            echo $this->Form->control('description',['label'=>'Descripción de la petición','type'=>'textarea']);

            // DATOS DEL SOLICITANTE
            echo "<p><strong>DATOS DEL SOLICITANTE</strong></p>"; ?>
            
        <div class="row m-0">
          <div class="col-10 pl-0">
            <?php echo $this->Form->control('name', ['label'=>'Nombre del Solicitante','required'=>true]); ?>
          </div>
          <div class="col-2 pr-0">
            <?php echo $this->Form->control('edad', ['label'=>'Edad']); ?>
          </div>
        </div>

        <div class="row m-0">
          <div class="col-3 pl-0">
            <?php echo $this->Form->control('civilstatus',['label'=>'Estado civil']); ?>
          </div>
          <div class="col-4">
            <?php echo $this->Form->control('phone',['label'=>'Teléfono','required'=>true]); ?>
          </div>
          <div class="col-5 pr-0">
            <?php echo $this->Form->control('email',['label'=>'Correo electrónico']); ?>
          </div>
        </div>

        <?php
            echo $this->Form->control('address',['label'=>'Dirección']);


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
            echo $this->Form->control('request_status_id', ['options' => $requestStatuses, 'value'=>'1', 'type'=>'hidden']);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Guardar'),['class'=>'btn btn-primary mb-3']); ?>
    <?php echo $this->Form->button(__('Guardar y capturar otra'),['class'=>'btn btn-primary mr-3']); ?>
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
