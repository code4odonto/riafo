<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroup $mdlGroup
 */
    use Cake\Collection\Collection;  
?>
<?= $this->Html->css('style-table') ?>
<div class="mdlGroups view large-9 medium-8 columns content">
    <div class="info">
        <h3><?= h($mdlGroup->name) ?></h3>
            <?= $mdlGroup->description; ?>
            <?= $this->Html->link(__('Lista'), ['action' => 'listar', $mdlGroup->id, $mdlGroup->courseid]) ?>
    </div>
        <table>
        <thead>
            <tr>
                <th scope="col" class="cabecera"> Nombre y Apellido </th>
                <?php
                    $ordenado = new Collection(['Parcial Integrador' => 'Parcial Integrador', '1er Reajuste' => '1er Reajuste', '2do Reajuste' => '2do Reajuste', 'Asistencia Diaria' => 'Asistencia Diaria']);
                    $ordenado = $ordenado->each(function ($value, $key) {
                        ?>
                        <th scope="col" class="cabecera"> <?= $value; ?></th>    
                    <?php }); ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroup->mdl_user as $user): ?>
                <?php $iterar = $user->cargarArreglo(); ?>
                <tr class= "item-tb">
                <?php if(strrpos(strtoupper($mdlGroup->description), strtoupper($user->lastname)) === FALSE): ?>
                    <th rowspan= "2" class= "users" style= "<?= $user->evaluarCondicion($iterar) ?>"><?= $this->Html->link($user->full_name, ['controller' => 'MdlUser', 'action' => 'view', $user->id]) ?> </th>
                    <td rowspan= "2" class= "year"><?= $user->cursada; ?></td>
                    <?php foreach ($iterar as $key => $value) { ?>
                        <td> <?= $value; ?></td>
                    <?php } ?>
                    <tr>
                    <?php foreach ($user->mdl_attendance_log as $log): ?>
                        <?php if ($log->mdl_attendance_status->mdl_attendance->name !== 'Año de Cursada'): ?>
                            <td id="nota-diaria"><?= $log->mdl_attendance_status->acronym ?> </td>
                        <?php endif ?>
                    <?php endforeach; ?>
                    </tr>
                <?php endif; ?>    
                </tr>
            <?php endforeach; ?> 
            </table>
</div>