<?= $this->Html->css(['config']) ?>
<div class="container-config">
    <div class="container-wrap">
        <div class="container-opt">
            <p class="title-opt">Listado por condicion</p>
            <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'MdlUser',
            'action' => 'cursocondicion',
            '_ext' => 'pdf'
        ],
        'class' => ['condicion-form']
    ]); ?>
    <?= $this->Form->control('curso', [
                    'options' => $mdlCourse,
                    'empty' => 'Elegir materia',
                    'id' => 'materia_select', 
                    'label' => false
                ]); ?>
    <?= $this->Form->select('condicion', [
        'Promocion' => 'Promocion', 
        'Regular' => 'Regular',
        'Libre condicional' => 'Libre condicional', 
        'Libre' => 'Libre'
    ],
    ['empty' => 'Elija condición']
    ); ?>
    <?= $this->Form->select('año', [
        '71E' => '1ero', 
        '72E' => '2do',
        '73E' => '3ero', 
        '74E' => '4to',
        '75E' => '5to'
    ],
    ['empty' => 'Año']
    ); ?>
    <?= $this->Form->control('byCom', [
        'type' => 'checkbox',
        'value' => true,
        'hiddenField' => false,
        'label' => 'Por comisión'
        
    ]) ?>
    <?= $this->Form->control('recu', [
        'type' => 'checkbox',
        'value' => true,
        'hiddenField' => false,
        'label' => 'Recuperatorios'
        
    ]) ?>
    <?= $this->Form->button(__('<i class="far fa-file-pdf"></i>'), ['class' => 'export', 'escape' => false]) ?>
    <?= $this->Form->end() ?>
        </div>   
        <div class="container-opt">
            <p class="title-opt">Fin de primera instancia</p>
            <div class="primera">
            <?= $this->Form->create(null, [
                'url' => [
                'controller' => 'MdlUser',
                'action' => 'recupera',
                ],
                'class' => ['primera-form']
                ]); ?>
                <?= $this->Form->control('curso', [
                    'options' => $mdlCourse,
                    'empty' => 'Elegir materia',
                    'id' => 'materia_select', 
                    'label' => false
                ]); ?>
                <?= $this->Form->button(__('Condicion'), ['class' => 'berisso', 'escape' => false]) ?>
            <?= $this->Form->end() ?>
               <?= $this->Html->link(__('Reset'), ['action' => 'reset'], ['class' => 'berisso']) ?>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="container-opt">
            <p class="title-opt">Recuperan en:</p>
            <div class="segunda">
                <?= $this->Html->link(__('Generar'), ['controller' => 'MdlUser', 'action' => 'condicionnegra', '_ext' => 'pdf'], ['class' => 'berisso']) ?>
            </div>
        </div>
        <div class="container-opt">
            <div class="tercera">
                <?= $this->Html->link(__('Importar desde Moodle'), ['controller' => 'MdlUser', 'action' => 'import']) ?>
            </div>
        </div>
    </div>
</div>