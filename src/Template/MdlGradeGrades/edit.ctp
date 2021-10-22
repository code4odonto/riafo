<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeGrade $mdlGradeGrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mdlGradeGrade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGradeGrade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mdl Grade Grades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlGradeGrades form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlGradeGrade) ?>
    <fieldset>
        <legend><?= __('Edit Mdl Grade Grade') ?></legend>
        <?php
            echo $this->Form->control('itemid');
            echo $this->Form->control('userid');
            echo $this->Form->control('rawgrade');
            echo $this->Form->control('rawgrademax');
            echo $this->Form->control('rawgrademin');
            echo $this->Form->control('rawscaleid');
            echo $this->Form->control('usermodified');
            echo $this->Form->control('finalgrade');
            echo $this->Form->control('hidden');
            echo $this->Form->control('locked');
            echo $this->Form->control('locktime');
            echo $this->Form->control('exported');
            echo $this->Form->control('overridden');
            echo $this->Form->control('excluded');
            echo $this->Form->control('feedback');
            echo $this->Form->control('feedbackformat');
            echo $this->Form->control('information');
            echo $this->Form->control('informationformat');
            echo $this->Form->control('timecreated');
            echo $this->Form->control('timemodified');
            echo $this->Form->control('aggregationstatus');
            echo $this->Form->control('aggregationweight');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
