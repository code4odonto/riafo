<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroup[]|\Cake\Collection\CollectionInterface $mdlGroups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlGroups index large-9 medium-8 columns content">
    <h3><?= __('Mdl Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courseid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idnumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descriptionformat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolmentkey') ?></th>
                <th scope="col"><?= $this->Paginator->sort('picture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hidepicture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timecreated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timemodified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroups as $mdlGroup): ?>
            <tr>
                <td><?= $this->Number->format($mdlGroup->id) ?></td>
                <td><?= $this->Number->format($mdlGroup->courseid) ?></td>
                <td><?= h($mdlGroup->idnumber) ?></td>
                <td><?= h($mdlGroup->name) ?></td>
                <td><?= $this->Number->format($mdlGroup->descriptionformat) ?></td>
                <td><?= h($mdlGroup->enrolmentkey) ?></td>
                <td><?= $this->Number->format($mdlGroup->picture) ?></td>
                <td><?= h($mdlGroup->hidepicture) ?></td>
                <td><?= $this->Number->format($mdlGroup->timecreated) ?></td>
                <td><?= $this->Number->format($mdlGroup->timemodified) ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['controller' => 'MdlGroupsMembers','action' => 'view', $mdlGroup->id, $mdlGroup->name]) ?> -->
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlGroup->id, $mdlGroup->courseid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGroup->id)]) ?>
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
