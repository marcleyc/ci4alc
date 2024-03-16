<!DOCTYPE html>
<html>
<head>
  <title>Editar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .container { max-width: 800px; }
  </style>
</head>
<body>

<div class="container">
<center><h3 class="mt-5">Editar o situação do processo</h3></center>
<form class="row row-cols-lg-auto g-3 align-items-center mt-1 needs-validation" novalidate method="post" id="add_create" name="add_create" action="<?= site_url('tramitandou') ?>">  
    <div class="col-12">
		<label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label> 
	  
    <!-- NOME -->	  
		<div class="input-group input-group">
	    <div class="input-group-text">Nome Completo</div>
         <input list="browsers" class="form-control" name="nome" autocomplete="off" id="val" required onchange="myvalida()" value="<?php echo $recibosub['nome']; ?>" />         
            <datalist id="browsers">
              <?php foreach($clientes as $x): ?>
                 <option value="<?php echo $x['nome']; ?>"><?php echo $recibosub['nome']; ?></option>
              <?php endforeach; ?>      
            </datalist>             
    </div>
		
    <!-- INICIO - IDC - N.RECIB --> 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Inicio</div><input type="date" class="form-control" value="<?= $recibosub['inicio']; ?>" name="finicio" id="finicio" required />
		   <div class="input-group-text">Cód Cliente</div><input type="number" class="form-control" value="<?= $recibo['idc']; ?>" name="fidc" id="fidc"  />
       <div class="input-group-text">N.º Serviço</div><input type="number" class="form-control" value="<?= $recibo['id']; ?>" name="fid" id="fid" disabled="disabled" />
		</div>

    <!-- SERVICOS -->
		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Serviços</label>
			<select class="form-select" name="fservico" id="fservico">
			  <option selected><?= $recibosub['servicos']; ?></option>
          <?php foreach($servicos as $s): ?>
            <option value="<?php echo $s['descricao']; ?>"><?php echo $s['descricao']; ?></option>
          <?php endforeach; ?> 
			</select>
		</div>

    <!-- LOCAL -->
		<div class="input-group input-group mt-2"> 
	    <div class="input-group-text">Local</div>
         <input list="browsers2" class="form-control" name="flocal" autocomplete="off" id="flocal" required onload="myvalida()" value="<?php echo $recibosub['locals']; ?>" />         
            <datalist id="browsers2">
              <?php foreach($local as $x): ?>
                 <option value="<?php echo $x['locals']; ?>"><?php echo $x['locals']; ?></option>
              <?php endforeach; ?>      
            </datalist>             
		</div>

    <!-- HONORARIOS - CUSTAS - TOTAL --> 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Honorários</div><input type="number" class="form-control" onchange="myTotal()" value="<?= $recibosub['honorarios']; ?>" name="fhonorarios" id="fhonorarios" required />
		   <div class="input-group-text">Custas</div><input type="number" class="form-control" onchange="myTotal()" value="<?= $recibosub['custas']; ?>" name="fcustas" id="fcustas" />
       <div class="input-group-text">Total</div><input type="number" class="form-control" value="<?= $recibosub['total']; ?>" name="ftotal" id="ftotal" disabled="disabled" />
		</div>

    <!-- NPROCESSO - CODIGO - SITUAÇÃO --> 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">nº Processo</div><input type="string" class="form-control" value="<?= $recibosub['nprocesso']; ?>" name="fnprocesso" required />
		   <div class="input-group-text">Código</div><input type="string" class="form-control" value="<?= $recibosub['codigo']; ?>" name="fcodigo" />
       <div class="input-group-text">Situação</div><input type="string" class="form-control" value="<?= $recibosub['sit']; ?>" name="fsit" onchange="mudaSituacao()" />
		</div>
    
    <!-- TERMINO - PERIODICIDADE - OK -->
    <div class="input-group input-group mt-2">
		  <div class="input-group-text">Termino</div>
        <input type="date" class="form-control" name="ftermino" svalue="<?= $recibosub['termino']; ?>" required />
      
        <div class="input-group-text">Periodicidade</div>
        <select class="form-select" name="fperiodicidade">
			  <option selected><?= $recibosub['periodicidade']; ?></option>
          <?php $peri=['N','A','M','S'] ?>
          <?php foreach($peri as $s): ?>
            <option value="<?= $s; ?>"><?= $s; ?></option>
          <?php endforeach; ?> 
			  </select> 

      <div class="input-group-text">OK</div>
      <select class="form-select" name="fok">
			  <option selected><?= $recibosub['ok']; ?></option>
          <?php $oks=['T','F'] ?>
          <?php foreach($oks as $s): ?>
            <option value="<?= $s; ?>"><?= $s; ?></option>
          <?php endforeach; ?> 
			</select>
         
 		</div>

    <input type="hidden" class="form-control" name="fidrec" value="<?php echo $recibosub['idRec']; ?>"/>
    <input type="hidden" class="form-control" name="fid" value="<?php echo $recibosub['id']; ?>"/>
    <input type="hidden" class="form-control" name="fverificado" id="fverif" />
    
    <!-- ----------------------------------------B U T T O N------------------------------------------------------- -->
		<div class="col-12 mt-3">
		    <button type="submit" id="submit" class="btn btn-primary" disabled="true">Enviar</button>
		</div>
  </form>
</div>
 
    <h2 id="resultado"></h2>  
    
  <script>

        function myvalida(){
          var nome = document.getElementById("val").value;
          var submit = document.getElementById("submit");
          var client = <?= json_encode($clientess); ?>;
          var recnome = [];
            for (let i=0; i<client.length; i++){recnome.push(client[i].nome)};    
            console.log('nomeform',nome);
            console.log(recnome);
          var recsub = <?= json_encode($recibosub); ?>;

          if (recnome.includes(nome)) // verifica se no array reci contem a var nome
             {
              console.log("contem"); 
              submit.removeAttribute("disabled");
             }
          else
             {
              console.log("não contem");
              submit.disabled = true; 
              alert("Cliente não cadastrado");
             };
          
        };

        function myTotal(){
          ftotal.value = parseFloat(fhonorarios.value) + parseFloat(fcustas.value);       
        }

        window.onload = myvalida();

       // if (conditions) { inputName.classList.remove('is-danger'), inputName.classList.add('is-success')}
        
  </script>
  
  <?php $data_atual = new \DateTime();  $hoje = $data_atual->format('Y-m-d'); ?>
  <script>
    var hoje = "<?= $hoje ?>";
    function mudaSituacao() {
      console.log(hoje);
      var verf = document.getElementById("fverif").value;
      console.log("2º",verf);
      document.getElementById("fverif").value = hoje;
      //verf.value = "2007";
      var verf2 = document.getElementById("fverif").value;
      console.log("3º",verf2);
    } 
    
  </script>

</body>
</html>