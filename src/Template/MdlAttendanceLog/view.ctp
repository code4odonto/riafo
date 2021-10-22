<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceLog $mdlAttendanceLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Attendance Log'), ['action' => 'edit', $mdlAttendanceLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Attendance Log'), ['action' => 'delete', $mdlAttendanceLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Attendance Log'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Attendance Log'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlAttendanceLog view large-9 medium-8 columns content">
    <h3><?= h($mdlAttendanceLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Statusset') ?></th>
            <td><?= h($mdlAttendanceLog->statusset) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Remarks') ?></th>
            <td><?= h($mdlAttendanceLog->remarks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sessionid') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->sessionid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Studentid') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->studentid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statusid') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->statusid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timetaken') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->timetaken) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Takenby') ?></th>
            <td><?= $this->Number->format($mdlAttendanceLog->takenby) ?></td>
        </tr>
    </table>
</div>
