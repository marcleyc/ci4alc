<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" ></script>

<script>
   //const dados = <?php //echo json_encode($clientes) ?>;
   //console.log(dados.data);
   // https://datatables.net/examples/server_side/simple.html
   // $(document).ready( function () {$('#users-list').DataTable();});
    new DataTable('#users-list', {
    ajax: dados,
    processing: true,
    serverSide: true
});
</script>

<div>
<center>    
<div class="container bg-white shadow-sm m-3 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div><h4></h4></div>
        <div><h3>C L I E N T E S</h3></div>
        <div></div>   
	  </div>
    
  
  <div class="mt-1">
     <table class="table table-hover table-sm" id="users-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
             
          </tr>
       </thead>
      
     </table>
  </div>
</div>
</center> 
</div>

<?= $this->endSection('conteudo'); ?>