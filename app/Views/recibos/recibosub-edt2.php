<!DOCTYPE html>
<html>
<head>
  <title>Serviços</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>

<div class="container">
<center><h3>Editar o serviço.</h3></center>
<form class="row row-cols-lg-auto g-3 align-items-center mt-1 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('recibosubedt') ?>">  
    <div class="col-12">
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> </br>
	  	  
		<div class="input-group input-group">
	    <div class="input-group-text">Nome</div>
         <input list="browsers" class="form-control" name="nome" placeholder="nome" autocomplete="off" id="fnome" required onchange="myvalida()" value="<?= $recibosub['nome']; ?>"/>         
            <datalist id="browsers">
              <?php foreach($clientes as $x): ?>
                 <option value="<?php echo $x['nome']; ?>">value="<?= $rec['nome']; ?>"</option>
              <?php endforeach; ?>      
            </datalist>             
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Serviço</label>
			<select class="form-select" name="fservico" onchange="myServico()" id="fservico">
			  <option selected><?php echo $recibosub['servicos']; ?></option>
          <?php foreach($servico as $p): ?>
            <option value="<?php echo $p['descricao']; ?>"></option>
          <?php endforeach; ?> 
            <option value="Marcley"></option>
			</select>
		</div>
    
    <!-- LOCAL - INÍCIO -->
    <div class="input-group input-group mt-2">
			<div class="input-group-text">Local</div>
        <input type="string" class="form-control" name="flocal" id="flocal" value="<?= $recibosub['locals']; ?>" />
      <div class="input-group-text">Início</div>
        <input type="date" class="form-control" name="finicio" value="<?= $recibosub['inicio']; ?>" required />
		</div>

    <!-- HONORARIOS - CUSTAS - TOTAL --> 
    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Honorários</div>
         <input type="number" class="form-control" id="fhonorarios" name="fhonorarios" value="<?php echo $recibosub['honorarios']; ?>" required />
		   <div class="input-group-text">Custas</div>
         <input type="number" class="form-control" id="fcustas" name="fcustas" value="<?php echo $recibosub['custas']; ?>" required />
       <div class="input-group-text">Total</div>
         <input type="number" class="form-control" id="ftotal" name="ftotal" onfocus="myTotal()" value="<?php echo $recibosub['total']; ?>" required />
		</div>

    <!-- NPROCESSO - CODIGO - SITUAÇÃO --> 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">nº Processo</div><input type="string" class="form-control" value="<?= $recibosub['nprocesso']; ?>" name="fnprocesso" required />
		   <div class="input-group-text">Código</div><input type="string" class="form-control" value="<?= $recibosub['codigo']; ?>" name="fcodigo" />
       <div class="input-group-text">Situação</div><input type="string" class="form-control" value="<?= $recibosub['sit']; ?>" name="fsit" />
		</div>
    
    <!-- TERMINO - PERIODICIDADE - OK -->
    <div class="input-group input-group mt-2">  

      <div class="input-group-text">Termino</div>
        <input type="date" class="form-control" name="ftermino" value="<?= $recibosub['termino']; ?>" required />
      
        <div class="input-group-text">Periodicidade</div>
        <select class="form-select" name="fperiodicidade">
			  <option selected><?= $recibosub['periodicidade']; ?></option>
          <?php $peri=['N','A','M','S'] ?>
          <?php foreach($peri as $s): ?>
            <option value="<?= $s; ?>"><?= $s; ?></option>
          <?php endforeach; ?> 
			  </select> 

      <div class="input-group-text">OK</div>
      <select class="form-select" name="fok" onchange="mycolor()">
			  <option selected><?= $recibosub['ok']; ?></option>
          <?php $oks=['V','F'] ?>
          <?php foreach($oks as $s): ?>
            <option value="<?= $s; ?>"><?= $s; ?></option>
          <?php endforeach; ?> 
			</select>
         
 		</div>

      <input type="hidden" class="form-control" name="fidrec" value="<?php echo $recibosub['idRec']; ?>"/>
      <input type="hidden" class="form-control" name="fid" value="<?php echo $recibosub['id']; ?>"/>

    <!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" id="submit" class="btn btn-primary" disabled="true">Enviar</button>
		</div>
  </form>
</div>
 
    <h2 id="resultado"></h2>  
    
  <script>
        function myvalida(){
          var nome = document.getElementById("fnome").value;
          var submit = document.getElementById("submit");
          var rec = <?php echo json_encode($clientes); ?>;
          var recnome = [];
            for (let i=0; i<rec.length; i++){recnome.push(rec[i].nome)};    
          console.log(nome);
          console.log(recnome);

          if (recnome.includes(nome)) // verifica se no array reci contem a var nome
             {
              console.log("contem"); 
              submit.removeAttribute("disabled");
              //var findCliente = reci.filter(cli => cli.nome == nome);
              //findCliente.forEach(cli => {fidc.value = cli.idc; console.log(cli.idc);});
             }
          else
             {console.log("não contem"); alert("Cliente não cadastrado");}; 
          //alert(nome);
        };

        window.onload = myvalida(); // executa esse comando js quando carrega a página

        function myServico(){
          var servi = <?php echo json_encode($servico); ?>;
          var servico = document.getElementById("fservico").value;
          var findServico = servi.filter(x => x.descricao == servico);
            //findCliente.forEach(cli => {fidc.value = cli.idc; console.log(cli.idc);});
          console.log(findServico[0]);
          console.log(findServico[0].descricao);
          flocal.value = findServico[0].obs;
          fhonorarios.value = findServico[0].honorarios;
          fcustas.value = findServico[0].emolumentos;
          ftotal.value = findServico[0].total;
        }
        
        function myTotal(){
          ftotal.value = parseFloat(fhonorarios.value) + parseFloat(fcustas.value);       
        }
        
        function mycolor() {
        if (fok.value == "F") 
          { inputName.classList.add('is-danger') }
        else  
          { inputName.classList.remove('is-success')}
        }
        //document.getelementById("btnEnviar"').onclick=function(){
        //let formCores = document. getElementById( 'frmCores' ) . elements;
        //document.getElementById("resultado").innerHTML="Seunomeé"+formCores["nome"].value+" e a cor selecionada é " + formCores ["cores" ].value;
        //}:
        
  </script>

</body>
</html>