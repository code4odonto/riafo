<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceStatus $mdlAttendanceStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Attendance Status'), ['action' => 'edit', $mdlAttendanceStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Attendance Status'), ['action' => 'delete', $mdlAttendanceStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Attendance Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Attendance Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlAttendanceStatuses view large-9 medium-8 columns content">
    <h3><?= h($mdlAttendanceStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Acronym') ?></th>
            <td><?= h($mdlAttendanceStatus->acronym) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($mdlAttendanceStatus->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendanceid') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->attendanceid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Studentavailability') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->studentavailability) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setunmarked') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->setunmarked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setnumber') ?></th>
            <td><?= $this->Number->format($mdlAttendanceStatus->setnumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visible') ?></th>
            <td><?= $mdlAttendanceStatus->visible ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $mdlAttendanceStatus->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
