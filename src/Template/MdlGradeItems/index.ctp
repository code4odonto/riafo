<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGradeItem[]|\Cake\Collection\CollectionInterface $mdlGradeItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Grade Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlGradeItems index large-9 medium-8 columns content">
    <h3><?= __('Mdl Grade Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courseid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoryid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemtype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemmodule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iteminstance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemnumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idnumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gradetype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grademax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grademin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scaleid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outcomeid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gradepass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multfactor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plusfactor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aggregationcoef') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aggregationcoef2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sortorder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display') ?></th>
                <th scope="col"><?= $this->Paginator->sort('decimals') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hidden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locktime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('needsupdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weightoverride') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timecreated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timemodified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGradeItems as $mdlGradeItem): ?>
            <tr>
                <td><?= $this->Number->format($mdlGradeItem->id) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->courseid) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->categoryid) ?></td>
                <td><?= h($mdlGradeItem->itemname) ?></td>
                <td><?= h($mdlGradeItem->itemtype) ?></td>
                <td><?= h($mdlGradeItem->itemmodule) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->iteminstance) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->itemnumber) ?></td>
                <td><?= h($mdlGradeItem->idnumber) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->gradetype) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->grademax) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->grademin) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->scaleid) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->outcomeid) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->gradepass) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->multfactor) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->plusfactor) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->aggregationcoef) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->aggregationcoef2) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->sortorder) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->display) ?></td>
                <td><?= h($mdlGradeItem->decimals) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->hidden) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->locked) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->locktime) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->needsupdate) ?></td>
                <td><?= h($mdlGradeItem->weightoverride) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->timecreated) ?></td>
                <td><?= $this->Number->format($mdlGradeItem->timemodified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlGradeItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlGradeItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlGradeItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGradeItem->id)]) ?>
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
