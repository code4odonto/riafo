<?= $this->Html->css(['lista']) ?>
<?= $this->Html->css(['default.css', "https://fonts.googleapis.com/css?family=Nunito+Sans|Open+Sans:400,600|ABeeZee|Comfortaa|Overpass|Righteous|Viga|Source+Sans+Pro:600&display=swap"]) ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<div class= "mdlGroups">    
<h2 class= "fonts"><?= h($mdlGroup->mdl_course->fullname) ?></h3>
<h3 class= "fonts"><?= h($mdlGroup->name) ?></h3>
<span class= "fonts"><?= $mdlGroup->description; ?></span>
<table class= "fonts">
        <thead>
            <tr>
                <th scope="col" class="cabecera"> Nombre y Apellido </th>
                <th scope="col" class="cabecera"> DNI </th>
            </tr>
        </thead>
        <tbody>
            <!-- // RECORRO LA LISTA DE ALUMNOS // -->
            <?php foreach ($mdlGroup->mdl_user as $user): ?>
                <tr class= "item-tb">
                <?php if(strrpos($mdlGroup->description, $user->lastname) === FALSE): ?>
                    <th class= "users"> <span><?= $this->Html->link($user->full_name, ['controller' => 'MdlUser', 'action' => 'view', $user->id]) ?></span> </th>
                    <td><?= $user->username ?> </td>
                </tr>
                <?php endif; ?>    
            <?php endforeach; ?> 
</table>  
</div>