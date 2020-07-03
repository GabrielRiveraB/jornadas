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
            
                <th>Folio</th>
                <th>Jornada</th>
                <th>Solicitante</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
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
