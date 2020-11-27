<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-folder-open fa-sm fa-fw"></i><span>' . __(' Jornadas') . '</span>',
        ['controller' => 'Journeys', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseTwo',
         'aria-expanded'=>'true', 'aria-controls'=>'collapseTwo']
    ) ?>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?= $this->Html->link(
                __(' Listado'),
                ['controller' => 'Journeys', 'action' => 'index'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?>
                      <?= $this->Html->link(
                __(' Nueva Jornada'),
                ['controller' => 'Journeys', 'action' => 'add'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?>
          </div>
        </div>
</li>


<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-file-alt fa-sm fa-fw"></i><span>' . __(' Solicitudes') . '</span>',
        ['controller' => 'Requests', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseThree',
         'aria-expanded'=>'true', 'aria-controls'=>'collapseTwo']
    ) ?>

        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?= $this->Html->link(
                __(' Listado'),
                ['controller' => 'Requests', 'action' => 'index'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?>
          <?= $this->Html->link(
                __(' Nueva Solicitud'),
                ['controller' => 'Requests', 'action' => 'add'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?>
          </div>
        </div>
</li>



<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-folder-open fa-sm fa-fw"></i><span>' . __(' Dependencias') . '</span>',
        ['controller' => 'Dependencies', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-file-alt fa-sm fa-fw"></i><span>' . __(' Categorias') . '</span>',
        ['controller' => 'Concepts', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>

<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-file-alt fa-sm fa-fw"></i><span>' . __(' Reportes') . '</span>',
        ['controller' => 'Requests', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseReport',
         'aria-expanded'=>'true', 'aria-controls'=>'collapseTwo']
    ) ?>

        <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?= $this->Html->link(
                __(' Por Rubro'),
                ['controller' => 'Requests', 'action' => 'rubro'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?>
          <!-- <?= $this->Html->link(
                __(' Por Municipio'),
                ['controller' => 'Requests', 'action' => 'add'],
                ['escape' => false, 'class' => 'collapse-item']
            ) ?> -->
          </div>
        </div>
</li>
