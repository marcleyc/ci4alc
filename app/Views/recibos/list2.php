<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.material.min.js"></script>

<script src="https://cdn.datatables.net/plug-ins/1.13.5/api/sum().js"></script>

<!-- link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.material.min.css">

<div>
<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div>
          <h1></h1>
        </div>
        <div><h3>R E C I B O S</h3></div>
        <div><button class="btn btn-sm" onclick="window.location.href='<?php echo site_url('/contatosc') ?>';">
               <img src="<?= base_url("assets/icon/add24.png") ?>" height="20" width="20">
             </button>
        </div>   
	  </div>    
</div>
</center> 

<center>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>data</th>
                <th>honorarios</th>
                <th>total</th>
                
            </tr>
        </thead>
       
    </table>
</center>    

<!-- id,idc, dataf, prestador, nome, fatura, tipo_pgto, obs, tothonorarios, totcustas, total, parceria -->    
<script>
  var myArray = <?php echo json_encode($recibos) ?>;
  console.log('array',myArray);
  //var myObject = {...myArray};
  //console.log('object',myObject);
  //console.log('object',myObject[1].nome);

  //var my = JSON.parse('< ?php echo json_encode($recibos[10]) ?>');
  //console.log('my',my);

 var table = $('#example').DataTable( {
    data: <?php echo json_encode($recibos) ?>,
    columns: [
        { data: 'id' },
        { data: 'nome' },
        { data: 'dataf' },
        { data: 'tothonorarios' },
        { data: 'total' },
    ],
    order: [[2, 'desc']],

    autoWidth: true,
    columnDefs: [
        {
            targets: ['_all'],
            className: 'mdc-data-table__cell',
        },
    ],
} );

var total = table.column( 3 ).data().sum();
console.log(total);
</script>

