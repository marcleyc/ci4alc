<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Arquivos</title>
</head>
<body>
    <?php dd($data->itens); ?>
    <h1>Conteúdo da Pasta: <?php echo $caminho_da_pasta; ?></h1>
    <div class="flex-container">
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
    </div>

   <!-- ------------- TABELA -------------- -->
<div class="flex-container">
   <table id="users-list">
       <thead>
          <tr>  
             <th>Tipo</th>
             <th>Arquivo</th>
             <th>Link</th>
          </tr>
       </thead>
       <tbody>
       <?php foreach ($itens as $item) 
        {
            // Ignora os diretórios . e ..
            if ($item == '.' || $item == '..') {continue;}

            $caminho_completo = $caminho_da_pasta . DIRECTORY_SEPARATOR . $item;

            // Verifica se é um arquivo
            if (is_file($caminho_completo)) {
                echo "Arquivo: <a href='files/open/$item'>$item</a> '<br>' "; 
            }

            // Verifica se é uma pasta
            if (is_dir($caminho_completo)) {
                echo "Pasta: <a href='files3p/$item'>$item</a> '<br>' "; 
            }
        }
        ?>
       </tbody>
     </table>
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
