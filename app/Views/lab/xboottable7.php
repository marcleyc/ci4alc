<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class=container>

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-pagination="true"
  data-flat="true"
  data-search="true"
  data-search-accent-neutralise="true"
  data-pagination="true"
  data-url="http://localhost:8080/boottablej">
  <thead>
    <tr>
      <th data-field="idc" data-sortable="false">IDC</th>
      <th data-field="nome" data-sortable="true">Nome</th>
      <th data-field="email" data-sortable="true">E-mail</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Item Price</th>
    </tr>
  </thead>
</table>

<script>
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="like" href="javascript:void(0)" title="Adicionar">',
      '<img src="<?= base_url("assets/icon/person-plus.svg")?>" width="32" height="20"',
      '</a>',
      '<a class="edit" href="javascript:void(0)" title="Editar">',
      '<img src="<?= base_url("assets/icon/pencil-square.svg")?>" width="32" height="20"',
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" width="32" height="20"',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .like': function (e, value, row, index) {alert('You click like action, row: ' + JSON.stringify(row))},
    'click .edit': function (e, value, row, index) {alert('You click like action, row: ' + JSON.stringify(row))},
    'click .remove': function (e, value, row, index) {$table.bootstrapTable('remove', {field: 'id', values: [row.id]})}
  }
</script>

</div>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- id: 5,name: 'Item 5',price: '$5' -->
