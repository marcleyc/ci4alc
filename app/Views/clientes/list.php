<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<!-- link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet" -->
<!-- script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script -->

<link href="<?= base_url("assets/css/bootstrap-table.min.css") ?>" rel="stylesheet">
<script src="<?= base_url("assets/js/bootstrap-table.min.js") ?>"></script>

  <center> <h2 style="color:#878787; ">C L I E N T E S</h2> </center> 

<div id="tabela">

  <table
    id="table"
    data-search="true"
    data-search-align="left"
    data-search-accent-neutralise="true"
    data-toggle="table"
    data-height="575"
    data-virtual-scroll="true"
    data-url="<?= base_url('clientesj/');?>">
    <thead>
      <tr>
        <th data-field="idc" data-sortable="true">IDC</th>
        <th data-field="nome" data-sortable="true">Nome</th>
        <th data-field="email" data-sortable="true">e-mail</th>
        <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">menu</th>
      </tr>
    </thead>
  </table>

</div>

<script>
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="add" href="javascript:void(0)" title="Adicionar">',
      '<img src="<?= base_url("assets/icon/plus-circle.svg")?>" height="17" width="17" style="margin-right: 20px; margin-left: 15px">',
      '</a>',
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" height="17" width="17" style="margin-right: 20px">',
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" height="17" width="17" style="margin-right: 20px">',
      '</a>',
      '<a class="familiar" href="javascript:void(0)" title="Familiares">',
      '<img src="<?= base_url("assets/icon/people.svg")?>" height="17" width="17" style="margin-right: 20px">',
      '</a>',
      '<a class="fatura" href="javascript:void(0)" title="Faturas">',
      '<img src="<?= base_url("assets/icon/faturas.svg")?>" height="17" width="17">',
      '</a>',
    ].join('')
  }

  window.operateEvents = {
    'click .add': function (e, value, row, index) { window.location.href = "<?= base_url('clientesa/');?>"+row.idc },
    'click .edit': function (e, value, row, index) { window.location.href = "<?= base_url('clientese/');?>"+row.id },
    'click .remove': function (e, value, row, index) { window.location.href = "<?= base_url('clientesd/');?>"+row.id },
    'click .familiar': function (e, value, row, index) { window.location.href = "<?= base_url('clientesf/');?>"+row.idc },  
    'click .fatura': function (e, value, row, index) { window.location.href = "<?= base_url('recibosubf/');?>"+row.idc }
  }
  
</script>

<script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
<script> var xurls = "<?= base_url('/global'); ?>/"; </script> 
<script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- { window.location.href = "php //base_url('clientese/');?>"+row.id }, -->
