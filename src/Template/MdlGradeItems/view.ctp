<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeItem $mdlGradeItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Grade Item'), ['action' => 'edit', $mdlGradeItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Grade Item'), ['action' => 'delete', $mdlGradeItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGradeItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Grade Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Grade Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlGradeItems view large-9 medium-8 columns content">
    <h3><?= h($mdlGradeItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Itemname') ?></th>
            <td><?= h($mdlGradeItem->itemname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Itemtype') ?></th>
            <td><?= h($mdlGradeItem->itemtype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Itemmodule') ?></th>
            <td><?= h($mdlGradeItem->itemmodule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idnumber') ?></th>
            <td><?= h($mdlGradeItem->idnumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courseid') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->courseid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoryid') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->categoryid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iteminstance') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->iteminstance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Itemnumber') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->itemnumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gradetype') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->gradetype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grademax') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->grademax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grademin') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->grademin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scaleid') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->scaleid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outcomeid') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->outcomeid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gradepass') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->gradepass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multfactor') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->multfactor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plusfactor') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->plusfactor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aggregationcoef') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->aggregationcoef) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aggregationcoef2') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->aggregationcoef2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sortorder') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->sortorder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->display) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hidden') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->hidden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locked') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->locked) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locktime') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->locktime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Needsupdate') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->needsupdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timecreated') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->timecreated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timemodified') ?></th>
            <td><?= $this->Number->format($mdlGradeItem->timemodified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Decimals') ?></th>
            <td><?= $mdlGradeItem->decimals ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weightoverride') ?></th>
            <td><?= $mdlGradeItem->weightoverride ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Iteminfo') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlGradeItem->iteminfo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Calculation') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlGradeItem->calculation)); ?>
    </div>
</div>
