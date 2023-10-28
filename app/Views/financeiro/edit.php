<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 CRUD - Edit User Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<?php
$tipos =["saldo","entrada","dizimo","recebimento","investimento","carvalhos","mercado","restaurante","lazer","estudo","transporte","fixas","diversos","transferencia","saúde","bens","vestuário","beleza"];
$contas =["activo","money","totta","cartão","bradesco","poup","receber","activoCard","activoAndrea"];
?>

<body>
  <div class="container mt-5 rounded">
    <form method="post" id="update_user" name="update_user" action="<?= site_url('/financeirou') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
      
      <div class="input-group input-group">
	       <div class="input-group-text">Data</div>
         <input type="date" class="form-control" name="dataf" value="<?php echo $user_obj['dataf']; ?>" />
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Banco</label>
			<select class="form-select" name="banco" >
			  <option selected><?php echo $user_obj['banco']; ?></option>
			  <?php foreach($contas as $x): ?>
          <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
        <?php endforeach; ?>
			</select>
		</div>

    <div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
			<select class="form-select" name="tipo">
			  <option selected><?php echo $user_obj['tipo']; ?></option>
			  <?php foreach($tipos as $y): ?>
          <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
        <?php endforeach; ?>
			</select>
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Histórico</div>
      <input type="text" class="form-control" name="historico" value="<?php echo $user_obj['historico']; ?>" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Número</div>
      <input type="text" class="form-control" name="numero" value="<?php echo $user_obj['numero']; ?>" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Valor</div>
      <input type="number" class="form-control" name="valor" value="<?php echo $user_obj['valor']; ?>" />
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">CodCliente</div>
      <input type="text" class="form-control" name="idc" value="<?php echo $user_obj['cliente']; ?>" />
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">Obs</div>
      <input type="text" class="form-control" name="obs" value="<?php echo $user_obj['obs']; ?>" />
		</div>

    <div class="form-group">
      <button type="submit" class="btn btn-danger btn-block">Save Data</button>
    </div>

    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          nome: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
</body>
</html>