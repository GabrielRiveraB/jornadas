<nav class="large-3 medium-4 columns pt-4" id="actions-sidebar">
    <div class="card">
        <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Escritorio'), ['controller' => 'Users', 'action' => 'dashboard']) ?></li>       
        <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Reportes'), ['controller' => '', 'action' => '#']) ?></li>
        <li><?= $this->Html->link(__('Cerrar sesión'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>
    </div>

    <div class="card mt-3">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('Pavimentacion'), ['action' => 'index']) ?></li>
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
    </div>          
</nav>