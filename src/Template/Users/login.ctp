<!-- File: src/Template/Users/login.ctp -->
<?php $this->layout = 'blank'; ?>
<body>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center mt-5">

  <div class="col-xl-10 col-lg-12 col-md-9 mt-3">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900">Sistema de Jornadas por la Paz</h1>
                <small><?= __('Por favor ingresa tu usuario y contraseña') ?></small>
              </div>

              <?= $this->Flash->render() ?>


            <?= $this->Form->create() ?>
            <fieldset>
            <div class="form-group mt-2">
                <?= $this->Form->input('username',['label'=>false,'type'=>'text','class'=>'form-control form-control-user mt-3','aria-describedby'=>'emailHelp','placeholder'=>'Ingresa tu cuenta de usuario..']) ?>
                <?= $this->Form->input('password',['label'=>false,'type'=>'password','class'=>'form-control form-control-user','placeholder'=>'Contraseña..']) ?>
            </div>
                <?= $this->Form->button(__('Ingresar'),['class'=>'btn btn-primary btn-user btn-block mt-3']); ?>
                <?= $this->Form->end() ?>

            </fieldset>
              <hr>
              <div class="text-center">
                <small class="text-center mt-3">Algunos derechos reservados © 2020 - SIDURT</small>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</body>