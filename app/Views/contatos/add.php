<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>
<div class="container">
  <form class="row row-cols-lg-auto g-3 align-items-center mt-3 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('contatoss') ?>">  
    <div class="col-12">
	  
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> </br>
	  	  
		<div class="input-group input-group">
	       <div class="input-group-text">Nome Completo</div><input type="text" class="form-control" name="nome" placeholder="nome" required />
		</div>
		 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Data</div><input type="date" class="form-control" name="data" placeholder="data" required />
		   <div class="input-group-text">E-mail</div><input type="text" class="form-control" name="email" placeholder="e-mail" />
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Status</label>
			<select class="form-select" name="status">
			  <option selected>selecione</option>
			  <option value="documento">documento</option>
			  <option value="pagamento">pagamento</option>
			</select>
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Indicação</div><input type="text" class="form-control" name="indicacao" placeholder="indicação" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Obs</div><input type="text" class="form-control" name="obs" placeholder="obs" />
		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Honorários</div><input type="text" class="form-control" name="honorarios" placeholder="honorarios" />
		</div>
		
		<div class="input-group mb-3 mt-2">
			<div class="input-group-text">
				<input class="form-check-input mt-0" type="checkbox" name="check" value="T" aria-label="Checkbox for following text input">
			</div>
			<span type="text" class="form-control" aria-label="Text input with checkbox" placeholder="cliente?" disabled="true"> É um cliente? </span>
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