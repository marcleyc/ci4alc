<?= $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>
 
<div class=container> <center> <h3 style="color:#878787">S E R V I Ç O S</h3> </center>
 
<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<link href="<?= base_url("assets/css/modal.css") ?>" rel="stylesheet">

<div class="container">

<div id="toolbar" class="px-2">
  <button type="button" id="button" class="btn btn-primary" onclick="openModal()"> Novo </button>
  <button id="button2" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalTable2"> Edit </button>
</div>

<table
  id="table"
  data-search="true"
  data-search-align="left"
  data-search-accent-neutralise="true"
  data-toggle="table"
  data-toolbar="#toolbar"
  data-height="475"
  data-url="<?= base_url('servicosj/');?>">
  <thead>
    <tr>
      <th data-field="descricao">Descrição</th>
      <th data-field="honorarios">Honorários</th>
      <th data-field="emolumentos" data-width="175">Emolumentos</th>
      <th data-field="total" data-width="110">Total</th>
      <th data-field="obs">Obs</th>
      <th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">@</th>
    </tr>
  </thead>
</table>
</div>
    
</div> <!-- Fim do Container -->
  
<!-- S C R I P T   M O D A L-->
<script>
    function somar() { ftotal.value = parseFloat(fhonorarios.value) + parseFloat(femolumentos.value);  }  

    $(function() {$('#modalTable').on('shown.bs.modal', function () {$table.bootstrapTable('resetView')}) })
</script>
</div>  


<!-- ------------------------------ F I M   D O   C O N T E U D O ----------------------------------------->

      


<!-- ----------------------S C R I P T-------------------------------- -->

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
      '</a>',
      '<a class="remove" href="javascript:void(0)" title="Remover">',
      '<img src="<?= base_url("assets/icon/trash.svg")?>" height="17" width="17" style="margin-right" >',
      '</a>'
    ].join('')
  }

  window.operateEvents = {
    'click .edit': function (e, value, row, index) 
      { window.location.href = "<?= base_url('servicose/');?>"+row.id },
    'click .remove': function (e, value, row, index) 
      { window.location.href = "<?= base_url('servicosd/');?>"+row.id }  
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

<script>
  function mostrar_modal2(){
    let el = document.getElementById('modal02');
    let minhaModa2 = new bootstrap.Modal(el);
    minhaModa2.show();
}
</script>

<script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
<script> var xurls = "<?= base_url('/global'); ?>/"; </script> 
<script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script>

<script src="<?= base_url("assets/js/modal.js") ?>" ></script>

 
<?= $this->endSection('conteudo'); ?>