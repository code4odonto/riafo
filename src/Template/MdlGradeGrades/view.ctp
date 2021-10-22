<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeGrade $mdlGradeGrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Grade Grade'), ['action' => 'edit', $mdlGradeGrade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Grade Grade'), ['action' => 'delete', $mdlGradeGrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGradeGrade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Grade Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Grade Grade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlGradeGrades view large-9 medium-8 columns content">
    <h3><?= h($mdlGradeGrade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Aggregationstatus') ?></th>
            <td><?= h($mdlGradeGrade->aggregationstatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Itemid') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->itemid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->userid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rawgrade') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->rawgrade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rawgrademax') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->rawgrademax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rawgrademin') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->rawgrademin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rawscaleid') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->rawscaleid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usermodified') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->usermodified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finalgrade') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->finalgrade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hidden') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->hidden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locked') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->locked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locktime') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->locktime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exported') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->exported) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Overridden') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->overridden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Excluded') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->excluded) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Feedbackformat') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->feedbackformat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informationformat') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->informationformat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timecreated') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->timecreated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timemodified') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->timemodified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aggregationweight') ?></th>
            <td><?= $this->Number->format($mdlGradeGrade->aggregationweight) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Feedback') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlGradeGrade->feedback)); ?>
    </div>
    <div class="row">
        <h4><?= __('Information') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlGradeGrade->information)); ?>
    </div>
</div>
