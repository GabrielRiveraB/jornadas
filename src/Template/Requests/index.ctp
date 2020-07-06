<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Request[]|\Cake\Collection\CollectionInterface $requests
 */
//  debug($requests);
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Solicitudes</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="myTable">
        <thead class="thead-light">
        
            <tr>
                <th style="width: 5%;">Folio</th>
                <th style="width: 15%;">Jornada</th>
                <th style="width: 10%;">Fecha</th>
                <th style="width: 50%;"> Solicitante</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach ($requests as $request): ?>
            
            <tr style="<?php if(h ($request->gobernador)) { echo "background-color:yellow;";}?>">
            
            <td> <?php if($request->folio) { ?>
               .
                <?= $this->Html->link($request->folio, ['action' => 'view', $request->id]) ?>
                
            <?php } else { ?>
                Sin Folio
            <?php } ?>
            
            </td>

            <td><?= $request->has('journey') ? $this->Html->link($request->journey->ubicacion, ['controller' => 'Journeys', 'action' => 'view', $request->journey->id]) : '' ?></td>
            <td><?php echo h(date("d-M-y", strtotime($request->journey->date))); ?></td>
            <td><?= $this->Html->link($request->petitioner->name, ['controller' => 'Petitioners', 'action' => 'view', $request->petitioner->id]) ?></td>
                <!-- <td><?= $request->has('concept') ? $this->Html->link($request->concept->name, ['controller' => 'Concepts', 'action' => 'view', $request->concept->id]) : '' ?></td> -->
                <td class="actions">
                    <?php if (isset($current_user['role']) && $current_user['role'] === 'Coordinador') { ?>
                    <?= $this->Html->link(__('Canalizar'), ['controller'=>'activities','action' => 'create', $request->id]) ?>
                    <?php } ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $request->id], ['confirm' => __('Estas seguro?', $request->id)]) ?>
                </td>
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
  </div>
</div>


<script>
$(document).ready( function () {
    $('#myTable').DataTable(
        {
            "pagingType": "full_numbers",
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
            }
        }
    );
} );
</script>