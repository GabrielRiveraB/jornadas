<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-folder-open fa-sm fa-fw"></i><span>' . __(' Jornadas') . '</span>',
        ['controller' => 'Journeys', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
</li>
<li class="nav-item">
    <?= $this->Html->link(
        '<i class="fas fa-file-alt fa-sm fa-fw"></i><span>' . __(' Solicitudes') . '</span>',
        ['controller' => 'Requests', 'action' => 'index'],
        ['escape' => false, 'class' => 'nav-link']
    ) ?>
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




<!-- <nav class="large-3 medium-4 columns pt-4" id="actions-sidebar">
    <div class="card">
        <ul class="side-nav">
            
            <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Dependencias'), ['controller' => 'Dependencies', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Categorías'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
            
            
        </ul>
    </div>
      
<div class="card large-12 medium-81 columns pt-8">
    <ul class="side-nav">
    <li><?= $this->Html->link(__('Pavimentacion'),['controller' => 'Requests','action'=> 'btns']) ?> </li>
    <li><?= $this->Html->link(__('Espacios Publicos'),['controller'=> 'Journeys','action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('Regularización'),['controller'=>'Requests','action' => '']) ?></li>
</div>

</nav> -->





