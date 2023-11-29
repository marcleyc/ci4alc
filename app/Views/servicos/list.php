<?= $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>
 
<div class=container> <center> <h3 style="color:#878787">S E R V I Ç O S</h3> </center>
 
<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container">

<div id="toolbar" class="px-2">
  <button id="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalTable"> Novo </button>
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

<!-- -------------------M O D A L  A D D-------------------------------- -->

<div id="modalTable" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">A D I C I O N A R</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <!-- C O N T E U D O -->
    <form class="row row-cols-lg-auto g-3 align-items-center mt-3 needs-validation m-2" novalidate method="post" id="add" name="add_create" action="<?= site_url('servicoss') ?>">  
    <div class="col-12">
	  	  
		<div class="input-group input-group">
	       <div class="input-group-text">Descrição</div> <input type="text" class="form-control" name="fdescricao" required />
		</div>
		 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Honorários</div> <input type="number" class="form-control" name="fhonorarios" id="fhonorarios" onchange="somar()" required />
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Emolumentos</div> <input type="number" class="form-control" name="femolumentos" id="femolumentos" onchange="somar()" required />
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Total</div> <input type="number" class="form-control" name="ftotal" id="ftotal" required />
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Local</label>
			<select class="form-select" name="fobs">
			  <option selected>selecione</option>
			  <option value="IRN Coimbra">IRN Coimbra</option>
			  <option value="IRN Lisboa">IRN Lisboa</option>
			</select>
		</div>

    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
  </form>
  <!-- F I M   D O   C O N T E U D O -->

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
  <!-- S C R I P T   M O D A L-->
<script>
    function somar() { ftotal.value = parseFloat(fhonorarios.value) + parseFloat(femolumentos.value);  }  

    $(function() {$('#modalTable').on('shown.bs.modal', function () {$table.bootstrapTable('resetView')}) })
</script>
</div>  

<!-- -------------------M O D A L  A D D  E N D-------------------------------- -->  

<!-- -------------------M O D A L  E D I T------------------------------------------------------------ -->

<div id="modalTable2" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">E D I T A R</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <!-- C O N T E U D O -->
    <form class="row row-cols-lg-auto g-3 align-items-center mt-3 needs-validation m-2" novalidate method="post" id="edit" name="add_create" action="<?= site_url('servicoss') ?>">  
    <div class="col-12">
	  	  
		<div class="input-group input-group">
	       <div class="input-group-text">Descrição</div> <input type="text" class="form-control" name="fdescricaoe" required />
		</div>
		 
		<div class="input-group input-group mt-2">
		   <div class="input-group-text">Honorários</div> <input type="number" class="form-control" name="fhonorariose" id="fhonorariose" onchange="somar()" required />
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Emolumentos</div> <input type="number" class="form-control" name="femolumentose" id="femolumentose" onchange="somar()" required />
		</div>

    <div class="input-group input-group mt-2">
		   <div class="input-group-text">Total</div> <input type="number" class="form-control" name="ftotale" id="ftotale" required />
		</div>

		<div class="input-group input-group mt-2">
			<label class="input-group-text" for="inputGroupSelect01">Local</label>
			<select class="form-select" name="fobs">
			  <option selected>selecione</option>
			  <option value="IRN Coimbra">IRN Coimbra</option>
			  <option value="IRN Lisboa">IRN Lisboa</option>
			</select>
		</div>

  </form>
  <!-- F I M   D O   C O N T E U D O -->

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>  
  <!-- -------------------M O D A L  E D I T  E N D-------------------------------- -->


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

 
<?= $this->endSection('conteudo'); ?>