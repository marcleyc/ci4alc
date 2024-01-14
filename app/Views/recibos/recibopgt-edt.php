<!DOCTYPE html>
<html>
<head>
  <title>Parcela</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>

<div class="container mt-4">

<center class="mt-4"><h3>Editar P A R C E L A</h3></center>
<form class="row row-cols-lg-auto g-3 align-items-center mt-1 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('recibopgtu') ?>">  
    <div class="col-12">
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> </br>
    
    <input type="string" class="form-control" name="fid" id="fid" value="<?=$recibopgt['id']?>" hidden />
    
    <div class="input-group input-group mt-2 d-none "> <!-- d-none  -->
			<div class="input-group-text">nº recibo</div>
      <input type="string" class="form-control" name="fidrec" id="fidrec" value="<?=$recibopgt['idRec']?>" hidden />
		</div>
   
    <div class="input-group input-group mt-2">
			<div class="input-group-text">Vencto</div><input type="date" class="form-control" name="fvencto" id="fvencto" onchange="myVen()" value="<?=$recibopgt['venct']?>" />
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Valor</div><input type="number" class="form-control" id="fvalor" name="fvalor" required value="<?=$recibopgt['valor']?>" />
		   <div class="input-group-text">IVA</div><input type="number" class="form-control" id="fiva" name="fiva" value="0" required value="<?=$recibopgt['iva']?>" />
       <div class="input-group-text">Total</div><input type="number" class="form-control" id="ftotal" name="ftotal" onfocus="myTotal()" required value="<?=$recibopgt['total']?>" />
		</div>

    <div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
			<select class="form-select" name="ftipo" onchange="myHon()" id="ftipo">
			    <option selected><?=$recibopgt['tipo']?></option>
          <option value="honorário">honorário</option>
          <option value="emolumento">emolumento</option>
			</select>
		</div>

    <div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Repete</label>
			<select class="form-select" name="frepete" id="frepete">
			    <option selected><?=$recibopgt['repete']?></option>
          <option value="semestral">semestral</option>
          <option value="anual">anual</option>
          <option value="anual">não</option>
			</select>
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">Nome</div><input type="string" class="form-control" name="nome" id="fnome" value="<?=$recibopgt['nome']?>" />
		</div>

    <div class="input-group input-group mt-2">
			<div class="input-group-text">Pagto</div><input type="date" class="form-control" name="fpgto" id="fpgto" value="<?=$recibopgt['pgtoIVA']?>" />
		</div>

    <!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" id="submit" class="btn btn-primary" >Enviar</button>
		</div>
  </form>

</div>
 
    <h2 id="resultado"></h2>  
    
  <script>
    var submit = document.getElementById("submit");
    
    //function myVen(){if (fvencto.value){submit.removeAttribute("disabled")};}

    function myTotal(){ ftotal.value = parseFloat(fvalor.value) + parseFloat(fiva.value);}

    //function myHon(){if (fvencto.value){submit.removeAttribute("disabled")};}
        
  </script>

</body>
</html>