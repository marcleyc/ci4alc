<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="<?= base_url("assets/css/bootstrap-table.min.css") ?>" rel="stylesheet">
<script src="<?= base_url("assets/js/bootstrap-table.min.js") ?>"></script>

<div class=container> <center> <h3 style="color:#878787">C O N T A T O S</h3> </center>

<div id="toolbar">
  <button id="button" class="btn btn-secondary"> Novo </button>
</div>

<table
  id="table"
  data-search="true"
  data-search-accent-neutralise="true"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-height="475"
  data-url="<?= base_url('contatosj/');?>">
  <thead>
    <tr>
      <th data-field="id" data-sortable="true">ID</th>
      <th data-field="nome" data-sortable="true">Nome</th>
      <th data-field="email">e-mail</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">menu</th>
    </tr>
  </thead>
</table>

<script>
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="add" href="javascript:void(0)" title="Adicionar">',
      '<img src="<?= base_url("assets/icon/plus-circle.svg")?>" height="17" width="17" style="margin-right: 20px; margin-left: 15px">',
      '</a>',
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" height="17" width="17" style="margin-right: 20px;">',
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" height="17" width="17" style="margin-right: 20px;">',
      '</a>',
      '<a class="parent" href="javascript:void(0)" title="Adicinar Parente">',
      '<img src="<?= base_url("assets/icon/people.svg")?>" height="17" width="17">',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .add': function (e, value, row, index) 
      { window.location.href = "<?= base_url('contatosc/');?>" },
    'click .edit': function (e, value, row, index) 
      { window.location.href = "<?= base_url('contatose/');?>"+row.id },
    'click .remove': function (e, value, row, index) 
      { window.location.href = "<?= base_url('contatosd/');?>"+row.id },
    'click .parent': function (e, value, row, index) 
      { window.location.href = "<?= base_url('clientesa/');?>"+row.id },  
  }
  
</script>

<script>
  var $table = $('#table')
  var $button = $('#button')

  $(function() {
    $button.click(function () { window.location.href = "<?= base_url('contatosc/');?>" }, )
  })
</script>

</div>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- { window.location.href = "php //base_url('clientese/');?>"+row.id }, -->
