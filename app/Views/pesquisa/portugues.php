<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?= base_url("assets/css/adistrital.css") ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
    <title>Pesquisa</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h2>Pesquisa de português</h2>
      </div>

      <form id="form" class="form" action="<?= site_url('/irn') ?>" method="get">
        <div class="form-control">
          <label for="username">Nome de usuário</label>
          <input type="text" id="nome" name="nome" placeholder="Digite seu nome de português..."/>         
        </div>

        <button type="submit">Enviar</button>
      </form>
    </div>

    <script src="https://kit.fontawesome.com/f9e19193d6.js" crossorigin="anonymous"></script>
    
  </body>
</html>
