<nav class="large-3 medium-4 columns pt-4" id="actions-sidebar">
    <div class="card">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('Escritorio'), ['controller' => 'Users', 'action' => 'dashboard']) ?></li>
            <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Dependencias'), ['controller' => 'Dependencies', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Categorías'), ['controller' => 'Concepts', 'action' => 'index']) ?></li>
            <!-- <li><?= $this->Html->link(__('Reportes'), ['action' => 'index']) ?></li> -->
            <li><?= $this->Html->link(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>
        </div>
      
<div class="card large-12 medium-81 columns pt-8">
<ul class="side-nav">
<li><?= $this->Html->link(__('Pavimentacion'),['controller' => 'Requests','action'=> 'btns']) ?> </li>
<li><?= $this->Html->link(__('Espacios Publicos'),['controller'=> 'Journeys','action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Regularización'),['controller'=>'Requests','action' => '']) ?></li>
    </div>
    <!-- <div class="car0d mt-3">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('Pavimentacion'), ['action' => 'btns']) ?></li>
        </ul>
    </div>

    <div class="card mt-3">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('Espacios públicos'), ['action' => 'index']) ?></li>
        </ul>
    </div>  

    <div class="card mt-3">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('Regularización'), ['action' => 'index']) ?></li>
        </ul>
    </div>           -->
</nav>





