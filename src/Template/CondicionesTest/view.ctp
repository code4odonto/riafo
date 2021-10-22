<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CondicionesTest $condicionesTest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Condiciones Test'), ['action' => 'edit', $condicionesTest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Condiciones Test'), ['action' => 'delete', $condicionesTest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicionesTest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Condiciones Test'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condiciones Test'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="condicionesTest view large-9 medium-8 columns content">
    <h3><?= h($condicionesTest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $condicionesTest->has('user') ? $this->Html->link($condicionesTest->user->id, ['controller' => 'Users', 'action' => 'view', $condicionesTest->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($condicionesTest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Materia Id') ?></th>
            <td><?= $this->Number->format($condicionesTest->materia_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comision Id') ?></th>
            <td><?= $this->Number->format($condicionesTest->comision_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($condicionesTest->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recuperatorio') ?></th>
            <td><?= $condicionesTest->recuperatorio ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
