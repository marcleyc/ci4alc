<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

<!-- Script to print the content of a div -->
<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }       
</script>

<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div>
          <h1></h1>
        </div>
        <div><h3>clientes</h3></div>
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
                <th>nome</th>
                <th>data</th>
                <th>honorarios</th>
                <th>total</th>
                <th>action</th>
            </tr>
        </thead>
       
    </table>

</div>   

<!-- id,idc, dataf, prestador, nome, fatura, tipo_pgto, obs, tothonorarios, totcustas, total, parceria -->    
<script>
  var myArray = <?php echo json_encode($cliente) ?>;
  console.log('array',myArray);
  
   $('#example').DataTable( {
    data: <?php echo json_encode($cliente) ?>,
    columns: [
        { data: 'idc' },
        { data: 'nome' },
        { data: 'email' },
        { data: 'estcivil' },
        { fnRender: function (data, type, row) {return "<a href='/editar/" + row.Id + "' class='btn btn-primary'>Editar</a>"},},
    ],
    order: [[0, 'desc']],

    autoWidth: true,
    columnDefs: [
        {
            targets: ['_all'],
            className: 'mdc-data-table__cell',
        },
    ],
    buttons: [
            {
                text: 'My button',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                    return user.like.objects.all();
                }
            }
        ]
} );
</script>

</center> 
        <p>
            The table is inside the div and will get
            printed on the click of button.
        </p>
          
        <input type="button" value="click"
                    onclick="printDiv()"> 
</center> 

<?= $this->endSection('conteudo'); ?>

