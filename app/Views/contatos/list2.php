<!doctype html>
<html lang="pt">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contatos</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">
  
  <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- ?php echo $this->extend('main'); ? --> 
</head>
<body style="background-color: #F5F5F9;">
 
<h1>Lista 2</h1>
<div>
  <center>   
    <table id="example" class="display" width="100%"></table>
  </center> 
</div>

<script>
//var cont = <!-- ?php JSON.parse('echo json_encode($contatos)'); ? -->;
var contt = JSON.parse('<?php echo json_encode($clientes) ?>');
console.log(contt);

new DataTable('#example', {
    ajax: 'http://localhost:8080/index.php/contatosx',
    processing: true,
    serverSide: true
});
  
</script>
</body>
</html>