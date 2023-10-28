<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table-vue.min.js"></script>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>

<div class="container">

<div id="table">
  <bootstrap-table :columns="columns" :data="data" :options="options"></bootstrap-table>
</div>

<script>
  $(function() {
    new Vue({
      el: '#table',
      components: {
        'BootstrapTable': BootstrapTable
      },
      data: {
        columns: [
          { field: 'state', checkbox: true },
          { field: 'id', title: 'ID' },
          { field: 'nome', title: 'Nome' },
          { field: 'idc', title: 'IDC' },
          {
            field: 'action', title: 'Actions', align: 'center',
            formatter: function () {return '<a href="javascript:" class="btn"> <img src="<?= base_url("assets/icon/add24.png")?>"</a>'},
            //events: {'click .btn': function (e, value, row) {alert(JSON.stringify(row.nome))}}
            events: {'click .btn': function (e, value, row) {window.location.href = `http://localhost:8080/recibo/${row.id}`}}
          }
        ],
        data: <?= json_encode($cliente) ?>,
        options: { search: true, showColumns: true }
      }
    })
  })
</script>

</div>

<?= $this->endSection('conteudo'); ?>

<!-- http://localhost:8080/boottablej -->
<!-- id: 5,name: 'Item 5',price: '$5' -->
