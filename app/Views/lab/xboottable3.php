<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">
<center> <h3>BootTable json 3</h3> </center>  

<script>
  init({
    title: 'Column Events',
    desc: 'Use `events` column option to define the events for the formatter column.',
    links: ['bootstrap-table.min.css'],
    scripts: ['bootstrap-table.min.js']
  })
</script>

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-url="http://localhost:8080/boottablej">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="nome">Item Name</th>
      <th data-field="idc">Item Price</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Item Price</th>
    </tr>
  </thead>
</table>

<table
  id="table"
  data-toggle="table"
  data-height="460"
  data-url="json/data1.json">
  <thead>
    <tr>
      <th data-field="id">ID</th>
      <th data-field="name">Item Name</th>
      <th data-field="price">Item Price</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Item Price</th>
    </tr>
  </thead>
</table>

<script>
  var $table = $('#table')

  function operateFormatter(value, row, index) {
    return [
      '<a class="like" href="javascript:void(0)" title="Like">',
      '<i class="fa-brands fa-heart"></i>',
      '</a>  ',
      '<a class="remove" href="javascript:void(0)" title="Remove">',
      '<i class="fa fa-trash"></i>',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like action, row: ' + JSON.stringify(row))
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }
</script>

<?= $this->endSection('conteudo'); ?>

data-url="http://localhost:8080/boottablej"