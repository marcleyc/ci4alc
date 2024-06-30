<!-- -------------------M O D A L  E D I T------------------------------------------------------------ -->

<div id="modalTable2" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">E D I T A R</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <!-- C O N T E U D O -->
    <form class="row row-cols-lg-auto g-3 align-items-center mt-3 needs-validation m-2" novalidate method="post" id="medit" name="medit" action="<?= site_url('servicoss') ?>">  
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

  <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>  

  <!-- S C R I P T   M O D A L-->
<script>
    function somar() { ftotal.value = parseFloat(fhonorarios.value) + parseFloat(femolumentos.value);  }  

    $(function() {$('#modalTable').on('shown.bs.modal', function () {$table.bootstrapTable('resetView')}) })
</script>
</div>  