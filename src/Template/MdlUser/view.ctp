<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlUser $mdlUser
 */
use Cake\Collection\Collection;  
$mdlNotas = new Collection($mdlUser->mdl_grade_items);
$mdlAsistencias = new Collection($mdlUser->mdl_attendance_log);
// $comis = $mdlUser->getCom(null, 4);
// foreach ($comis as $key => $value) {
    # code...
    // debug($key);
// }
    // debug($comis);
?>  
<?= $this->Html->css('perfil') ?>
<div class="info-profile-wrapper">
<div class="profile">
    <ul class= "data-list">
        <li style= "font-size: 40px; color: #00C3E2;"><?= $mdlUser->firstname ?></li>
        <li style= "font-size: 40px; color: #00C3E2;"><?= $mdlUser->lastname ?></li>
        <li style= "font-size: 20px;"><?= $mdlUser->username ?></li>
        <?php if (!empty($mdlUser->mdl_user_info_data)): ?>
            <li style= "font-size: 20px;"><?= $mdlUser->mdl_user_info_data[0]->data ?></li>
        <?php else: ?>
            <li style= "font-size: 20px;">No se encuentra su legajo</li>
        <?php endif; ?>
    </ul>
    <ul class= "data-list">
        <li><?= $mdlUser->email ?></li>
        <li><?= $mdlUser->phone1 ?></li>
        <li><?= $mdlUser->address ?></li>
        <li><?= $mdlUser->city ?></li>
        <li><?= $mdlUser->country ?></li>
    </ul>
</div>
<div class="nota-data-wrapper">
<!-- Filtrado de notas por cada curso -->
<?php
    if($mdlUser->cargo() == 'alumno'):
?>
<?php foreach ($mdlUser->mdl_groups as $comisiones) :
    $notasCurso = $mdlNotas->filter(function ($nota, $key) use($comisiones) {
        return $nota->courseid === $comisiones->courseid;
    });
    $notasValue = $notasCurso->extract('_joinData');
    $asisCurso = $mdlAsistencias->filter(function ($nota, $key) use($comisiones) {
        return $nota->mdl_attendance_status->mdl_attendance->course === $comisiones->courseid;
    });
    $asisCurso = $mdlUser->parseFechas($asisCurso, $comisiones->id);
?>
        <!-- Muestra Curso > Comision > Tabla de notas -->
    <div class="nota-data">
        <button id="slide" class="btn"><?= $comisiones->mdl_course->fullname; ?></button> 
    <?php
    switch ($comisiones->courseid) {
        case 4: ?>
        <table id="notas" class="table-nota">
            <thead>
                <tr>
                <?php
                $ordenado = new Collection(['De' => 'Tipo', 'Preguntas Semana 1' => '1', 'Preguntas Semana 2' => '2', 'Preguntas Semana 3' => '3', 'Preguntas Semana 4' => '4', 'Preguntas Semana 5' => '5', 'Preguntas Semana 6' => '6', 'Preguntas Semana 7' => '7', 'Preguntas Semana 8' => '8', 'Preguntas Semana 9' => '9', 'Preguntas Semana 10' => '10', 'Preguntas Semana 11' => '11', 'Preguntas Semana 12' => '12', 'Preguntas Semana 13' => '13', 'Preguntas Semana 14' => '14', 'Preguntas Semana 15' => '15', 'Preguntas Semana 16' => '16', 'Preguntas Semana 17' => '17','Preguntas Semana 18' => '18', 'Preguntas Semana 19' => '19', 'Preguntas Semana 20'=> '20', 'Preguntas Semana 21' => '21', 'Preguntas Semana 22' => '22', 'Preguntas Semana 23' => '23', 'Preguntas Semana 24' => '24','Preguntas Semana 25' => '25', 'Preguntas Semana 26' => '26', 'Preguntas Semana 27' => '27', 'Preguntas Semana 28' => '28', 'Preguntas Semana 29' => '29', 'Preguntas Semana 30' => '30', 'Preguntas Semana 31' => '31', 'Preguntas Semana 32'=> '32', 'PARCIAL MENSUAL MAYO' => 'P.1', 'PARCIAL MENSUAL JUNIO' => 'P.2', 'PARCIAL MENSUAL JULIO' => 'P.3', 'PARCIAL MENSUAL AGOSTO' => 'P.4', 'PARCIAL MENSUAL SEPTIEMBRE' => 'P.5', 'PARCIAL MENSUAL OCTUBRE' => 'P.6', 'Salud' => 'SS', 'Individual' => 'In', 'Grupal' => 'Gr']);
                $ordenado = $ordenado->each(function ($value, $key) {
                ?>
                    <th scope="col" class="cabecera"> <?= $value; ?></th>    
                <?php }); ?>
                </tr>
                </thead>
                <tbody>
                <?php $iterar = $mdlUser->cargarArreglo($asisCurso); ?>
                    <tr class= "item-tb">
                        <td style="width: 100px;">Exámenes</td>
                    <?php foreach ($iterar as $key => $value) { ?>
                        <td> <?= $value; ?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                        <td class="nota-diaria">Asistencias</td>
                    <?php
                    foreach ($asisCurso as $asistencias): ?>

                        <td id="nota-diaria"><?= $asistencias ?> </td>
                    <?php endforeach; ?>
                    </tr>
        </table> 
        <?php 
        if($mdlUser->cumple($comisiones->courseid)) {
            $color = $mdlUser->evaluarCondicion($iterar);
        } else {
            // debug("entra");
            $color = $mdlUser->aRecuperar($iterar);
        }
        ?>
        <div class="close" style= "<?= $color ?>"></div>  
        <?php break; ?>

        <?php case 37: ?>

            <?php break; ?>

        <?php case 12: ?>
        <table id="notas" class="table-nota">
        <?php
        $integrador= 0;
        foreach($mdlUser->mdl_grade_items as $notas) {
            if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
            }
        }
                
        $asistencias = $comisiones->parseFechas($mdlUser->mdl_attendance_log);
        $color = $mdlUser->condicionOp($integrador, $asistencias, $comisiones->id);
        ?>
            <thead>
                <tr>
                    <th class="cabecera" >Tipo</th>
                    <?php foreach ($notasCurso as $notasCurso) : ?>
                        <th class="cabecera"> <?= $notasCurso->itemname ?> </th>
                    <?php endforeach; ?>  
                </tr>
            </thead>
            <tbody>
                <tr class= "item-tb">
                <td>Exámenes</td>
                <?php
                $notasValue->each(function ($value, $key) { ?>
                    <td> <?= $value->finalgrade; ?> </td>
                <?php }); ?>
                </tr>
                <tr>
                    <td class="nota-diaria">Asistencias</td>
                <?php
                foreach ($asisCurso as $asistencias): ?>
                    <td id="nota-diaria"><?= $asistencias ?> </td>
                <?php endforeach; ?>
                </tr>
            </tbody>        
        </table> 
        <div class="close" style= "<?= $color ?>"></div> 
            <?php break; ?>

        <?php case 13: ?>
        <?php
        $integrador= 0;
        foreach($mdlUser->mdl_grade_items as $notas) {
            if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
            }
        }
                
        $asistencias = $comisiones->parseFechas($mdlUser->mdl_attendance_log);
        $color = $mdlUser->condicionOp($integrador, $asistencias, $comisiones->id);
        ?>
        <table id="notas" class="table-nota">
            <thead>
                <tr>
                    <th class="cabecera" >Tipo</th>
                    <?php foreach ($notasCurso as $notasCurso) : ?>
                        <th class="cabecera"> <?= $notasCurso->itemname ?> </th>
                    <?php endforeach; ?>  
                </tr>
            </thead>
            <tbody>
                <tr class= "item-tb">
                <td >Exámenes</td>
                <?php
                $notasValue->each(function ($value, $key) { ?>
                    <td> <?= $value->finalgrade; ?> </td>
                <?php }); ?>
                </tr>
                <tr>
                    <td class="nota-diaria">Asistencias</td>
                <?php
                foreach ($asisCurso as $asistencias): ?>
                    <td id="nota-diaria"><?= $asistencias ?> </td>
                <?php endforeach; ?>
                </tr>
            </tbody>        
        </table> 
        <div class="close" style= "<?= $color ?>"></div> 
            <?php break; ?>

        <?php default: ?>
        <?php 
            $iterar = $mdlUser->cargarArregloNormal(); 
            $asistencias = $comisiones->parseFechas($mdlUser->mdl_attendance_log);
            $color = $mdlUser->condNormal($iterar, $asistencias, $comisiones->id);
        ?>
        <table id="notas" class="table-nota">
            <thead>
                <tr>
                    <th class="cabecera" >Tipo</th>
                    <?php foreach ($notasCurso as $notasCurso) : ?>
                        <th class="cabecera"> <?= $notasCurso->itemname ?> </th>
                    <?php endforeach; ?>  
                </tr>
            </thead>
            <tbody>
                <tr class= "item-tb">
                <td >Exámenes</td>
                <?php
                $notasValue->each(function ($value, $key) { ?>
                    <td> <?= $value->finalgrade; ?> </td>
                <?php }); ?>
                </tr>
                <tr>
                    <td class="nota-diaria">Asistencias</td>
                <?php
                foreach ($asisCurso as $asistencias): ?>
                    <td id="nota-diaria"><?= $asistencias ?> </td>
                <?php endforeach; ?>
                </tr>
            </tbody>        
        </table> 
        <div class="close" style= "<?= $color ?>"></div>                    
            <?php break;
    }
    ?>     
    </div>
<?php endforeach; ?>
<?php
    endif;
?>
</div>
</div>
<?= $this->Html->script('profile') ?>