<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlCourse $mdlCourse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mdl Course'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlCourse form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlCourse) ?>
    <fieldset>
        <legend><?= __('Add Mdl Course') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('sortorder');
            echo $this->Form->control('fullname');
            echo $this->Form->control('shortname');
            echo $this->Form->control('idnumber');
            echo $this->Form->control('summary');
            echo $this->Form->control('summaryformat');
            echo $this->Form->control('format');
            echo $this->Form->control('showgrades');
            echo $this->Form->control('newsitems');
            echo $this->Form->control('startdate');
            echo $this->Form->control('enddate');
            echo $this->Form->control('marker');
            echo $this->Form->control('maxbytes');
            echo $this->Form->control('legacyfiles');
            echo $this->Form->control('showreports');
            echo $this->Form->control('visible');
            echo $this->Form->control('visibleold');
            echo $this->Form->control('groupmode');
            echo $this->Form->control('groupmodeforce');
            echo $this->Form->control('defaultgroupingid');
            echo $this->Form->control('lang');
            echo $this->Form->control('calendartype');
            echo $this->Form->control('theme');
            echo $this->Form->control('timecreated');
            echo $this->Form->control('timemodified');
            echo $this->Form->control('requested');
            echo $this->Form->control('enablecompletion');
            echo $this->Form->control('completionnotify');
            echo $this->Form->control('cacherev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
