<?= $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>
 
<div class=container> <center> <h3 style="color:#878787">A RECEBER</h3> </center>
 
<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<table
  class="table-sm size=7px"
  id="table"
  data-search="true"
  data-toggle="table"
  data-search-align="left"
  data-search-accent-neutralise="true"
  data-row-style="rowStyle"
  data-total-field="count"
  data-url="<?= base_url('financeiroarj2/');?>">
  <thead>
    <tr>
      <th data-field="idc" data-sortable="true">IDC</th>
      <th data-field="nome" data-sortable="true">Nome</th>
      <th data-field="tipo" data-sortable="true">Tipo</th>
      <th data-field="venct" data-width="110" data-sortable="true">Vencto</th>
      <th data-field="repete" data-sortable="true">Repetição</th>
      <th data-field="valor">Valor</th>
      <th data-field="iva">IVA</th>
      <th data-field="total">Total</th>
      
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">@</th>
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
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" height="17" width="17" style="margin-right: 5px;">',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .edit': function (e, value, row, index) 
      { window.location.href = "<?= base_url('/tramitandoet/');?>"+row.id }
  }
</script>

<script>
  function rowStyle(row, index) {
    var classes = ['bg-blue','bg-green','bg-orange','bg-yellow','bg-red']

    if (row.periodicidade == "A" ) 
    { return { classes: classes[index / 2]}}
      return { css: {color: 'blue'}}
  }   
</script>
 
<?= $this->endSection('conteudo'); ?>