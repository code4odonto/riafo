<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendance $mdlAttendance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mdl Attendance'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlAttendance form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlAttendance) ?>
    <fieldset>
        <legend><?= __('Add Mdl Attendance') ?></legend>
        <?php
            echo $this->Form->control('course');
            echo $this->Form->control('name');
            echo $this->Form->control('grade');
            echo $this->Form->control('timemodified');
            echo $this->Form->control('intro');
            echo $this->Form->control('introformat');
            echo $this->Form->control('subnet');
            echo $this->Form->control('sessiondetailspos');
            echo $this->Form->control('showsessiondetails');
            echo $this->Form->control('showextrauserdetails');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
