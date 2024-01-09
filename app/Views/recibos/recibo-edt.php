<!DOCTYPE html>
<html>
<head>
  <title>NewRecibo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>

<div class="container">
<center><h3>Editar Recibo</h3></center>	

<form class="row row-cols-lg-auto g-3 align-items-center mt-1 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('recibou') ?>">  
  <div class="col-12">
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> </br>

		<div class="input-group input-group">
	    <div class="input-group-text">Nome Completo</div>
         <input list="browsers" class="form-control" name="nome" placeholder="nome" autocomplete="off" id="val" required onchange="myvalida()" value="<?= $rec['nome']; ?>"/>         
            <datalist id="browsers">
              <?php foreach($cli as $x): ?>
                 <option value="<?= $x['nome']; ?>"><?= $x['nome']; ?></option>
              <?php endforeach; ?>      
            </datalist>             
		</div>
		 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Data</div><input type="date" class="form-control" value="<?= $rec['dataf'];?>" name="fdata" id="fdata" />
		   <div class="input-group-text">Cód Cliente</div><input type="number" class="form-control" name="fidc" placeholder="IDC" id="fidc" value="<?= $rec['idc']; ?>" />
       <div class="input-group-text">N.º Recibo</div><input type="number" class="form-control" name="frecn" placeholder="N.º Recibo" id="frecn" disabled="disabled" value="<?= $rec['id']; ?>"/>
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Prestador</label>
			<select class="form-select" name="prestador">
			  <option selected>Andréa</option>
          <?php foreach($pre as $p): ?>
            <option value="<?= $p['nomep']; ?>"><?= $p['nomep']; ?></option>
          <?php endforeach; ?> 
            <option value="Marcley"></option>
			</select>
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Qtd Parcela</div><input type="number" class="form-control" name="fparcela" placeholder="Qtd de parcelas" value=1 required />
		   <div class="input-group-text">Parceria</div><input type="string" class="form-control" name="fparceria" placeholder="Parceria" id="fpar" value="não" />
 		</div>

		<div class="input-group input-group mt-2">
			<div class="input-group-text">Obs</div><input type="string" class="form-control" name="fobs" id="fobs" placeholder="obs" value="" />
		</div>

    <div class="input-group-text d-none">N.º Recibo</div><input type="number" class="form-control" name="fid" placeholder="N.º Recibo" id="fid" hidden value="<?= $rec['id']; ?>"/>

    <!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" id="submit" class="btn btn-primary">Enviar</button>
		</div>
 
  </form>
</div>
    <h2 id="resultado"></h2>  
    
  <script>
        //document.getelementById("btnEnviar"').onclick=function(){
        //let formCores = document. getElementById( 'frmCores' ) . elements;
        //document.getElementById("resultado").innerHTML="Seunomeé"+formCores["nome"].value+" e a cor selecionada é " + formCores ["cores" ].value;
        //}:

        //function myvalida(){
          //var nome = document.getElementById("val").value;
          //var submit = document.getElementById("submit");
          //var rec = <!?= json_encode($rec); ?>;
          //var reci = <!?= json_encode($rec); ?>;
          //console.log(rec);
          //console.log(reci);

          //if (rec.data.includes(nome)) // verifica se no array reci contem a var nome
             //{
              //console.log("contem"); 
              //submit.removeAttribute("disabled");
              //var findCliente = reci.filter(cli => cli.nome == nome);
                //findCliente.forEach(cli => { 
                  //fidc.value = cli.idc;
                  //console.log(cli.idc);
                //});
             //}
          //else
             //{console.log("não contem"); alert("Cliente não cadastrado");}; 
          //alert(nome);
        //};

       // if (conditions) {
         // inputName.classList.remove('is-danger')
          //inputName.classList.add('is-success')
        //}
        
  </script>

</body>
</html>