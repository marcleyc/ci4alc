<!-- app/Views/files/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arquivos</title>
</head>
<body>

    <h1>Lista de Arquivos</h1>

    <?php if ($filesList): ?>
        <ul>
            <?php foreach ($filesList as $file): ?>
                <?php if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'pdf'): ?>
                <?php //if ($file !== '.' && $file !== '..'): ?>
                    <li>
                        <a href="<?php echo base_url('files/open/' . urlencode($file)); ?>" target="_blank">
                            <?php echo $file; ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum arquivo encontrado na pasta.</p>
    <?php endif; ?>

</body>
</html>
