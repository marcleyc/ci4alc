<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Dados</title>
</head>
<body>
    <!-- div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" -->
    <div style="position: absolute;top: 20%;left: 50%;transform: translate(-50%, -50%); ">
    <h2>Inserir Dados</h2>
    <form action="<?= site_url('/tiposs') ?>" method="POST">
        <label for="nome">Tipo</label><br>
        <input type="text" id="tipo" name="tipo"><br>

        <label for="email">Descrição</label><br>
        <input type="text" id="descricao" name="descricao"><br><br>

        <input type="submit" value="Inserir Dados">
    </form>
</div>

<style> 
body {background-color: white; color: blue;}

h1 {text-align:center;}

label, input { padding: 8px; text-align: center; font-size: 18}

</style>   

</body>
</html>