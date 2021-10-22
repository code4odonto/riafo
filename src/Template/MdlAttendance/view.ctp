<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendance $mdlAttendance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Attendance'), ['action' => 'edit', $mdlAttendance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Attendance'), ['action' => 'delete', $mdlAttendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Attendance'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Attendance'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlAttendance view large-9 medium-8 columns content">
    <h3><?= h($mdlAttendance->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mdlAttendance->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subnet') ?></th>
            <td><?= h($mdlAttendance->subnet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sessiondetailspos') ?></th>
            <td><?= h($mdlAttendance->sessiondetailspos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mdlAttendance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $this->Number->format($mdlAttendance->course) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($mdlAttendance->grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timemodified') ?></th>
            <td><?= $this->Number->format($mdlAttendance->timemodified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Introformat') ?></th>
            <td><?= $this->Number->format($mdlAttendance->introformat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Showsessiondetails') ?></th>
            <td><?= $mdlAttendance->showsessiondetails ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Showextrauserdetails') ?></th>
            <td><?= $mdlAttendance->showextrauserdetails ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Intro') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlAttendance->intro)); ?>
    </div>
</div>
