
<?php
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];
// debug($solicitudes->toarray());
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
<div class="index large-9 medium-8 columns content pt-4">

    <div class="container p-0">
        <div class="col-12 p-0">
            <input type="text" placeholder="Buscar registros..." id="mySearch" class="form-control"/>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
        <div class="table-responsive-md">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="thead-light">
                        <th scope="col" colspan="4">Jornadas sin peticiones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($solicitudes as $solicitud): ?>
                    <tr>
                        <!-- <td><?php echo h($solicitud->cantidad); ?></td> -->
                        <td colspan="4">
                            <?= $this->Html->link(h($solicitud->jornada), ['controller' => 'Journeys', 'action' => 'view', $solicitud->id]) ?>
                            <!-- <?php echo h($solicitud->jornada); ?> -->
                            <br>
                            <?php echo h(date("d-M-y", strtotime($solicitud->fecha))); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>

        <div class="col-md-6">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="thead-light">
                        <th scope="col">Últimas actualizaciones</th>
                    </tr>
                </thead>
                <?php foreach ($updates as $update): ?>
                    <tr>
                        <td>
                            <?php echo h(date("d-M-y", strtotime($update->modified))); ?><br>
                            <?php echo h($update->description); ?>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>                        
                        <?php //debug($updates->toarray()); ?>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="table-responsive-md">
    
        <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="thead-light">
                        <th scope="col" colspan="4">Solicitudes sin actualizar</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>
        </div>
        <div class="col-md-6">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="thead-light">
                        <th scope="col" colspan="4">Resúmen General</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>           
        </div>
    </div>



    
<script>
    $(document).ready(function () {
        // $('.myJourneys').wrap('<div id="hide" style="display:none"/>');
        var tables = $('.myJourneys').DataTable({
            //cambiamos el menu de cantidad de elementos a mostrar
            aLengthMenu: [
                [10, 25, -1],
                [10, 25, 'Todos']
            ],
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
            //para buscar en varias datatables
            dom: '<"top"i>rt<"bottom">p<"clear">'
        });

        //crear busqueda externa para buscar en varias datatables
        $('#mySearch').on('keyup click', function () {
            // $('#hide').css('display', 'block');
            tables.tables().search($(this).val()).draw();

        });

    });

// function filterResults(){
//     // Now get the values of checkbox
//     var chk1 = $('#checkbox1').val(); // checkbox1 is id of checkbox
//     $.ajax({
//      type : 'POST',
//      url : 'process.php',
//      data : 'check='+chk1,
//      success : function(data){
//           $('#data-div').html(data); // replace the contents coming from php file
//      }
//     });
// }
</script>


