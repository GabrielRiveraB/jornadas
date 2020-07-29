<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-file-alt fa-sm fa-fw"></i><span>' . __(' Solicitudes') . '</span>',
        ['controller' => 'Requests', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-folder-open fa-sm fa-fw"></i><span>' . __(' Jornadas') . '</span>',
        ['controller' => 'Journeys', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
