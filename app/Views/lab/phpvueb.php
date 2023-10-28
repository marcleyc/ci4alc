<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ALC Advocacia</title>
<link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<center><h1>R E C I B O</h1></center>

<div class="container m-8">

<body id="app">

<div class="container">
<?php foreach($recibo as $r): ?>  
  <div class="row">
    <div class="col shadow rounded m-2" id="myshadow">
      <div style="margin:7px"> <span class="titulo"> data: </span> <?=$r['dataf'];?></div> 
      <div style="margin:7px"> <span class="titulo"> nº recibo: </span> <?=$r['id'];?> </div> 
      <div style="margin:7px"> <span class="titulo"> idc: </span> <?=$r['idc'];?> </div>
    </div>
    <div class="col-6 shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">advogada:</span> <?=$r['prestador'];?> </div>
      <div style="margin:7px"> <span class="titulo">cliente:</span> <?=$r['nome'];?> </div>
      <div style="margin:7px"> <span class="titulo">tipo pagto:</span> <?=$r['tipo_pgto'];?> </div>
    </div>
    <div class="col shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">total de honorários:</span> <?=$r['tothonorarios'];?> </div>
      <div style="margin:7px"> <span class="titulo">total de custas:</span> <?=$r['totcustas'];?> </div>
      <div style="margin:7px"> <span class="titulo">total:</span> <?=$r['tothonorarios']+$r['totcustas'];?> </div> 
    </div>
  </div>
  <div id="button-1" class="d-flex justify-content-end mt-2">
    <button type="button" class="btn btn-outline-info mr-2">Edit</button>
    <button type="button" class="btn btn-outline-danger">Delete</button>
  </div>
<?php endforeach; ?>
</div>  

<br>  
  <!-- -----------------------------------Recibosub ----------------------->
  <div id="orderform" class="container">
    <orderform :orderd="formdata"></orderform>
    <div id="app">   <i class="bi bi-three-dots-vertical"></i>
       
       <div class="shadow rounded">
          <table class="table table-sm">
              <tr class="table-info">
                <th>nome</th>
                <th>serviços</th>
                <th>local</th>
                <th>honorarios</th>
                <th>custas</th>
                <th>total</th>
                <th>inicio</th>
                <th>nºprocesso</th>
                <th>código</th>
                <th>término</th>
                <th>ok</th>
                <th>action</th>
              </tr>
              <?php foreach($recibosub as $rec): ?>
              <tr>
                <td><?=($rec['nome']);?></td>
                <td><?=($rec['servicos']);?></td>
                <td><?=($rec['locals']);?></td>
                <td><?=($rec['honorarios']);?></td>
                <td><?=($rec['custas']);?></td>
                <td><?=($rec['total']);?></td>
                <td><?=($rec['inicio']);?></td>
                <td><?=($rec['nprocesso']);?></td>
                <td><?=($rec['codigo']);?></td>
                <td><?=($rec['termino']);?></td>
                <td><?=($rec['ok']);?></td>
                <td>
                    <a href="<?php echo base_url('clientesa/'.$rec['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/add24.png")?>" height="17" width="17" alt=""></a> 
                    <a href="<?php echo base_url('edit-view/'.$rec['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('delete/'.$rec['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div> 

    </div>
  </div>

</div>  
  
</body>

<script>    
  var jrecibo = JSON.parse('<?php echo json_encode($recibo[0]) ?>');
  console.log(jrecibo);
  var jrecibosub = JSON.parse('<?php echo json_encode($recibosub) ?>');
  console.log(jrecibosub);
</script>

<script>
  const { createApp } = Vue

  createApp({
    data() {
      return {
        message: 'Hello Vue!',
        ci: JSON.parse('<?php echo json_encode($recibo[0]) ?>'),
        sub: <?php echo json_encode($recibosub) ?>,
      }
    }
  }).mount('#app')
</script>


<style> 
    .titulo {font-weight: bold;}
    #myshadow {box-shadow: 3px 2px 2px #CEF4FC;}
    #button1 {position:absolute;}
</style>
