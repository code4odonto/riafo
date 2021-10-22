<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceLog $mdlAttendanceLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mdlAttendanceLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceLog->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mdl Attendance Log'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlAttendanceLog form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlAttendanceLog) ?>
    <fieldset>
        <legend><?= __('Edit Mdl Attendance Log') ?></legend>
        <?php
            echo $this->Form->control('sessionid');
            echo $this->Form->control('studentid');
            echo $this->Form->control('statusid');
            echo $this->Form->control('statusset');
            echo $this->Form->control('timetaken');
            echo $this->Form->control('takenby');
            echo $this->Form->control('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
