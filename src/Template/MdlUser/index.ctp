<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlUser[]|\Cake\Collection\CollectionInterface $mdlUser
 */
?>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Changa|Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<?= $this->Html->css('table-riafo') ?>
<div class="search-box-wrapper"> 
    <div class="search-box">
        <div class="dropdown">
        <?= $this->Form->create(null, ['valueSources' => 'query']) ?>
            <?= $this->Html->link('<i class="fas fa-redo-alt"></i>', ['action' => 'index'], ['escape' => false]); ?>
            <?= $this->Form->control('username', [
                'label' => false,
                'placeholder' => 'Buscar por usuario...',
                'id' => 'myInput'
            ]); ?>
            <?= $this->Form->button('<i class="fas fa-angle-double-right"></i>', ['type' => 'submit'],  ['escape' => false]); ?>
            
            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th class="data" scope="col"><?= $this->Paginator->sort('username', 'DNI') ?></th>
                <th class="data" scope="col"><?= $this->Paginator->sort('firstname', 'Nombre') ?></th>
                <th class="data" scope="col"><?= $this->Paginator->sort('lastname', 'Apellido') ?></th>
                <th class="data" scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mdlUsers as $mdlUser): ?>
            <tr>
                <td class="data"><?= h($mdlUser->username) ?></td>
                <td class="data"><?= h($mdlUser->firstname) ?></td>
                <td class="data"><?= h($mdlUser->lastname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $mdlUser->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $mdlUser->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id= "cont-paginator">
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Inicio')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Fin') . ' >>') ?>
        </ul>
</div>
</div>
<?= $this->Html->script("graphjax") ?>