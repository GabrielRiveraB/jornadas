<nav class="large-3 medium-4 columns pt-4" id="actions-sidebar">
    <div class="card">
        <ul class="side-nav">
            <li class="heading"><?= __('MENU') ?></li>
            <!-- <li><?= $this->Html->link(__('Nueva solicitud'), ['controller' => 'Requests', 'action' => 'add']) ?></li> -->
            <li><?= $this->Html->link(__('Jornadas'), ['controller' => 'Journeys', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Solicitudes'), ['controller' => 'Requests', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Cerrar sesión'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>

    </div>

<br/>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title heading">Resumen General</div>
            
            <div class="progress">
                <div class="progress-bar" style="width: 50%">PAV</div>
            
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 70%">EPU</div>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 30%">REG</div>
            </div>
            <div class="progress">
                <div class="progress-bar" style="width: 40%">OTR</div>
            </div>
        </div>
    </div>
</nav>