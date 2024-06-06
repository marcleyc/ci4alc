<?= $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
 
<center> <h3 style="color:#878787">R E C I B O S</h3> </center>

<div class="container">

<div id="toolbar" class="">
  <button id="button-nr" class="btn btn-secondary mx-2"> Novo </button>
</div>

<table
  class="table-sm size=7px"
  id="table"
  data-search="true"
  data-search-accent-neutralise="true"
  data-search-align="left"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-row-style="rowStyle"
  data-total-field="count"
  data-height="500"
  data-url="<?= base_url('recibosj/');?>">
  <thead>
    <tr>     
      <th data-field="id" data-sortable="true">Nº</th>
      <th data-field="idc" data-sortable="true">IDC</th>
      <th data-field="nome" data-sortable="true">Nome</th>
      <th data-field="tipo_pgto" data-width="175" data-sortable="true">Parcela</th>
      <th data-field="total" data-width="110" data-sortable="true" data-formatter="priceFormatter" data-align="right">Total</th>
      
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents" data-align="center">@</th>
    </tr>
  </thead>
</table>
</div>

<!-- https://examples.bootstrap-table.com/#options/row-style.html#view-source -->

<script>
  $(function() {
    $('#table').bootstrapTable({
      formatSearch: function () {
        return 'Search Item Price'
      }
    })
  })
</script>

<script> <!-- "script do campo menu" -->
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="edit" href="javascript:void(0)" title="Visualizar">',
      '<img src="<?= base_url("assets/icon/eye.svg")?>" height="17" width="17" style="margin-right: 20px">',
      '</a>'
    ].join('')
  }
  
  window.operateEvents = {
    'click .edit': function (e, value, row, index) { window.location.href = "<?= base_url('recibo/');?>"+row.id }
  }

  var $button = $('#button-nr')
    $(function() {$button.click(function () { window.location.href = "<?= site_url('/reciboadd') ?>" }, )})  

  function priceFormatter(value) {
    valor = new Intl.NumberFormat('de-De', { style: 'currency', currency: 'EUR' }).format(value)
    return valor;
  }
</script>
 
<?= $this->endSection('conteudo'); ?>