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

$riafoTitle = 'Riafo: Registro informatizado de alumnos';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $riafoTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('style-riafo') ?>
    <?= $this->Html->css(["https://fonts.googleapis.com/css?family=Open+Sans:400,600", "https://fonts.googleapis.com/css?family=Work+Sans&display=swap"]) ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="wrapper">
    <nav id="nav">
            <header class="nav-header">
              <h1 class="nav-title">RIAFOLP</h1> 
	    </header>
            <div class="control">
                <div class="user-data"><?= $current_user->nombre; ?> <?= $current_user->apellido; ?></div>
            </div>
            <ul class="menu">
                <li><?= $this->Html->link(__('Ver perfil'), ['controller' => 'MdlUser', 'action' => 'view', $current_user->id]) ?></li>
            </ul>
            <?php if ($current_user->rol === 'admin'): ?>
            <ul class="menu">
                <li><?= $this->Html->link(__('Inscripciones'), ['controller' => 'MdlUser', 'action' => 'index']) ?></li>
            </ul>
            <?php endif; ?>
            <?php if ($current_user->rol === 'admin' || $current_user->rol === 'docente'): ?>
            <ul class="menu">    
                <li><?= $this->Html->link(__('Cursos'), ['controller' => 'MdlCourse', 'action' => 'index']) ?></li>
            </ul>
            <?php endif; ?>
            <?php if ($current_user->rol === 'admin'): ?>
            <ul class="menu">    
                <li><?= $this->Html->link(__('Estadísticas'), ['controller' => 'MdlCourse', 'action' => 'stats']) ?></li>
            </ul>
            <ul class="menu">    
                <li><?= $this->Html->link(__('Administrador'), ['controller' => 'MdlUser', 'action' => 'config']) ?></li>
            </ul>
            <?php endif; ?>
            <ul class="menu">
                <li><?= $this->Html->link(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
            </ul>
            <footer class="nav-footer">
            
                <a href="https://www.folp.unlp.edu.ar/"><p class="logo"></p></a>		
            </footer>
    </nav>     
        
        <?= $this->Flash->render() ?>
        <div id="contenido" class='cont-main'> 
        
            <?= $this->fetch('content') ?>
        </div>
</div>
    <?= $this->Html->script('script') ?>
</body>
</html>
