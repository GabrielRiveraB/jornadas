<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $journey->id],
                ['confirm' => __('Se eliminarán todos los datos de la jornada si presionas Aceptar', $journey->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Jornadas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeys form large-9 medium-8 columns content">
    <?= $this->Form->create($journey) ?>
    <fieldset>
        <legend><?= __('Editar Jornada') ?></legend>
        <?php

            echo $this->Form->control('municipio');
            echo $this->Form->control('ubicacion');
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('inicio', ['empty' => true, 'value'=>date("H:i A", strtotime($journey->horainicio))]);
            echo $this->Form->control('termino', ['empty' => true, 'value'=>date("H:i A", strtotime($journey->horatermino))]);
            echo $this->Form->control('photo', ['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
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