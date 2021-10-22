<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendanceStatus[]|\Cake\Collection\CollectionInterface $mdlAttendanceStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Attendance Status'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlAttendanceStatuses index large-9 medium-8 columns content">
    <h3><?= __('Mdl Attendance Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendanceid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acronym') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('studentavailability') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setunmarked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setnumber') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlAttendanceStatuses as $mdlAttendanceStatus): ?>
            <tr>
                <td><?= $this->Number->format($mdlAttendanceStatus->id) ?></td>
                <td><?= $this->Number->format($mdlAttendanceStatus->attendanceid) ?></td>
                <td><?= h($mdlAttendanceStatus->acronym) ?></td>
                <td><?= h($mdlAttendanceStatus->description) ?></td>
                <td><?= $this->Number->format($mdlAttendanceStatus->grade) ?></td>
                <td><?= $this->Number->format($mdlAttendanceStatus->studentavailability) ?></td>
                <td><?= $this->Number->format($mdlAttendanceStatus->setunmarked) ?></td>
                <td><?= h($mdlAttendanceStatus->visible) ?></td>
                <td><?= h($mdlAttendanceStatus->deleted) ?></td>
                <td><?= $this->Number->format($mdlAttendanceStatus->setnumber) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlAttendanceStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlAttendanceStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlAttendanceStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendanceStatus->id)]) ?>
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
