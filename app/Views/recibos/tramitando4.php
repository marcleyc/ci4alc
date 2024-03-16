<?= $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>
 
<div class=container> <center> <h3 style="color:#878787">Atualizar processos </h3> </center>
 
<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<table
  id="table"
  data-search="true"
  data-search-align="left"
  data-row-style="rowStyle"
  data-url="<?= base_url('tramitandoj4/');?>">
  <thead>
    <tr>
      <th data-field="locals" data-width="175">Local</th>
      <th data-field="servicos">Serviço</th>
      <th data-field="inicio" data-width="110">Início</th>
      <th data-field="nome">Nome</th>
      <th data-field="verificado">Verificado</th>
      <th data-field="codigo" data-width="150">Código</th>
      <th data-field="sit">Sit</th>
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
      { window.location.href = "<?= base_url('/tramitandoet2/');?>"+row.id }
  }
</script>

<script>
  function rowStyle(row, index) {
    var classes = ['bg-blue','bg-green','bg-orange','bg-yellow','bg-red']

    if (row.sit <= 3 ) 
    { return { classes: classes[index / 2]}}
      return { css: {color: 'blue'}}
  }   
</script>
 
<?= $this->endSection('conteudo'); ?>