<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeItem $mdlGradeItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mdl Grade Items'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlGradeItems form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlGradeItem) ?>
    <fieldset>
        <legend><?= __('Add Mdl Grade Item') ?></legend>
        <?php
            echo $this->Form->control('courseid');
            echo $this->Form->control('categoryid');
            echo $this->Form->control('itemname');
            echo $this->Form->control('itemtype');
            echo $this->Form->control('itemmodule');
            echo $this->Form->control('iteminstance');
            echo $this->Form->control('itemnumber');
            echo $this->Form->control('iteminfo');
            echo $this->Form->control('idnumber');
            echo $this->Form->control('calculation');
            echo $this->Form->control('gradetype');
            echo $this->Form->control('grademax');
            echo $this->Form->control('grademin');
            echo $this->Form->control('scaleid');
            echo $this->Form->control('outcomeid');
            echo $this->Form->control('gradepass');
            echo $this->Form->control('multfactor');
            echo $this->Form->control('plusfactor');
            echo $this->Form->control('aggregationcoef');
            echo $this->Form->control('aggregationcoef2');
            echo $this->Form->control('sortorder');
            echo $this->Form->control('display');
            echo $this->Form->control('decimals');
            echo $this->Form->control('hidden');
            echo $this->Form->control('locked');
            echo $this->Form->control('locktime');
            echo $this->Form->control('needsupdate');
            echo $this->Form->control('weightoverride');
            echo $this->Form->control('timecreated');
            echo $this->Form->control('timemodified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
