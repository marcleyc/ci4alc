<!-- -------------------M O D A L  A D D---------------------------------------------------------------- -->

<div id="myModal" class="modal" tabindex="-1" role="dialog">
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

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    </div>
    <!-- F I M   D O   C O N T E U D O -->  
</div></div>
  

  <!-- S C R I P T   M O D A L-->
<script>
    function somar() { ftotal.value = parseFloat(fhonorarios.value) + parseFloat(femolumentos.value);  }  

    $(function() {$('#modalTable').on('shown.bs.modal', function () {$table.bootstrapTable('resetView')}) })
</script>
</div>  