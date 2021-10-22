<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlUser[]|\Cake\Collection\CollectionInterface $usersCurso
 */
use Cake\Collection\Collection;

$col = new Collection($usersCurso);
$usersCurso = $col->sortBy(function ($alumno) {
    if($alumno->cargo() == 'alumno') {
        $com = new Collection($alumno->mdl_groups);
        $com = $com->first();
        if ($com) {
            return $com->id;
        }
    }
});
?>

<div class="users view">
<h2>Listado de alumnos para Berisso</h2>
<table>
    <thead>
        <tr>
            <td>Nombre y Apellido</td>
            <td style="text-align: center;">Año</td>
            <td style="text-align: center; width: 100px;">Com</td>
            <td style="text-align: center;">Legajo</td>
            <td style="text-align: center;">Recupera en</td>
            <td style="text-align: center;">Ausentes</td>
            <td style="text-align: center;">OP</td>
            <td style="text-align: center;">PM</td>
            <td style="text-align: center;">SS</td>
            <td style="text-align: center;">In</td>
            <td style="text-align: center;">Gr</td>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($usersCurso as $alumno):
        $com = new Collection($alumno->mdl_groups);
        $com = $com->first();
        $cod = $alumno->cursada;
            $iterar = $alumno->cargarArreglo();
            $algo = $alumno->evaluarCondicion($iterar);
            if($alumno->cargo() == 'alumno'): 
            if(!$alumno->cumple($com->courseid)): ?>
                <tr>
                <td style="padding: 6px; text-align: left; border-bottom: 2px solid black;"><?= $alumno->full_name ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $cod ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $com->name ?></td>
                    <?php if(!empty($alumno->mdl_user_info_data)): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $alumno->mdl_user_info_data[0]->data ?></td>
                    <?php else: ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;">No se encuentra su legajo</td>
                    <?php endif; ?>
                    <?php if(($alumno->ausentes <= 9 && $alumno->pregDes <= 9)): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> Berisso</td>
                    <?php else: ?>        
                        <?php if((($alumno->ausentes >= 10 && $alumno->ausentes <= 16) || ($alumno->pregDes >= 10 && $alumno->pregDes <= 16))): ?>
                        <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> Abasto</td>
                        <?php endif; ?>
                    <?php endif; ?>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> <?= $alumno->ausentes ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"> <?= $alumno->pregDes ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= $alumno->menDes ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->salud) ? "Si" : "No" ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->individual) ? "Si" : "No" ?></td>
                    <td style="padding: 6px;text-align: center; border-bottom: 2px solid black;"><?= ($alumno->grupal) ? "Si" : "No" ?></td>
                </tr>
    <?php
            endif;
        endif;
    endforeach; 
    ?>
    </tbody>
</table>  
</div>