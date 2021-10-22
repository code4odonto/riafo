<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroupsMember[]|\Cake\Collection\CollectionInterface $mdlGroupsMembers
 */
?>
<?php foreach ($miembros as $miembro): ?>
            <?= h($miembro->mdlUser->firstname) ?>
            <?php endforeach; ?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mdl Groups Member'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mdlGroupsMembers index large-9 medium-8 columns content">
    <h3><?= __('Alumnos de la comision ') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('groupid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timeadded') ?></th>
                <th scope="col"><?= $this->Paginator->sort('component') ?></th>
                <th scope="col"><?= $this->Paginator->sort('itemid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlGroupsMembers as $mdlGroupsMember): ?>
            <tr>
                <td><?= $this->Number->format($mdlGroupsMember->id) ?></td>
                <td><?= $this->Number->format($mdlGroupsMember->groupid) ?></td>
                <td><?= $this->Number->format($mdlGroupsMember->userid) ?></td>
                <td><?= $this->Number->format($mdlGroupsMember->timeadded) ?></td>
                <td><?= h($mdlGroupsMember->component) ?></td>
                <td><?= $this->Number->format($mdlGroupsMember->itemid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mdlGroupsMember->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mdlGroupsMember->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mdlGroupsMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlGroupsMember->id)]) ?>
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
</div> -->