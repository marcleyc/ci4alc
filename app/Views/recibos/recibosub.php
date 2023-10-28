<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ALC Advocacia</title>
<link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<center><h1>S E R V I Ç O S</h1></center>

<div class="container m-8">

<body id="app">

<div class="container">
<?php foreach($cliente as $r): ?>  
  <div class="row">
    <div class="col shadow rounded m-2" id="myshadow">
      <div style="margin:7px"> <span class="titulo"> id: </span> <?=$r['id'];?></div> 
      <div style="margin:7px"> <span class="titulo"> idRec: </span> <?=$r['id'];?> </div> 
      <div style="margin:7px"> <span class="titulo"> serviços: </span> <?=$r['id'];?> </div>
    </div>
    <div class="col-6 shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">nome:</span> <?=$r['nome'];?> </div>
      <div style="margin:7px"> <span class="titulo">honorários:</span> <?=$r['id'];?> </div>
      <div style="margin:7px"> <span class="titulo">custas:</span> <?=$r['id'];?> </div>
    </div>
    <div class="col shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">locals:</span> <?=$r['id'];?> </div>
      <div style="margin:7px"> <span class="titulo">total de custas:</span> <?=$r['id'];?> </div>
      <div style="margin:7px"> <span class="titulo">total:</span> <?=$r['id']+$r['id'];?> </div> 
    </div>
  </div>
  <div id="button-1" class="d-flex justify-content-end mt-2">
    <button type="button" class="btn btn-outline-info">Edit</button>
    <button type="button" class="btn btn-outline-danger">Delete</button>
  </div>
<?php endforeach; ?>
</div>  

<br>  
  
</body>

<script>    
  //var jrecibo = JSON.parse();
  //console.log(jrecibo);
  var jrecibosub = JSON.parse('<?php echo json_encode($cliente) ?>');
  console.log(jrecibosub);
</script>

<style> 
    .titulo {font-weight: bold;}
    #myshadow {box-shadow: 3px 2px 2px #CEF4FC;}
    #button1 {position:absolute;}
</style>
