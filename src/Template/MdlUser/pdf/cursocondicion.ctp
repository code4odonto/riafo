<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlUser[]|\Cake\Collection\CollectionInterface $usersCurso
 * @var string $año
 */ 
use Cake\Collection\Collection;
$col = new Collection($usersCurso);
if ($byCom) {
    $usersCurso = $col->sortBy(function ($alumno) {
        if($alumno->cargo() == 'alumno') {
            $com = new Collection($alumno->mdl_groups);
            $com = $com->first();
            if ($com) {
                return $com->id;
            }
        }
    });
}
// $usersCurso = $col->sortBy('lastname', SORT_STRING);
?>

<div class="users view">
<h2>Listado de alumnos en <?= $condicion ?> de <?= $año ?></h2>
<table style="border-collapse: collapse;">
    <thead>
        <tr>
            <td style="text-align: left;">Nombre y Apellido</td>
            <td style="text-align: center;">Año</td>
            <td style="text-align: center; width: 100px;">Com</td>
            <td style="text-align: center;">Legajo</td>
            <?php if ($curso == 12 || $curso == 13): ?>
                <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> Integrador</td>
            <?php endif; ?> 
            <?php if ($condicion == "Libre" || $condicion == "Libre condicional"): ?>
            <td style="text-align: center;">Ausentes</td>
            <td style="text-align: center;">OP</td>
            <td style="text-align: center;">PM</td>
            <td style="text-align: center;">SS</td>
            <td style="text-align: center;">In</td>
            <td style="text-align: center;">Gr</td>
            <?php else: ?>
            <td style="text-align: center; width: 100px;">Promedio</td>
            <td style="text-align: center; width: 100px;">Firma</td>
            <td style="text-align: center; width: 100px;">Sello</td>
            <?php endif; ?>

        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($usersCurso as $alumno):
        // debug($alumno);
        $com = new Collection($alumno->mdl_groups);
        $com = $com->first();
        $cod = $alumno->cursada;
        
        if($alumno->cargo() == 'alumno' && ($cod == $año || $año == "general") && isset($com)):
            switch ($curso) {
                case 4:
                    $iterar = $alumno->cargarArreglo();
                    
                    if($alumno->cumple($com->courseid)){
                        $color = $alumno->evaluarCondicion($iterar);
                    } else {
                        $color = $alumno->aRecuperar($iterar);
                    }
                    break;
                case 37:
                    break;
                case 12:
                    $integrador= 0;
                    foreach($alumno->mdl_grade_items as $notas) {
                        if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                            $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
                        }
                    }
                    // debug($com);

                    $comision = $alumno->getCom($com->id);
                    // debug($comision);

                    $asistencias = $comision->parseFechas($alumno->mdl_attendance_log);
                    $color = $alumno->condicionOp($integrador, $asistencias, $com->id);
                    break;
                case 13:
                    $integrador= 0;
                    foreach($alumno->mdl_grade_items as $notas) {
                        if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                            $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
                        }
                    }
                    // debug($com);

                    $comision = $alumno->getCom($com->id);
                    // debug($comision);

                    $asistencias = $comision->parseFechas($alumno->mdl_attendance_log);
                    $color = $alumno->condicionOp($integrador, $asistencias, $com->id);
                    break;
                default:
                    $iterar = $alumno->cargarArregloNormal(); 
                    $comision = $alumno->getCom($com->id);
                    $asistencias = $comision->parseFechasGrade($alumno->mdl_attendance_log);
                    $color = $alumno->condNormal($iterar, $asistencias, $com->id);
                    break;
            }
            if($alumno->condicion == $condicion): ?>
                <tr>
                    <td style="padding: 6px; text-align: left; border-bottom: 2px solid black;"><?= $alumno->full_name ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $cod ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $com->name ?></td>
                    <?php if(!empty($alumno->mdl_user_info_data)): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $alumno->mdl_user_info_data[0]->data ?></td>
                    <?php else: ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;">No se encuentra su legajo</td>
                    <?php endif; ?>
                    <?php if ($curso == 12 || $curso == 13): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> <?= $integrador ?></td>
                    <?php endif; ?> 
                    <?php if ($condicion == "Libre" || $condicion == "Libre condicional"): ?>
                        <?php if ($curso == 4): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> <?= $alumno->ausentes ?></td>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> <?= $alumno->pregDes ?></td>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $alumno->menDes ?></td>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->salud) ? "Si" : "No" ?></td>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->individual) ? "Si" : "No" ?></td>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->grupal) ? "Si" : "No" ?></td>

                        <?php endif; ?> 
                        
                    <?php else: ?>
                    <?php if ($alumno->condicion == "Promocion"): ?>
                            
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= round($alumno->calcProm(), 0, PHP_ROUND_HALF_DOWN) ?></td>
                    <?php endif; ?>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"></td>
                    <?php endif; ?> 
                </tr >
    <?php
            endif;
        endif;
    endforeach; 
    ?>
    </tbody>
</table>  
</div>