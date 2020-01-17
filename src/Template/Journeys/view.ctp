<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journey $journey
 */
//   debug($requestsByStatus);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Editar jornada'), ['action' => 'edit', $journey->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar jornada'), ['action' => 'delete', $journey->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journey->id)]) ?> </li> -->
        <li><?= $this->Html->link(__('Jornadas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Acciones'), ['controller' => 'Works', 'action' => 'index',$journey->id]) ?></li>
        <!-- <li><?= $this->Html->link(__('Nueva jornada'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add', $journey->id ]) ?> </li> -->
    </ul>
</nav>
<div class="journeys view large-9 medium-8 columns content">
    <h3><?= h($journey->ubicacion . ", " .$journey->municipio) ?></h3>
    <p><?= "El día " . date("d-m-y", strtotime($journey->date)) . " | Desde las " . date("H:i A", strtotime($journey->horainicio)) . " hasta las " . date("H:i A", strtotime($journey->horatermino)) ?></p>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mapa') ?></th>
            <td><?= h($journey->photo) ?></td>
        </tr>
    </table>
    <div>
        <p><strong>Existen un total de <?php echo $total_solicitudes; ?> solicitudes</strong></p>
        <?php 
        foreach($requestsByStatus as $status => $cantidad)
        {
            if($status == '1') echo $cantidad . " solicitudes capturadas.<br>";
            if($status == '2') echo $cantidad . " solicitudes clasificadas.<br>";
            if($status == '3') echo $cantidad . " solicitudes atendidas.<br>";
            if($status == '4') echo $cantidad . " solicitudes turnadas.<br>";
            if($status == '5') echo $cantidad . " solicitudes completadas.<br>";
        }
        ?>
    </div>
    <br>
    <div class="related mb-3">
        <?php if (!empty($journey->requests)): ?>
    <div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
        <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Ver todas las solicitudes de la jornada
            </button>
        </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">




        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Folio') ?></th>
                <th scope="col"><?= __('Solicitante') ?></th>
                <th scope="col"><?= __('Petición') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>                                
                <!-- <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Journey Id') ?></th>
                <th scope="col"><?= __('Promoter Id') ?></th>
                <th scope="col"><?= __('Concept Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>

                <th scope="col"><?= __('Sibso') ?></th>
                <th scope="col"><?= __('Cespt') ?></th>
                <th scope="col"><?= __('Educacion') ?></th>
                <th scope="col"><?= __('Municipio') ?></th>
                <th scope="col"><?= __('Dif') ?></th>
                <th scope="col"><?= __('Juventud') ?></th>
                <th scope="col"><?= __('Other') ?></th>
                <th scope="col"><?= __('Gobernador') ?></th>
                <th scope="col"><?= __('Priority') ?></th>

                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                 -->
            </tr>
            <?php foreach ($journey->requests as $requests): ?>

                <div class="card mb-3">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title"><?= h($requests->petitioner->name) ?></h5>
    <p class="card-subtitle">Folio <?= h($requests->folio) ?></p>
    <p class="card-text"><?= h($requests->description) ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong> Estado actual:</strong> <?= h($requests->RequestStatuses['name']) ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link"><?= $this->Html->link('Editar', ['controller' => 'Requests', 'action' => 'edit', $requests->id], ['class'=>'btn btn-primary btn-sm']) ?></a>
    <a href="#" class="card-link"><?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Requests', 'action' => 'delete', $requests->id],['class'=>'btn btn-danger btn-sm'], 
    ['confirm' => __('Se eliminarán todos los datos de la solicitud si presionas Aceptar', $journey->id)]) ?></a>
  </div>
</div>

            <!-- <tr>
                <td><?= h($requests->folio) ?></td>
                <td><?= h($requests->petitioner->name) ?></td>
                <td><?= h($requests->description) ?></td>
                <td><?= h($requests->RequestStatuses['name']) ?></td>
                <!-- <td><?= h($requests->id) ?></td>
                <td><?= h($requests->journey_id) ?></td>
                <td><?= h($requests->promoter_id) ?></td>
                <td><?= h($requests->concept_id) ?></td>
                <td><?= h($requests->type_id) ?></td>
                <td><?= h($requests->sibso) ?></td>
                <td><?= h($requests->cespt) ?></td>
                <td><?= h($requests->educacion) ?></td>
                <td><?= h($requests->municipio) ?></td>
                <td><?= h($requests->dif) ?></td>
                <td><?= h($requests->juventud) ?></td>
                <td><?= h($requests->other) ?></td>
                <td><?= h($requests->gobernador) ?></td>
                <td><?= h($requests->priority) ?></td>

                <td><?= h($requests->created) ?></td>
                <td><?= h($requests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Requests', 'action' => 'view', $requests->id]) ?>
                    <?= $this->Html->link(__('Edit'), []) ?>
                    <?= $this->Form->postLink(__('Delete'), [], ['confirm' => __('Are you sure you want to delete # {0}?', $requests->id)]) ?>
                </td>
            </tr> -->
            <?php endforeach; ?>
        </table>
        <?php endif; ?>


        </div>
        </div>
    </div>
    </div>
        
    </div>

    <div class="related">
        <?php if (!empty($journey->works)): ?>
    <div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
        <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Ver todas las acciones de la jornada
            </button>
        </h5>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">




        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Folio') ?></th>
                <th scope="col"><?= __('Solicitante') ?></th>
                <th scope="col"><?= __('Petición') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>                                

            </tr>
            <?php foreach ($journey->works as $works): ?>

                <div class="card mb-3">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title"><?= h($works->name) ?></h5>
    <p class="card-text"><?= h($works->description) ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong> Estado actual:</strong> <?= h($works->RequestStatuses['name']) ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link"><?= $this->Html->link('Editar', ['controller' => 'Requests', 'action' => 'edit', $works->id], ['class'=>'btn btn-primary btn-sm']) ?></a>
    <a href="#" class="card-link"><?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Requests', 'action' => 'delete', $works->id],['class'=>'btn btn-danger btn-sm'], 
    ['confirm' => __('Se eliminarán todos los datos de la solicitud si presionas Aceptar', $works->id)]) ?></a>
  </div>
</div>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>


        </div>
        </div>
    </div>
    </div>
        
    </div>
</div>
