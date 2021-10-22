<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Html->css('perfil') ?>
<div class="users-form">
    <?= $this->Form->create($user) ?>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('password');
            echo $this->Form->control('rol', [
                'options' => ['admin' => 'Administrador', 'docente' => 'Docente', 'alumno' => 'Alumno'],
                'label' => 'Ingrese su rol: '
            ]);
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('direccion');
            echo $this->Form->control('ciudad');
            echo $this->Form->control('pais');
        ?>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
