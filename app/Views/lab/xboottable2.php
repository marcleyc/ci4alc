<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<table id="table">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="idc">IDC</th>
      <th data-field="nome">NOME</th>
    </tr>
  </thead>
</table>

<script> 
  var $table = $('#table')
  $(function() 
  {
    var data = <?php echo json_encode($cliente) ?>;
    $table.bootstrapTable({data: data})
  })
</script>


<script>
  var link = "http://localhost:8080/contatosx";  
</script>

<?= $this->endSection('conteudo'); ?>

