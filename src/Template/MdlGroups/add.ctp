<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroup $mdlGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mdl Groups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlGroup) ?>
    <fieldset>
        <legend><?= __('Add Mdl Group') ?></legend>
        <?php
            echo $this->Form->control('courseid');
            echo $this->Form->control('idnumber');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('descriptionformat');
            echo $this->Form->control('enrolmentkey');
            echo $this->Form->control('picture');
            echo $this->Form->control('hidepicture');
            echo $this->Form->control('timecreated');
            echo $this->Form->control('timemodified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
