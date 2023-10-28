<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-search="true"
  data-pagination="true"
  data-side-pagination="server"
  data-show-extended-pagination="true"
  data-total-not-filtered-field="totalNotFiltered"
  data-url="http://localhost:8080/boottablej">

  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="idc">IDC</th>
      <th data-field="nome">Nome</th>
    </tr>
  </thead>
</table>
</div> 

<?= $this->endSection('conteudo'); ?>

