<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
//  debug($requests);
?>

<div class="requests index large-9 medium-8 columns content pt-4">
    <h3><?= __('Solicitudes') ?></h3>
    <!-- <div class="small-12 bg-light p-3 mb-3">
        <?= $this->Form->create(null,['type' => 'file']) ?>
            <?php echo $this->Form->control('search',['label'=>'Busca por folio / solicitante / contenido']);?>
            <?= $this->Form->submit('Buscar') ?>
        <?= $this->Form->end() ?>
    </div> -->

    <div class="table-responsive-md">
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
            <tr>
                <th style="width:10%">Folio</th>
                <th style="width:35%">Jornada</th>
                <th style="width:10%">Fecha</th>
                <th style="width:35%">Solicitante</th>
                <th scope="col" class="actions" style="width:10%"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>




                <tr style="<?php if(h ($request->gobernador)) { echo "background-color:yellow;";}?>">
            <td> <?php if($request->folio) { ?>
                <?= $this->Html->link($request->folio, ['action' => 'view', $request->id]) ?>
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            </td>

            <td><?= $request->has('journey') ? $this->Html->link($request->journey->ubicacion, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></td>
            <td> <?php echo h(date("d-M-y", strtotime($request->modified))); ?></td>



            <td><?= $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) ?></td>
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->


                <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                        <?= $this->Html->link($this->Html->tag('i', '', array('class' =>'fa fa-arrow-right')), array('controller' =>'activities','action'=>'create', $request->id), array('escape' =>false))?>
                    <?php } ?>

                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-list-alt')), array('controller' => 'requests','action'=>'edit', $request->id), array('escape' => false)) ?>
                                        <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-trash')), array('controller' => 'requests', 'action' =>'delete', $request->id), array('escape' => false), __('Deseas eliminar esta dependencia?')); ?>

                </td>
            </tr>
            <?php endforeach; ?>
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
            // console.log("funciona");
        });

    });

</script>
