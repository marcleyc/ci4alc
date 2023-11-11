<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<!-- link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet" -->
<!-- script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script -->

<link href="<?= base_url("assets/css/bootstrap-table.min.css") ?>" rel="stylesheet">
<script src="<?= base_url("assets/js/bootstrap-table.min.js") ?>"></script>

<div class=container> <center> <h3 style="color:#878787">C L I E N T E S</h3> </center>

<table id="table"
  data-search="true"
  data-height="475"
>
  <thead>
    <tr>
      <th data-field="idc">IDC</th>
      <th data-field="nome">Nome</th>
      <th data-field="email">e-mail</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">menu</th>
    </tr>
  </thead>
</table>

<script>
  var $table = $('#table')
  $(function() {
    //var data = [{'idc': 0,'nome': 'Item 0','email': '$0'},{'idc': 10,'nome': 'Item 1','email': '$1'},]
    var data = <?= json_encode($clientes) ?>;
    $table.bootstrapTable({data: data})
  })  
  console.log(data); 

  function operateFormatter(value, row, index) {
    return [
      '<a class="add" href="javascript:void(0)" title="Adicionar">',
      '<img src="<?= base_url("assets/icon/plus-circle.svg")?>" height="17" width="17" style="margin-right: 20px; margin-left: 15px">',
      '</a>',
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" height="17" width="17" style="margin-right: 20px;">',
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" height="17" width="17" style="margin-right: 20px;>',
      '</a>',
      '<a class="familiar" href="javascript:void(0)" title="Familiares">',
      '<img src="<?= base_url("assets/icon/people.svg")?>" height="17" width="17" style="margin -right: 20px;>',
      '</a>',
      '<a class="fatura" href="javascript:void(0)" title="Faturas">',
      '<img src="<?= base_url("assets/icon/faturas.svg")?>" height="17" width="17">',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .add': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientesa/');?>"+row.idc },
    'click .edit': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientese/');?>"+row.id },
    'click .remove': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientesd/');?>"+row.id },
    'click .fatura': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientesf/');?>"+row.id },
    'click .familiar': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientesf/');?>"+row.id },    
  }
  
</script>

</div>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- { window.location.href = "php //base_url('clientese/');?>"+row.id }, -->
