<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
</head>
<body>
    <div id="container">    
        <div id="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</body>
</html>