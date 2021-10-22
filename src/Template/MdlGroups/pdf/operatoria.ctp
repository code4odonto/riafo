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
                <th scope="col" class="cabecera"> Parcial Integrador</th>    
                <th scope="col" colspan="20" class="cabecera"> Asistencia Diaria</th>    

            </tr>
            <tr>
                <th colspan="2">Fechas:</th>
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
                $integrador= 0;
                foreach($user->mdl_grade_items as $notas) {
                    if(strrpos($notas->itemname, 'Operatoria ') !== false) {
                        $integrador= round($notas->_joinData->finalgrade, 0, PHP_ROUND_HALF_DOWN);
                    }
                }
                if($user->cargo() == 'alumno'):
                    $asistencias = $mdlGroup->parseFechas($user->mdl_attendance_log);
                
                ?>
                <tr class= "item-tb">
                <?php if(strrpos(strtoupper($mdlGroup->description), strtoupper($user->lastname)) === FALSE): 
                    $color = $user->condicionOp($integrador, $asistencias, $mdlGroup->id); ?>
                    <th class= "users" style= "<?= $color ?>" ><?= $this->Html->link($user->full_name, ['controller' => 'MdlUser', 'action' => 'view', $user->id]) ?> </th>
                    <td style="text-align: center;"><?= $integrador;?></td>
                    <?php
                    
                    
                    foreach ($asistencias as $asistencias): ?>
                            <td id="nota-diaria" style="text-align: center;"><?= $asistencias ?> </td>
                    <?php endforeach; ?>
                <?php endif; ?>    
                </tr>
                <?php endif; ?>
            <?php endforeach; ?> 
            
            </table>
</div>