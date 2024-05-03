<!DOCTYPE html>
<html>
<head>
  <title>Financeiro formulário</title> 
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>"> 
  <style>
    .container { max-width: 950px; }
  </style>
</head>

<?php
$tipos =["saldo","entrada","dizimo","recebimento","investimento","carvalhos","mercado","restaurante","lazer","estudo","transporte","fixas","diversos","transferencia","saúde","bens","vestuário","beleza"];
$contas =["activo","money","totta","cartão","bradesco","poup","receber","activoCard","activoAndrea"];
?>

<!-- Id Dataf Banco Tipo Historico Numero Valor IDC -->
<body>
<div class="container">

<p>INSERIR EM FINANCEIRO</p>

  <form class="" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('financeiros') ?>">  
		  
		<div class="input-group input-group">
	       <div class="input-group-text">Data</div><input type="date" class="form-control" name="dataf" placeholder="<Data" required />
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Banco</label>
			<select class="form-select" name="banco">
			  <option selected>selecione</option>
			    <?php foreach($contas as $x): ?>
                  <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                <?php endforeach; ?>
			</select>
        </div>

        <div class="input-group input-group mt-2">
			<label class="input-group-text">Tipo</label>
			<select class="form-select" name="tipo">
			  <option selected class="form-control">selecione</option>
                <?php foreach($tipos as $y): ?>
                  <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                <?php endforeach; ?>
			</select>
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Histórico</div><input type="text" class="form-control" name="historico" required />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Número</div><input type="text" class="form-control" name="numero" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Valor</div><input type="number" required class="form-control" name="valor" />
		</div>

        <div class="input-group input-group mt-2">
			<div class="input-group-text">CodCliente</div><input type="text" class="form-control" name="idc" />
		</div>

        <div class="input-group input-group mt-2">
			<div class="input-group-text">Obs</div><input type="text" class="form-control" name="obs"  />
		</div>
		
		<!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" class="btn btn-primary">ENVIAR</button>
		</div>
  
  </form>
</div>   

<script>cinza claro #f0f0f0;</script>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}	

body {
    width: 100%;
    min-height: 100vh;
    
	  display: flex;
    justify-content: center;
    align-items: center;

    font-family: Arial, sans-serif;
	  font-size:16px;
    margin: 0;
    padding: 0;
    background-color: #696969;
}

.container {
	width: 400px;
    max-width: 100%;
    overflow: hidden;

    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

p {
    text-align: center;
	font-size: 15px;
	margin-top: 3px;
    margin-bottom: 12px;
	border: 1px solid #ccc;
	padding: 12px;
	border-radius: 8px;
	color: #FFFFFF;
	background-color: #808080;
}

.form-control, .form-select {
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="date"],
input[type="text"],
input[type="number"],
input[type="email"],
option, select, 
textarea {
    width: 100%;
    padding: 10px;
    border: 0px solid #ccc;
    border-radius: 7px;
    box-sizing: border-box;
	color: #008080;
	background-color: #f0f0f0;
	font-size: 15px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #32CD32;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	margin-top:5px;
}

button:hover {
    background-color: #7FFFD4;
}

/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 480px) {
  body {
    background-color: #2F4F4F;
  }
}

</style>

</body>
</html>