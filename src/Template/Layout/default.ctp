<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Jornadas de la paz | Gobierno de Baja California';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <?= $this->Html->css(['base','style','all.min']) ?> -->

    <!-- Custom fonts for this template-->
    <?= $this->Html->css(['fontawesome-free/css/all.min']) ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script(['jquery.min','bootstrap.bundle.min.js']) ?>
  
    <!-- Custom styles for this template-->
    <?= $this->Html->css(['sb-admin-2.min','dataTables.bootstrap4.min']) ?>
    


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

 <!-- Page Wrapper -->
 <div id="wrapper">
  <?php echo $this->element("sidebar");?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <?php echo $this->element("topbar");?>
      
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <?= $this->Flash->render() ?>
            <div>
                <?= $this->fetch('content') ?>
            </div>
        
        </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


    </div>

    <footer>
    </footer>




    <!-- Core plugin JavaScript-->
    <?= $this->Html->script(['jquery.easing.min']) ?>
  
    <!-- Custom scripts for all pages-->
    <?= $this->Html->script(['sb-admin-2.min']) ?>

    <!-- Page level plugins -->
    <?= $this->Html->script(['Chart.min']) ?>

    <!-- Page level custom scripts -->
    <?= $this->Html->script(['chart-area-demo','chart-pie-demo']) ?>



  <!-- Page level plugins -->
  <?= $this->Html->script(['jquery.dataTables.min','dataTables.bootstrap4.min','datatables-demo']) ?>

    <div>

</body>
</html>
