<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceStatus $mdlAttendanceStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mdlAttendanceStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mdl Attendance Statuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlAttendanceStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlAttendanceStatus) ?>
    <fieldset>
        <legend><?= __('Edit Mdl Attendance Status') ?></legend>
        <?php
            echo $this->Form->control('attendanceid');
            echo $this->Form->control('acronym');
            echo $this->Form->control('description');
            echo $this->Form->control('grade');
            echo $this->Form->control('studentavailability');
            echo $this->Form->control('setunmarked');
            echo $this->Form->control('visible');
            echo $this->Form->control('deleted');
            echo $this->Form->control('setnumber');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
