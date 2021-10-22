<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroup $mdlGroup
 */
    use Cake\Collection\Collection;  
?>
<?= $this->Html->css('table-pdf', ['fullBase' => true]) ?>
<h2 class= "fonts"><?= h($mdlGroup->mdl_course->fullname) ?></h3>
<h3 class= "fonts"><?= h($mdlGroup->name) ?></h3>
<span class= "fonts"><?= $mdlGroup->description; ?></span>
<table>
        <thead>
            <tr>
                <th scope="col" class="cabecera"> Nombre y Apellido </th>
                <?php
                    $ordenado = new Collection(['Año' => 'Año', 'Preguntas Semana 1' => '1', 'Preguntas Semana 2' => '2', 'Preguntas Semana 3' => '3', 'Preguntas Semana 4' => '4', 'Preguntas Semana 5' => '5', 'Preguntas Semana 6' => '6', 'Preguntas Semana 7' => '7', 'Preguntas Semana 8' => '8', 'Preguntas Semana 9' => '9', 'Preguntas Semana 10' => '10', 'Preguntas Semana 11' => '11', 'Preguntas Semana 12' => '12', 'Preguntas Semana 13' => '13', 'Preguntas Semana 14' => '14', 'Preguntas Semana 15' => '15', 'Preguntas Semana 16' => '16', 'Preguntas Semana 17' => '17','Preguntas Semana 18' => '18', 'Preguntas Semana 19' => '19', 'Preguntas Semana 20'=> '20', 'Preguntas Semana 21' => '21', 'Preguntas Semana 22' => '22', 'Preguntas Semana 23' => '23', 'Preguntas Semana 24' => '24','Preguntas Semana 25' => '25', 'Preguntas Semana 26' => '26', 'Preguntas Semana 27' => '27', 'Preguntas Semana 28' => '28', 'Preguntas Semana 29' => '29', 'Preguntas Semana 30' => '30', 'Preguntas Semana 31' => '31', 'Preguntas Semana 32'=> '32', 'PARCIAL MENSUAL MAYO' => 'P.1', 'PARCIAL MENSUAL JUNIO' => 'P.2', 'PARCIAL MENSUAL JULIO' => 'P.3', 'PARCIAL MENSUAL AGOSTO' => 'P.4', 'PARCIAL MENSUAL SEPTIEMBRE' => 'P.5', 'PARCIAL MENSUAL OCTUBRE' => 'P.6', 'Salud' => 'S', 'Individual' => 'I', 'Grupal' => 'G']);
                    $ordenado = $ordenado->each(function ($value, $key) {
                        ?>
                        <th scope="col" class="cabecera"> <?= $value; ?></th>    
                    <?php }); ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroup->mdl_user as $user): ?>
                <?php
                    if($user->cargo() == 'alumno'):
                ?>
                <?php $iterar = $user->cargarArreglo(); ?>
                <tr class= "item-tb">
                <?php if(strrpos(strtoupper($mdlGroup->description), strtoupper($user->lastname)) === FALSE): ?>
                    <th rowspan= "2" class= "users" style= "<?= $user->evaluarCondicion($iterar) ?>"><?= $this->Html->link($user->full_name, ['controller' => 'MdlUser', 'action' => 'view', $user->id]) ?> </th>
                    <td rowspan= "2" class= "year"><?= $user->cursada; ?></td>
                    <?php foreach ($iterar as $key => $value) { ?>
                        <td> <?= $value; ?></td>
                    <?php } ?>
                    <tr>
                    <?php
                    $asistencias = $mdlGroup->parseFechas($user->mdl_attendance_log);
                    
                    foreach ($asistencias as $asistencias): ?>
                            <td id="nota-diaria"><?= $asistencias ?> </td>
                    <?php endforeach; ?>
                    </tr>
                <?php endif; ?>    
                </tr>
                    <?php endif; ?>
            <?php endforeach; ?> 
            </table>