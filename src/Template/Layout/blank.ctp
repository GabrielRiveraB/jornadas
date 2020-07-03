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

    <!-- Custom fonts for this template-->
    <?= $this->Html->css(['fontawesome-free/css/all.min']) ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css(['sb-admin-2.min','app']) ?>
    <?= $this->Html->script(['datatable','all.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>



            <?= $this->Flash->render() ?>
            <div>
                <?= $this->fetch('content') ?>
            </div>

    <footer>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script(['jquery.min','bootstrap.bundle.min']) ?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script(['jquery.easing.min']) ?>
  
    <!-- Custom scripts for all pages-->
    <?= $this->Html->script(['sb-admin-2.min']) ?>

    <!-- Page level plugins -->
    <?= $this->Html->script(['Chart.min']) ?>

    <!-- Page level custom scripts -->
    <?= $this->Html->script(['chart-area-demo','chart-pie-demo']) ?>


    <div>

</body>
</html>
