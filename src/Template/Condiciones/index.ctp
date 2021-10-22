<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Condicione[]|\Cake\Collection\CollectionInterface $condiciones
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Condicione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condiciones index large-9 medium-8 columns content">
    <h3><?= __('Condiciones') ?></h3>
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
            <?php foreach ($condiciones as $condicione): ?>
            <tr>
                <td><?= $this->Number->format($condicione->id) ?></td>
                <td><?= $condicione->has('user') ? $this->Html->link($condicione->user->id, ['controller' => 'Users', 'action' => 'view', $condicione->user->id]) : '' ?></td>
                <td><?= h($condicione->recuperatorio) ?></td>
                <td><?= $this->Number->format($condicione->materia_id) ?></td>
                <td><?= $this->Number->format($condicione->comision_id) ?></td>
                <td><?= h($condicione->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $condicione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $condicione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $condicione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicione->id)]) ?>
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
