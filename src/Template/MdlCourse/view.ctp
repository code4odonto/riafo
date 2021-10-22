<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlCourse $mdlCourse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mdl Course'), ['action' => 'edit', $mdlCourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mdl Course'), ['action' => 'delete', $mdlCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mdlCourse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mdl Course'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mdl Course'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mdlCourse view large-9 medium-8 columns content">
    <h3><?= h($mdlCourse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($mdlCourse->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shortname') ?></th>
            <td><?= h($mdlCourse->shortname) ?></td>
        </tr>
        
    </table>
    <div class="row">
        <h4><?= __('Summary') ?></h4>
        <?= $this->Text->autoParagraph(h($mdlCourse->summary)); ?>
    </div>
    <div>
            <span><?= __('Comisiones') ?></span>
            <?php foreach ($mdlCourse->mdl_groups as $grupos): ?>
                <p><?= h($grupos->name) ?></p> <span><?= $this->Html->link(__('Ver'), ['controller' => 'MdlGroups','action' => 'view', $grupos->id, $mdlCourse->id]) ?> </span>
            <?php endforeach; ?>
        </div>
</div>