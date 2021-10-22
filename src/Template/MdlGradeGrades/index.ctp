<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeGrade[]|\Cake\Collection\CollectionInterface $mdlGradeGrades
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Grade Grade'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlGradeGrades index large-9 medium-8 columns content">
    <h3><?= __('Mdl Grade Grades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rawgrade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rawgrademax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rawgrademin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rawscaleid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usermodified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finalgrade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hidden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locktime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exported') ?></th>
                <th scope="col"><?= $this->Paginator->sort('overridden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('excluded') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feedbackformat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('informationformat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timecreated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timemodified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aggregationstatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aggregationweight') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGradeGrades as $mdlGradeGrade): ?>
            <tr>
                <td><?= $this->Number->format($mdlGradeGrade->id) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->itemid) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->userid) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->rawgrade) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->rawgrademax) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->rawgrademin) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->rawscaleid) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->usermodified) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->finalgrade) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->hidden) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->locked) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->locktime) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->exported) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->overridden) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->excluded) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->feedbackformat) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->informationformat) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->timecreated) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->timemodified) ?></td>
                <td><?= h($mdlGradeGrade->aggregationstatus) ?></td>
                <td><?= $this->Number->format($mdlGradeGrade->aggregationweight) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlGradeGrade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlGradeGrade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlGradeGrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGradeGrade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
