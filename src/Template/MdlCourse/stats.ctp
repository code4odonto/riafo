<?= $this->Html->css("stats.css") ?>
<div class="stat-wrapper">
    <div class="selector-wrapper">    
        <div class="wrapper-select">
            <div class="form-group">
                <?= $this->Form->control('curso', [
                    'options' => $mdlCourse,
                    'empty' => 'Elegir materia',
                    'id' => 'materia_select', 
                    'label' => false
                ]); ?>
        </div>
        <div class="form-group">
            <select name="comisiones" id="comisiones_select">
                    <option value="">Elija una comisión</option>
            </select>
        </div>
        <button id="graphBtn">Generar</button>
        </div>
    </div>
    <div class="section">
        <div class="canvas-wrapper">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<?= $this->Html->script('/node_modules/chart.js/dist/Chart'); ?>
<?= $this->Html->script("graphjax") ?>