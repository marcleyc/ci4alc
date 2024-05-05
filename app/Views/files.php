<!-- app/Views/files/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arquivos 2</title>
</head>
<body>
    <?php //dd($filesList); ?>
    <h1>Lista de Arquivos</h1>
    <div>
    <?php if ($filesList): ?>
        <ul>
            <?php foreach ($filesList as $file): ?>
                <?php //if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'pdf'): ?>
                <?php if ($file !== '.' && $file !== '..'): ?>
                    <li>
                        <a href="<?php echo base_url('open/' . urlencode($file)); ?>" target="_blank">
                            <?php echo $file; ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum arquivo encontrado na pasta.</p>
    <?php endif; ?>
    </div>
</body>

<style> 
body {background-color: white; color: blue;}

h1 {text-align:center;}

a, th, td {border: 1px solid grey; border-radius: 10px; padding: 5px;}
th {background-color: blue; color:white;}

td:hover {
  background-color: #3e8e41;
  color: white;
}  

.flex-container {
  display: flex;
  justify-content: center;
  align-items: center;

  padding: 17px;
  margin: 10px;
  border-radius: 10px;
  font-size: 20px;
  line-height: 25px;
}
</style>   

</html>
