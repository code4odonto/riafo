<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MdlGroupsMember $mdlGroupsMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mdl Groups Members'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mdlGroupsMembers form large-9 medium-8 columns content">
    <?= $this->Form->create($mdlGroupsMember) ?>
    <fieldset>
        <legend><?= __('Add Mdl Groups Member') ?></legend>
        <?php
            echo $this->Form->control('groupid');
            echo $this->Form->control('userid');
            echo $this->Form->control('timeadded');
            echo $this->Form->control('component');
            echo $this->Form->control('itemid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
