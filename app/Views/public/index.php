<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arquivos</title>
</head>
<body>
    <h1>Lista de Arquivos</h1>
    <ul>
    <?php foreach ($files as $file): ?>
        <li><?= $file ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>