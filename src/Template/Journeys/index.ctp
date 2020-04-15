<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey[]|\Cake\Collection\CollectionInterface $journeys
 */
$municipio = "";
$sinfolio = $confolio = 0;
$municipios = ["Mexicali", "Tijuana", "Playas de Rosarito", "Tecate", "San Quintín", "Ensenada"];
//  debug($current_user);
?>
<div class="journeys index large-9 medium-8 columns content pt-4">
    <h3><?= __('Resúmen de jornadas') ?></h3>

    <!-- <div class="row"> -->
        <div class="offset-6 col-6 pr-0">
            <input type="text" placeholder="Buscar registros..." id="mySearch" class="form-control"/>
        </div>
    <!-- </div> -->

    <div class="table-responsive-md">
        <?php for($i=0;$i<6;$i++) { ?>
        <table class="table table-striped table-bordered table-hover myJourneys">
            <thead>
                <tr class="thead-light">
                    <th scope="col" colspan="5"><?php echo "Municipio de " . $municipios[$i]; ?></th>
                </tr>
                <tr>
                    <th >Colonia</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Con Folio</th>
                    <th scope="col">Sin Folio</th>
                    <th scope="col">Presupuesto</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($journeys as $journey): ?>
                <?php if($journey->municipio == $municipios[$i]) {?>

                <tr>
                    <td scope="row"><?= $this->Html->link(h($journey->ubicacion), ['action' => 'view', $journey->id]) ?></td>
                    <td><?php echo h(date("d-M-y", strtotime($journey->date))); ?></td>
                    <td>
                    <?php
                        foreach ($journey->requests as $request):
                            if($request->folio)
                            {
                                $confolio++;
                            } else {
                                $sinfolio++;
                            }
                        endforeach;
                        echo $confolio;
                    ?>
                    </td>
                    <td><?php echo $sinfolio; ?></td>
                    <td></td>
                    <?php $confolio = $sinfolio = 0; ?>
                </tr>
                <?php }  ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php } ?>
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
