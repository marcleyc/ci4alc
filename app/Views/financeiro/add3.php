<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .container { max-width: 800px; }
  </style>
</head>

<?php
$tipos =["saldo","entrada","dizimo","recebimento","investimento","carvalhos","mercado","restaurante","lazer","estudo","transporte","fixas","diversos","transferencia","saúde","bens","vestuário","beleza"];
$contas =["activo","money","totta","cartão","bradesco","poup","receber","activoCard","activoAndrea"];
?>

<!-- Id Dataf Banco Tipo Historico Numero Valor IDC -->
<body>
<div class="container">
  <form class="row row-cols-lg-auto g-3 align-items-center mt-3 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('financeiros') ?>">  
    <div class="col-12">
	  
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> </br>
	  	  
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
			<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
			<select class="form-select" name="tipo">
			  <option selected>selecione</option>
        <?php foreach($tipos as $y): ?>
          <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
        <?php endforeach; ?>
			</select>
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Histórico</div><input type="text" class="form-control" name="historico" placeholder="historico" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Número</div><input type="text" class="form-control" name="numero" placeholder="numero" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Valor</div><input type="number" class="form-control" name="valor" placeholder="honorarios" />
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">CodCliente</div><input type="text" class="form-control" name="idc" placeholder="numero" />
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">Obs</div><input type="text" class="form-control" name="obs" placeholder="obs" />
		</div>
		
		<!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" class="btn btn-primary">Enviar</button>
		</div>
  </form>
</div>   
  
<script>
    // validação do formulário
(function () {  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

    if ($("#add_create").length > 0) {
      $("#add_create").validate({
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
          name: {
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