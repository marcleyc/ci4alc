<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="<?= base_url("assets/css/bootstrap-table.min.css") ?>" rel="stylesheet">
<script src="<?= base_url("assets/js/bootstrap-table.min.js") ?>"></script>

<div class=container> <center> <h3 style="color:#878787">F I N A N C E I R O</h3> </center>

<div id="toolbar">
  <button id="button" class="btn btn-secondary mx-2"> Novo </button>
</div>

<table class="table table-sm"
  id="table"
  data-search="true"
  data-search-accent-neutralise="true"
  data-search-align="center"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-height="500"
  data-advanced-search="true"
  data-id-table="advancedTable"
  data-virtual-scroll="true"
  data-url="<?= base_url('financeiroj/');?>">
  <thead>
    <tr>
      <th data-field="id" data-sortable="true">ID</th>
      <th data-field="dataf" data-filter-control="input" data-sortable="true" data-width="110" >Data</th>
      <th data-field="banco" data-sortable="true" data-filter-control="input">Banco</th>
      <th data-field="tipo" data-sortable="true" data-filter-control="input">Tipo</th>
      <th data-field="historico" data-sortable="true" data-filter-control="input">Historico</th>
      <th data-field="numero" data-sortable="true" data-filter-control="input">Numero</th>
      <th data-field="valor" data-sortable="true" data-filter-control="input" data-formatter="priceFormatter" data-align="right">Valor</th>
      <th data-field="cliente" data-sortable="true" data-filter-control="input">IDC</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">menu</th>
    </tr>
  </thead>
</table>

<script>
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" height="17" width="17" style="margin-right: 5px;">',
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" height="17" width="17" style="margin-right" >',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .edit': function (e, value, row, index) 
      { window.location.href = "<?= base_url('financeiroe/');?>"+row.id },
    'click .remove': function (e, value, row, index) 
      { window.location.href = "<?= base_url('financeirod/');?>"+row.id }
  }
  function priceFormatter(value) {
    valor = new Intl.NumberFormat('de-De', { style: 'currency', currency: 'EUR' }).format(value)
    return valor  
  }
</script>

<script>
  var $table = $('#table')
  var $button = $('#button')

  $(function() {
    $button.click(function () { window.location.href = "<?= site_url('/financeiroc') ?>" }, )
  })
</script>

<script>
  $(function() {
    $('#table').bootstrapTable()
  })
</script>

</div>

<script> 
    var ddd = <?php echo json_encode($clientesp); ?>; 
    console.log('bonjour',ddd);
</script> 
<script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- { window.location.href = "php //base_url('clientese/');?>"+row.id }, -->