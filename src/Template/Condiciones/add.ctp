<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Condicione $condicione
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Condiciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condiciones form large-9 medium-8 columns content">
    <?= $this->Form->create($condicione) ?>
    <fieldset>
        <legend><?= __('Add Condicione') ?></legend>
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
