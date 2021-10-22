<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroup $mdlGroup
 */
    use Cake\Collection\Collection;  
?>
<?= $this->Html->css('table-pdf', ['fullBase' => true]) ?>

<div class="mdlGroups view large-9 medium-8 columns content">
    <div class="info">
        <h3><?= h($mdlGroup->name) ?></h3>
        <?= $mdlGroup->description; ?>
    </div>
        <table>
        <thead>
            <tr>
                <th scope="col" class="cabecera"> Nombre y Apellido </th>
                <?php
                    $ordenado = new Collection(['Parcial Intermedio' => 'Parcial Intermedio', 'Parcial Integrador' => 'Parcial Integrador', '1er Reajuste' => '1er Reajuste', '2do Reajuste' => '2do Reajuste']);
                    $ordenado = $ordenado->each(function ($value, $key) {
                        ?>
                        <th scope="col" class="cabecera"> <?= $value; ?></th>    
                    <?php }); ?>
                    <th scope="col" colspan="20" class="cabecera"> Asistencia Diaria</th>  
            </tr>
            <tr>
                <th colspan="5">Fechas:</th>
                <?php
                    $fechas = $mdlGroup->fechas();
                    foreach($fechas as $date) {
                        $fec = $date['date'];
                ?>
                <td style="padding: 8px;"><?php echo $fec; ?></td>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroup->mdl_user as $user): ?>
                <?php 
                if($user->cargo() == 'alumno'):
                $iterar = $user->cargarArregloNormal(); 
                $asistencias = $mdlGroup->parseFechas($user->mdl_attendance_log);

                $color = $user->condNormal($iterar, $asistencias, $mdlGroup->id);
                ?>
                <tr class= "item-tb">
                <?php if(strrpos(strtoupper($mdlGroup->description), strtoupper($user->lastname)) === FALSE): ?>
                    <th class= "users" style= "<?= $color ?>"><?= $this->Html->link($user->full_name, ['controller' => 'MdlUser', 'action' => 'view', $user->id]) ?> </th>
                    <?php foreach ($iterar as $key => $value) { ?>
                        <td> <?= $value; ?></td>
                    <?php } ?>
                    <?php
                    // $asistencias = $mdlGroup->parseFechas($user->mdl_attendance_log);
                    
                    foreach ($asistencias as $asistencias): ?>
                            <td id="nota-diaria"><?= $asistencias ?> </td>
                    <?php endforeach; ?>
                    
                <?php endif; ?>    
                </tr>
            <?php endif; ?>    
            <?php endforeach; ?> 
            </table>
</div>