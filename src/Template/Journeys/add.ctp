<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Captura los datos de la jornada</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <?= $this->Form->create($journey,['type' => 'file']) ?>
    <fieldset>


        <div class="row m-0">
            <div class="col-6 pl-0">
                <?php echo $this->Form->control('municipio'); ?>
            </div>

            <div class="col-6 pr-0">
                <?php
                echo $this->Form->control('fecha', ['label'=>'Fecha','empty' => true, 'placeholder'=>'Ej. 2020-01-01', 'required']);
                ?>
            </div>
        </div>



        <?php

            echo $this->Form->control('ubicacion',['label'=>'Colonia / ubicación','required']);

           // echo $this->Form->control('inicio', ['label'=>'Hora de inicio','empty' => true]);
           //  echo $this->Form->control('termino', ['label'=>'Hora de sterminación','empty' => true]);
            echo $this->Form->control('geolocalizacion', ['label'=>'URL de Google','empty' => true]);
           // echo $this->Form->control('photo', ['label'=>'Foto de la jornada','type'=>'file']);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Crear Jornada'),['class'=>'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
    </div>
  </div>
</div>


<script>
// http://www.daterangepicker.com/

$('input[name="fecha"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    locale: {
        "format": "YYYY/MM/DD",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "weekLabel": "S",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ]}
  });

  $('#inicio').timepicker({ 'timeFormat': 'h:i A', 'minTime': '06:00',	'maxTime': '20:00' });
  $('#termino').timepicker({ 'timeFormat': 'h:i A', 'minTime': '06:00',	'maxTime': '20:00' });
</script>
