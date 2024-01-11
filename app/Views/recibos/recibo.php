<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<center><h3 style="color:#878787">R E C I B O</h3></center>

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
      <div style="margin:7px" > <span class="titulo">total de honorários:</span> <?=$r['tothonorarios'];?> </div>
      <div style="margin:7px"> <span class="titulo">total de custas:</span> <?=$r['totcustas'];?> </div>
      <div style="margin:7px"> <span class="titulo">total:</span> <?=$r['tothonorarios']+$r['totcustas'];?> </div> 
    </div>
  </div>
  <div id="button-1" class="d-flex justify-content-end mt-2">
    <button class="btn btn-outline-info mr-2" onclick="window.location.href='<?php echo site_url('reciboe/'.$r['id']) ?>';">Editar</button>
    <button type="button" class="btn btn-outline-danger" onclick="confirmaExclusao(<?=$r['id'];?> )" >Delete</button>
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
              <tr class="table-secondary">
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
                    <a href="<?php echo base_url('recibosube/'.$rec['id']) ?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('recibosubdel/'.$rec['id'].'/'.$rec['idRec']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div>
       <?php foreach($recibo as $r): ?>  
       <div id="button-1" class="d-flex justify-content-end mt-2">
          <button class="btn btn-outline-info mr-2" onclick="window.location.href='<?php echo site_url('recibosub/'.$r['idc'].'/'.$r['id']) ?>';">+ Serviço</button>
       </div>
       <?php endforeach; ?>
    </div>
  </div>

  <br>  
  <!-- -----------------------------------Recibopgt ----------------------->
  <div id="orderform" class="container">
    <orderform :orderd="formdata"></orderform>
    <div id="app">   <i class="bi bi-three-dots-vertical"></i>
    
       <div class="shadow rounded">
          <table class="table table-sm">
              <tr class="table-secondary">
                <th>venct</th>
                <th>valor</th>
                <th>iva</th>
                <th>total</th>
                <th>tipo</th>
                <th>repete</th>
                <th>pagou</th>
                <th>action</th>
              </tr>
              <?php foreach($recibopgt as $rec): ?>
              <tr>
                <td><?=($rec['venct']);?></td>
                <td><?=($rec['valor']);?></td>
                <td><?=($rec['iva']);?></td>
                <td><?=($rec['total']);?></td>
                <td><?=($rec['tipo']);?></td>
                <td><?=($rec['repete']);?></td>
                <td><?=($rec['pgtoIVA']);?></td>
                <td> 
                    <a href="<?php echo base_url('recibopgte/'.$rec['id']) ?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('recibopgtdel/'.$rec['id'].'/'.$rec['idRec']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div>
       <?php foreach($recibo as $r): ?>  
       <div id="button-1" class="d-flex justify-content-end mt-2">
          <button class="btn btn-outline-info mr-2" onclick="window.location.href='<?php echo site_url('parcelar/'.$r['idc'].'/'.$r['id']) ?>';">Parcelar</button>
          <button class="btn btn-outline-info mr-2" onclick="window.location.href='<?php echo site_url('recibopgta/'.$r['id']) ?>';">+ Parcelas</button>
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

  function confirmaExclusao(id){
        var resultado = confirm("Deseja excluir este recibo?");
        if (resultado == true) 
        {
          //window.location.href=`d/${id}`;
          var link = "<?php echo site_url('recibod/') ?>";
          console.log(link);
          window.location.href= `${link}${id}`;
          //window.location.href = link/id;
          alert("O item " + itemSelecionado + " será excluído da lista!");    
        }
        else
        { alert("Você desistiu de excluir o item!"); }
  }

  function editarj(x){
    var id = x;
    console.log(id);
    window.location.href='<?php echo base_url('reciboe/')."300" ?>';
  }
</script>

<style> 
    .titulo {font-weight: bold;}
    #myshadow {box-shadow: 3px 2px 2px #CEF4FC;}
    #button1 {position:absolute;}
</style>

<?= $this->endSection('conteudo'); ?>
