<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request $request
 */
// debug($request);
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
            echo $this->Form->control('petitioner_id', ['type'=>'hidden','value'=>$request->id]);
            echo $this->Form->control('name', ['label'=>'Nombre del Solicitante','required','value'=>$request->petitioner['name']]);
            echo $this->Form->control('edad', ['label'=>'Edad','value'=>$request->petitioner['age']]);
            echo $this->Form->control('civilstatus',['label'=>'Estado civil','value'=>$request->petitioner['civilstatus']]);
            echo $this->Form->control('address',['label'=>'Dirección','value'=>$request->petitioner['address']]);
            echo $this->Form->control('phone',['label'=>'Teléfono','value'=>$request->petitioner['phone']]);
            echo $this->Form->control('email',['label'=>'Correo electrónico','value'=>$request->petitioner['email']]);


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
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Modificar petición'),['class'=>'btn btn-primary mb-5']); ?>
    <?php echo $this->Form->end(); ?>
</div>

