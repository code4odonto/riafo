<?php use Cake\Routing\Router; 
    $riafoTitle = 'Riafo: Cambiar contraseña';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?= $riafoTitle ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('login') ?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="demo-content align-center line-drawing-demo">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	       viewBox="-80 85 700 200" style="enable-background:new 74 83 352 136;" xml:space="preserve">
        <style type="text/css">
	        .st0{fill:none;stroke:#FFFFFF;stroke-width:6;}
        </style>
        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="1" class="lines">
	        <path class="st0" d="M75.5,90.8h23.1c15.4,0,25.8,0.6,31.3,1.8c5.4,1.2,9.9,4.2,13.3,9.1c3.5,4.9,5.2,12.7,5.2,23.4
		    c0,9.8-1.2,16.3-3.6,19.7c-2.4,3.4-7.2,5.3-14.4,6c6.5,1.6,10.8,3.8,13,6.5c2.3,2.7,3.6,5.2,4.1,7.4c0.5,2.3,0.8,8.4,0.8,18.6v33.1
		    h-30.4v-41.7c0-6.7-0.5-10.9-1.6-12.5c-1.1-1.6-3.8-2.4-8.4-2.4v56.6H75.5V90.8z M108.2,112.3v27.9c3.7,0,6.3-0.5,7.8-1.5
		    c1.5-1,2.2-4.3,2.2-9.8V122c0-4-0.7-6.6-2.1-7.8C114.6,112.9,112,112.3,108.2,112.3z"/>
	        <path class="st0" d="M193.9,90.8v125.6h-32.7V90.8H193.9z"/>
	        <path class="st0" d="M263.4,90.8l18.7,125.6h-33.4l-1.7-22.6h-11.7l-2,22.6h-33.7l16.6-125.6H263.4z M246.1,171.6
		    c-1.7-14.2-3.3-31.8-5-52.8c-3.3,24-5.4,41.7-6.3,52.8H246.1z"/>
	        <path class="st0" d="M287.6,90.8H343v25.2h-22.7v23.8h20.2v23.9h-20.2v52.8h-32.7V90.8L287.6,90.8z"/>
	        <path class="st0" d="M425.5,164.4c0,12.7-0.3,21.5-0.9,26.8s-2.5,10-5.6,14.4c-3.2,4.4-7.4,7.7-12.7,10c-5.3,2.3-11.5,3.5-18.6,3.5
		    c-6.7,0-12.7-1.1-18.2-3.3c-5.3-2.2-9.6-5.5-13-9.9c-3.2-4.4-5.2-9.2-5.8-14.4c-0.6-5.2-0.9-14.2-0.9-27.2v-21.5
		    c0-12.7,0.3-21.5,0.9-26.8c0.6-5.3,2.5-10,5.6-14.4c3.2-4.4,7.4-7.7,12.7-10s11.5-3.5,18.6-3.5c6.7,0,12.7,1.1,18.2,3.3
		    c5.3,2.2,9.6,5.5,13,9.9c3.2,4.4,5.2,9.2,5.8,14.4s0.9,14.2,0.9,27.2V164.4z M392.9,123.1c0-5.9-0.3-9.6-1-11.2
		    c-0.7-1.7-2-2.4-4-2.4c-1.7,0-3,0.7-3.9,2c-0.9,1.4-1.4,5.2-1.4,11.7v58.7c0,7.3,0.3,11.8,0.9,13.5c0.6,1.7,2,2.6,4.1,2.6
		    c2.3,0,3.6-1,4.3-2.9c0.6-2,0.9-6.6,0.9-14L392.9,123.1L392.9,123.1z"/>
        </g>
        </svg>
        <p class="anclaje">Registro informatizado de asistencia</p>
    </div>
    <p class= "help-info back"><?= $this->Html->link("&#10094; Volver", ['controller' => 'Users', 'action' => 'login'], ['escape' => false])?></p>
    <div class="login-wrapper">
        <?= $this->Form->create() ?> 
            <div class="data-input">
                <p class= "help-info">Ingrese el Correo electrónico usado en la plataforma <strong>Moodle</strong></p>
                <?= $this->Form->control('email', [
                    'label' => false,
                    'placeholder' => 'Correo electrónico...',
                    'id' => 'email',
                    'onkeyup' => 'log()',
                    'required'
                ]); ?>
                <div>
                <?= $this->Flash->render(); ?>
            </div>
            </div>
            
            <div id="login">
                <button type="submit" id="logBtn" style="background-color: rgba(0, 0, 0, .4);"><span id="btnCont" style="opacity: 1; left: 65px; color: white;">&raquo;</span></button>
            </div>
            
        </form>
        <?= $this->Form->end() ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.1.0/lib/anime.min.js"></script>
    <script>
        anime({
            targets: '.line-drawing-demo .lines path',
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'easeInOutSine',
            duration: 1000,
            delay: function(st0, i) { return i * 250 },
            direction: 'alternate',
            loop: false
        });
        anime({
            targets: '.anclaje',
            easing: 'linear',
            opacity: 1,
            delay: 2000,
            duration: 1500
        });
    </script>
</body>
</html>