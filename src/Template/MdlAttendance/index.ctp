<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlAttendance[]|\Cake\Collection\CollectionInterface $mdlAttendance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Attendance'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlAttendance index large-9 medium-8 columns content">
    <h3><?= __('Mdl Attendance') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timemodified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('introformat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subnet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sessiondetailspos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('showsessiondetails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('showextrauserdetails') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlAttendance as $mdlAttendance): ?>
            <tr>
                <td><?= $this->Number->format($mdlAttendance->id) ?></td>
                <td><?= $this->Number->format($mdlAttendance->course) ?></td>
                <td><?= h($mdlAttendance->name) ?></td>
                <td><?= $this->Number->format($mdlAttendance->grade) ?></td>
                <td><?= $this->Number->format($mdlAttendance->timemodified) ?></td>
                <td><?= $this->Number->format($mdlAttendance->introformat) ?></td>
                <td><?= h($mdlAttendance->subnet) ?></td>
                <td><?= h($mdlAttendance->sessiondetailspos) ?></td>
                <td><?= h($mdlAttendance->showsessiondetails) ?></td>
                <td><?= h($mdlAttendance->showextrauserdetails) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlAttendance->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlAttendance->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlAttendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlAttendance->id)]) ?>
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
