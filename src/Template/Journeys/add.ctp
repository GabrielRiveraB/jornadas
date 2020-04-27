<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
?>
<div class="journeys form large-9 medium-8 columns content">
    <?= $this->Form->create($journey,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Datos de la jornada') ?></legend>
        <?php
            echo $this->Form->control('municipio');
            echo $this->Form->control('ubicacion');
            echo $this->Form->control('fecha', ['label'=>'Fecha','empty' => true]);
            echo $this->Form->control('inicio', ['label'=>'Hora de inicio','empty' => true]);
            echo $this->Form->control('termino', ['label'=>'Hora de tterminación','empty' => true]);
            echo $this->Form->control('geolocalizacion', ['label'=>'URL de Google','empty' => true]);
            echo $this->Form->control('photo', ['label'=>'Foto de la jornada','type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear Jornada')) ?>
    <?= $this->Form->end() ?>
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
