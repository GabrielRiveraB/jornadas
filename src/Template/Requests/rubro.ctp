<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
//  debug($requests);
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Reporte de solicitudes por rubro</h6>
  </div>
<?= $this->Form->create(null) ?>
<div class="card-body">
<fieldset>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <?php echo $this->Form->control('journeys',['label'=>'Jornada','empty' => 'SELECCIONA JORNADA']); ?>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <?php echo $this->Form->control('concepts',['label'=>'Rubro','empty' => 'SELECCIONA RUBRO']); ?>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <?php echo $this->Form->control('municipios',['label'=>'Municipio','empty' => 'SELECCIONA MUNICIPIO']); ?>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-1">
        <?php echo $this->Form->button(__('Buscar'),['class'=>'btn btn-primary ','style'=>'margin-top: 2em;']); ?>
        </div>

    </div>
</fieldset>
</div>
</div>
<div class="card shadow mb-4">


  <div class="card-body">
    <div class="table-responsive">



    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
            <tr>
                <th style="width:40%">Rubro</th>
                <th style="width:20%" class="text-center">Peticiones</th>
                <th style="width:20%" class="text-center">Atendidas</th>
                <th style="width:20%" class="text-center">Cumplidas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peticiones as $request): ?>
            <?php //debug($request); ?>
            <tr>
                <td> <?php echo h($request->rubro); ?> </td>
                <td class="text-center"> <?php echo h($request->peticiones); ?> </td>
                <td class="text-center"> <?php echo h($request->atendidas); ?> </td>
                <td class="text-center"> <?php echo h($request->cumplidas); ?> </td>
            </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
    </div>
  </div>
</div>


<script>
    // $(document).ready(function () {
    //     // $('.myJourneys').wrap('<div id="hide" style="display:none"/>');

    //     var tables = $('.myJourneys').DataTable({
    //         //cambiamos el menu de cantidad de elementos a mostrar
    //         aLengthMenu: [
    //             [10, 25, -1],
    //             [10, 25, 'Todos']
    //         ],
    //         language: {
    //             lengthMenu: "_MENU_ registros por pagina",
    //             zeroRecords: "No se encontraron registros",
    //             info: "Mostrando _START_ - _END_ de _TOTAL_ registros",
    //             infoEmpty: "Mostrando _TOTAL_ registros",
    //             infoFiltered: "(filtrados de un total de _MAX_ registros)",
    //             search: "<span class='fa fa-fw fa-search'></span> ",
    //             searchPlaceholder: "Buscar registros...",
    //             loadingRecords: "Cargando...",
    //             processing: "Procesando...",
    //             pagingType: 'full_numbers',
    //             paginate: {
    //                 first: '<<',
    //                 previous: '< Anterior',
    //                 next: 'Siguiente >',
    //                 last: '>>'
    //             }
    //         },
    //         //para buscar en varias datatables
    //         dom: '<"top"i>rt<"bottom">p<"clear">'
    //     });

    //     //crear busqueda externa para buscar en varias datatables
    //     $('#mySearch').on('keyup click', function () {
    //         // $('#hide').css('display', 'block');
    //         tables.tables().search($(this).val()).draw();
    //         // console.log("funciona");
    //     });

    // });
    $(document).ready(function() {
        var table = $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    filename: 'Reporte de peticiones por rubro',
                    title: 'Jornadas por la Paz - Reporte de peticiones por rubro',
                    text: 'PDF',
                    exportOptions: {
                        modifier: {
                        page: 'current'
                        },
                    },
                },
                {
                    extend: 'print',
                    filename: 'Reporte de peticiones por rubro',
                    title: 'Jornadas por la Paz - Reporte de peticiones por rubro',
                    text: 'Imprimir',
                    exportOptions: {
                        modifier: {
                        page: 'current'
                        },
                    },
                },
                {
                    extend: 'excelHtml5',
                    filename: 'Reporte de peticiones por rubro',
                    title: 'Jornadas por la Paz - Reporte de peticiones por rubro',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                        page: 'current'
                        },
                    },
                },
            ],
            "pageLength": 25,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
        // "columnDefs": [
        //     {
        //         "targets": [ 2 ],
        //         "visible": false,
        //         "searchable": false
        //     },
        //     {
        //         "targets": [ 3 ],
        //         "visible": false
        //     }
        // ]
                language: {
                lengthMenu: "_MENU_ registros por pagina",
                zeroRecords: "No se encontraron registros",
                info: "Mostrando _START_ - _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando _TOTAL_ registros",
                infoFiltered: "(filtrados de un total de _MAX_ registros)",
                search: "<span class='fa fa-fw fa-search'></span> ",
                searchPlaceholder: "Buscar registros...",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                pagingType: 'full_numbers',
                paginate: {
                    first: '<<',
                    previous: '< Anterior',
                    next: 'Siguiente >',
                    last: '>>'
                }
            },
            "order": [[ 2, "desc" ]],
    } );

    // $('#table-filter').on('change', function(){
    //     table.search(this.value).draw();
    // });


} );


</script>
