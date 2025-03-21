<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('password');
            echo $this->Form->control('password_reset_token');
            echo $this->Form->control('hashval');
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('direccion');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('pais');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
