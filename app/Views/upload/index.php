
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>
<body>
    <h2>Enviar Arquivos</h2>
    
    <?php if(isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form action="<?= site_url('/uploads') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png, .gif, .csv">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
    