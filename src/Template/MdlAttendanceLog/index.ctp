<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceLog[]|\Cake\Collection\CollectionInterface $mdlAttendanceLog
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Attendance Log'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlAttendanceLog index large-9 medium-8 columns content">
    <h3><?= __('Mdl Attendance Log') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sessionid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('studentid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statusid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statusset') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timetaken') ?></th>
                <th scope="col"><?= $this->Paginator->sort('takenby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remarks') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlAttendanceLog as $mdlAttendanceLog): ?>
            <tr>
                <td><?= $this->Number->format($mdlAttendanceLog->id) ?></td>
                <td><?= $this->Number->format($mdlAttendanceLog->sessionid) ?></td>
                <td><?= $this->Number->format($mdlAttendanceLog->studentid) ?></td>
                <td><?= $this->Number->format($mdlAttendanceLog->statusid) ?></td>
                <td><?= h($mdlAttendanceLog->statusset) ?></td>
                <td><?= $this->Number->format($mdlAttendanceLog->timetaken) ?></td>
                <td><?= $this->Number->format($mdlAttendanceLog->takenby) ?></td>
                <td><?= h($mdlAttendanceLog->remarks) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlAttendanceLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlAttendanceLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlAttendanceLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceLog->id)]) ?>
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
