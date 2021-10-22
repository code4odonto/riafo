<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlCourse[]|\Cake\Collection\CollectionInterface $mdlCourse
 */
?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Changa|Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<?= $this->Html->css('table-riafo') ?>
<?= $this->Html->script('script') ?>
    <div class="search-box-wrapper">
       <div class="search-box">
        <div class="dropdown">
          
           <input type="text" placeholder="Buscar materia..." id="myInput" onclick="myFunction()" onkeyup="filterFunction()">
            <div id="myDropdown" class="dropdown-content">
            <?php foreach ($mdlCourse as $mdlCourse): ?>
            <?= $this->Html->link($mdlCourse->fullname, array('action'=>'index', $mdlCourse->id)) ?>
            <?php endforeach; ?>
          </div>
        </div>
        </div>
    </div>
    <?php if ($id): ?>
    <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th class="data"></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($comisiones as $comision): ?>
            <tr>
                <td class="data"><?= h($comision->name) ?></td>
                <td class="actions"><?= $this->Html->link('Ver', ['controller' => 'MdlGroups', 'action' => 'view', $comision->id, $comision->courseid]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php else: ?>
    <div class="null">
        <p>Seleccione una materia en el buscador superior para visualizar las comisiones correspondientes.</p>
    </div>
    <?php endif; ?>
    
<script src="https://cdn.jsdelivr.net/npm/animejs@3.1.0/lib/anime.min.js"></script>
<script>
    var nullP = document.querySelector('.null > p');
    anime({
    targets: '.null p',
    translateY: 450,
    duration: 1000
    });
</script>