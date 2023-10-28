<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

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
    <button type="button" class="btn btn-outline-info" onclick="window.location.href="<?php echo base_url('reciboe/'.$r['id']) ?>">Edit</button>
    <button type="button" class="btn btn-outline-danger" onclick="confirmaExclusao()" >Delete</button>
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
                <td><?=($rec['ok']);?></td>
                <td> 
                    <a href="<?php echo base_url('recibosube/'.$rec['id'].'/'.$recibo[0]['idc']) ?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('recibosubdel/'.$rec['id'].'/'.$rec['idRec']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div>
       <?php foreach($recibo as $r): ?>  
       <div id="button-1" class="d-flex justify-content-end mt-2">
          <button class="btn btn-outline-info mr-2" onclick="window.location.href='<?php echo site_url('recibosub/'.$r['idc'].'/'.$r['id']) ?>';">Adicionar</button>
       </div>
       <?php endforeach; ?>
    </div>
  </div>
</div>  

</body>

<script>    
  var jrecibo = JSON.parse('<?php echo json_encode($recibo[0]) ?>');
  console.log(jrecibo);
  var jrecibosub = JSON.parse('<?php echo json_encode($recibosub) ?>');
  console.log(jrecibosub);

  function confirmaExclusao(){
        var resultado = confirm("Deseja excluir o item: ?");
        if (resultado == true) {
            href="google.com";
            alert("O item " + itemSelecionado + " será excluído da lista!");    
        }
        else
        { alert("Você desistiu de excluir o item " + itemSelecionado + " da lista!"); }
    }
</script>

<style> 
    .titulo {font-weight: bold;}
    #myshadow {box-shadow: 3px 2px 2px #CEF4FC;}
    #button1 {position:absolute;}
</style>

<?= $this->endSection('conteudo'); ?>
