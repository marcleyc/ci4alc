<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<center> <h3>BootTable json</h3> </center>  

<table
  id="table"
  data-toggle="table"
  
  data-search="true"
  data-search-accent-neutralise="true"
  data-height="460"
  data-pagination="true"
  data-detail-formatter="detailFormatter"
  data-sort-name="idc"
  data-sort-order="desc"
  data-url="http://localhost:8080/boottablej">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="idc" data-sortable="true">IDC</th>
      <th data-field="nome" data-sortable="true">Name</th>
      <th data-field="action" data-formatter="actionFormatter" data-events="actionEvents" data-footer-formatter="footerFormatter">Action</th>
    </tr>
  </thead>
</table>

</div> 

<script>
  var $table = $('#table')
  window.actionEvents = {'click .btn': function (data) {alert(data)}}
  //function actionEvents(index) {return index % 2 === 0}
  function actionFormatter(data) {return `<a button class="btn btn-sm"> ${data} </a>`}
  //function actionFormatter() {return '<button class="btn btn-secondary">Click</>'}
  function detailFilter(index) {return index % 2 === 0}
  function idFormatter() {return 'Total'}
  function footerFormatter(data) {return data.length}
</script>

<?= $this->endSection('conteudo'); ?>

<a href="<?php echo base_url('clientes/');?>">clientes</a>
