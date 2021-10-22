<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CondicionesTest[]|\Cake\Collection\CollectionInterface $condicionesTest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Condiciones Test'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condicionesTest index large-9 medium-8 columns content">
    <h3><?= __('Condiciones Test') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recuperatorio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('materia_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comision_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($condicionesTest as $condicionesTest): ?>
            <tr>
                <td><?= $this->Number->format($condicionesTest->id) ?></td>
                <td><?= $condicionesTest->has('user') ? $this->Html->link($condicionesTest->user->id, ['controller' => 'Users', 'action' => 'view', $condicionesTest->user->id]) : '' ?></td>
                <td><?= h($condicionesTest->recuperatorio) ?></td>
                <td><?= $this->Number->format($condicionesTest->materia_id) ?></td>
                <td><?= $this->Number->format($condicionesTest->comision_id) ?></td>
                <td><?= h($condicionesTest->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $condicionesTest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $condicionesTest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $condicionesTest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicionesTest->id)]) ?>
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
