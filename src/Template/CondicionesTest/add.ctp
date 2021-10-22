<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CondicionesTest $condicionesTest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Condiciones Test'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condicionesTest form large-9 medium-8 columns content">
    <?= $this->Form->create($condicionesTest) ?>
    <fieldset>
        <legend><?= __('Add Condiciones Test') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('recuperatorio');
            echo $this->Form->control('materia_id');
            echo $this->Form->control('comision_id');
            echo $this->Form->control('fecha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
