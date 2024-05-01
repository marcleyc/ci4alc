<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Arquivos</title>
</head>
<body>
    <h1>Conteúdo da Pasta: <?php echo $caminho_da_pasta; ?></h1>

    <ul>
        <?php foreach ($itens as $item): ?>
            <li>
                <?php if ($item['tipo'] == 'arquivo'): ?>
                    <a href="<?php echo base_url($item['caminho']); ?>"><?php echo $item['nome']; ?></a> (Arquivo)
                <?php elseif ($item['tipo'] == 'pasta'): ?>
                    <a href="<?php echo base_url('listar-arquivos/' . $item['caminho']); ?>"><?php echo $item['nome']; ?></a> (Pasta)
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
