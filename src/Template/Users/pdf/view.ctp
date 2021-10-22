<div class="users view">
<h2>User</h2>
    <dl>
        <dt><?= __('Id') ?></dt>
        <dd>
            <?= $this->Number->format($user->id) ?>
            &nbsp;
        </dd>
        <dt><?= __('Nombre') ?></dt>
        <dd>
            <?= h($user->firstname) ?>
            &nbsp;
        </dd>
        <dt><?= __('Dni') ?></dt>
        <dd>
            <?= h($user->username) ?>
            &nbsp;
        </dd>
    </dl>
</div>