<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Condicione $condicione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Condicione'), ['action' => 'edit', $condicione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Condicione'), ['action' => 'delete', $condicione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Condiciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condicione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="condiciones view large-9 medium-8 columns content">
    <h3><?= h($condicione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $condicione->has('user') ? $this->Html->link($condicione->user->id, ['controller' => 'Users', 'action' => 'view', $condicione->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($condicione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materia Id') ?></th>
            <td><?= $this->Number->format($condicione->materia_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comision Id') ?></th>
            <td><?= $this->Number->format($condicione->comision_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($condicione->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recuperatorio') ?></th>
            <td><?= $condicione->recuperatorio ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
