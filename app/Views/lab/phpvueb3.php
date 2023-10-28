<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ALC Advocacia</title>
<link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<center><h1>objeto PHP & VUE</h1></center>

<div class="container m-8">

<body id="app">

<div class="container">
  <div class="row">
    <div class="col shadow rounded m-2" id="myshadow">
      <div style="margin:7px"> <span class="titulo"> data: </span> {{ ci.dataf }} </div> 
      <div style="margin:7px"> <span class="titulo"> nº recibo: </span> {{ ci.id }} </div> 
      <div style="margin:7px"> <span class="titulo"> idc: </span> {{ ci.idc }} </div>
    </div>
    <div class="col-6 shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">advogada:</span> {{ ci.prestador }} </div>
      <div style="margin:7px"> <span class="titulo">cliente:</span> {{ ci.nome }} </div>
      <div style="margin:7px"> <span class="titulo">tipo pagto:</span> {{ ci.tipo_pgto }} </div>
    </div>
    <div class="col shadow rounded m-2">
      <div style="margin:7px"> <span class="titulo">total de honorários:</span> {{ Number(ci.tothonorarios) }} </div>
      <div style="margin:7px"> <span class="titulo">total de custas:</span> {{ Number(ci.totcustas) }} </div>
      <div style="margin:7px"> <span class="titulo">total:</span> {{ Number(ci.tothonorarios) + Number(ci.totcustas) }} </div> 
    </div>
  </div>
  <div id="button-1" class="d-flex justify-content-end mt-2">
    <button type="button" class="btn btn-outline-info mr-2">Edit</button>
    <button type="button" class="btn btn-outline-danger">Delete</button>
  </div>
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
              <tr v-for="item in sub">
                <td>{{ item.nome }}</td>
                <td>{{ item.servicos }}</td>
                <td>{{ item.locals }}</td>
                <td>{{ item.honorarios }}</td>
                <td>{{ item.custas }}</td>
                <td>{{ item.total }}</td>
                <td>{{ item.inicio }}</td>
                <td>{{ item.nprocesso }}</td>
                <td>{{ item.codigo }}</td>
                <td>{{ item.termino }}</td>
                <td>{{ item.ok }} </td>
                <td>
                    <a href="<?php echo base_url('clientesa/'.{{ item.nome }});?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/add24.png")?>" height="17" width="17" alt=""></a> 
                    <a href="<?php echo base_url('edit-view/'.$cliente['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('delete/'.$cliente['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?= '///R:/'.$cliente['idc'] ;?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/file.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
          </table>
       </div> 

    </div>
  </div>

</div>  
  
</body>

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
