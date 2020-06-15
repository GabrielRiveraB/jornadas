<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requests[]|\Cake\Collection\CollectionInterface $requests
 */
$journey_id = "";
$sinfolio = $confolio = 0;
$journey_ids = ['2','3', '30', '20', '21', '22'];
//  debug($current_user);
?>
<div class="requests btns large-9 medium-8 columns content pt-4">
    <h3><?= __('Resúmen de jornadas') ?></h3>

    <!-- <div class="row"> -->
        <div class="offset-6 col-6 pr-0">
            <input type="text" placeholder="Buscar registros..." id="mySearch" class="form-control"/>
        </div>
    <!-- </div> -->

    <div class="table-responsive-md">
        <?php for($i=0;$i<6;$i++) { ?>
        <table class="table table-striped table-bordered table-hover myRequests">
            <thead>
                <tr class="thead-light">
                    <th scope="col" colspan="5"><?php echo "Municipio de " . $journey_ids[$i]; ?></th>
                </tr>
                <tr>
                    <th >Numero</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Ultimo movimiento</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($requests as $requests): ?>
                <?php if($requests->journey_id == $journey_ids[$i]) {?>

                <tr>
                    <td scope="row"><?= $this->Html->link(h($requests->ubicacion), ['action' => 'view', $requests->id]) ?></td>
                    <td><?php echo h(date("d-M-y", strtotime($requests->date))); ?></td>
                    <td>
                    <?php
                        foreach ($requests->requests as $request):
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
        // $('.myRequests').wrap('<div id="hide" style="display:none"/>');

        var tables = $('.myRequests').DataTable({
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
