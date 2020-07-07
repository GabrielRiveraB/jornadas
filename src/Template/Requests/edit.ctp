<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
// debug($request);
?>
<div class="requests form large-9 medium-8 columns content">
<?= $this->Flash->render() ?>
    <?= $this->Form->create($request) ?>
    <div class="card shadow mb-4">
  <div class="card-header py-3">
    <fieldset>
    <h6 class="m-0 font-weight-bold text-primary">Captura los datos de la solicitud</h6>
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
            <?php echo $this->Form->control('name', ['label'=>'Nombre del Solicitante','required'=>true,'value'=>$request->petitioner['name']]); ?>
          </div>
          <div class="col-2 pr-0">
            <?php echo $this->Form->control('edad', ['label'=>'Edad','value'=>$request->petitioner['age']]); ?>
          </div>
        </div>

        <div class="row m-0">
          <div class="col-3 pl-0">
            <?php echo $this->Form->control('civilstatus',['label'=>'Estado civil','value'=>$request->petitioner['civilstatus']]); ?>
          </div>
          <div class="col-4">
            <?php echo $this->Form->control('phone',['label'=>'Teléfono','required'=>true,'value'=>$request->petitioner['phone']]); ?>
          </div>
          <div class="col-5 pr-0">
            <?php echo $this->Form->control('email',['label'=>'Correo electrónico','value'=>$request->petitioner['email']]); ?>
          </div>
        </div>

        <?php
            echo $this->Form->control('address',['label'=>'Dirección','value'=>$request->petitioner['address']]);


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
        <div class="col-3 pl-0">
<?php echo $this->Form->control('gobernador',['label'=>'Asistio el gobernador']); ?>
</div>
    </fieldset>
    <?php echo $this->Form->button(__('Modificar petición'),['class'=>'btn btn-primary mb-5']); ?>
    <?php echo $this->Form->end(); ?>
</div>

