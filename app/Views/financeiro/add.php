<!DOCTYPE html>
<html>
<head>
  <title>Financeiro Add</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="<?= base_url("assets/css/form.css") ?>" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>
<div class="container">
  <form method="post" id="add_create" name="add_create" action="<?= site_url('financeiros') ?>">  
    
    <div class="material-textfield">
      <input placeholder="placeholder" type="number" value="" />
      <label> ID</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="date" />
      <label>Data</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="text" />
      <label>Banco</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="text" />
      <label>Tipo</label>
    </div>
    
    <div class="material-textfield">
      <input placeholder="placeholder" type="text" />
      <label>Historico</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="text" />
      <label>Número</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="number" min="-10000000" max="10000000" step="0.01" />
      <label>Valor</label>
    </div>

    <div class="material-textfield">
      <input placeholder="placeholder" type="number" />
      <label>Cód.Cliente</label>
    </div>
    <!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" class="btn btn-primary">Enviar</button>
		</div>
  </form>
</div>
  
<script>
   
</script>
</body>
</html>