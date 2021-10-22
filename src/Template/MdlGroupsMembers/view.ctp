<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroupsMember $mdlGroupsMember
 */
?>
<!-- HACER ESTO DESDE EL VIEW DE GROUP CON ASOCIACIONES ENCADENADAS -->
<div class="mdlGroups index large-9 medium-8 columns content">
    <p><?= __('Participantes de la ') ?> <span><?= h($comision) ?></span></p>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroupsMember as $miembro): ?>
            <tr>
                <td><?= h($miembro->mdl_user->firstname) ?></td>
                <td><?= h($miembro->mdl_user->lastname) ?></td>
                <td><?= h($miembro->mdl_user->username) ?></td>
                <td><?= h($miembro->mdl_group->mdl_course->fullname) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
