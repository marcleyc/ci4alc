<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">


<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div>
          <h1></h1>
        </div>
        <div><h3>T R A M I T A N D O</h3></div>
        <div><button class="btn btn-sm" onclick="window.location.href='<?php echo site_url('/contatosc') ?>';">
               <img src="<?= base_url("assets/icon/add24.png") ?>" height="20" width="20">
             </button>
        </div>   
	  </div>    
</div>
</center> 

<div class="container mt-1">

<table id="example" class="table table-hover table-sm" style="width:100%">
        <thead>   
            <tr>
                <th>id</th>
                <th>locals</th>
                <th>serviços</th>
                <th>nome</th>
                <th>início</th>
                <th>código</th>
                <th>ok</th>
            </tr>
        </thead>
       
    </table>

</div>   

<!-- id,idc, dataf, prestador, nome, fatura, tipo_pgto, obs, tothonorarios, totcustas, total, parceria -->    
<script>
  var myArray = <?php echo json_encode($recibosub) ?>;
  console.log('array',myArray);

   $('#example').DataTable( {
    data: <?php echo json_encode($recibosub) ?>,
    columns: [
        { data: 'id' }, 
        { data: 'locals' },
        { data: 'servicos' },
        { data: 'nome' },
        { data: 'inicio' },
        { data: 'codigo' },
        { data: 'ok' },
    ],
    order: [[1, 'asc',2,'asc',4, 'desc']],

    autoWidth: true,
    columnDefs: [
        {
            targets: ['_all'],
            className: 'mdc-data-table__cell',
        },
    ],
} );
</script>

<?= $this->endSection('conteudo'); ?>

