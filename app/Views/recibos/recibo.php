<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<style>
  .rowrec{display:flex; flex-wrap: nowrap; justify-content: space-around;}
  .collrec{background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;}
  .mybuttons{background-color:white;}
  .table-table-sm tr td{background-color:white;}
  #btt{border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 80px;margin:5px;}
  #orderform{background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;}   
</style>

<center><h3 style="color:#878787">R E C I B O</h3></center>

<div class="container m-8">

<body id="app">

<div class="container">
<?php foreach($recibo as $r): ?>  
  <div class="rowrec" style="display:flex; flex-wrap: nowrap; justify-content: space-around;">
    <div class="collrec" style="flex-grow: 3; background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;">
      <div style="margin:7px"> <span class="titulo"> data: </span> <?=$r['dataf'];?></div> 
      <div style="margin:7px"> <span class="titulo"> nº recibo: </span> <?=$r['id'];?> </div> 
      <div style="margin:7px"> <span class="titulo"> idc: </span> <?=$r['idc'];?> </div>
    </div>
    <div class="collrec" style="flex-grow: 5; background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;">
      <div style="margin:7px"> <span class="titulo">advogada:</span> <?=$r['prestador'];?> </div>
      <div style="margin:7px"> <span class="titulo">cliente:</span> <?=$r['nome'];?> </div>
      <div style="margin:7px"> <span class="titulo">tipo pagto:</span> <?=$r['tipo_pgto'];?> </div>
    </div>
    <div class="collrec" style="flex-grow: 3; background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;">
      <div style="margin:7px" > <span class="titulo">total de honorários:</span> <?=$r['tothonorarios'];?> </div>
      <div style="margin:7px"> <span class="titulo">total de custas:</span> <?=$r['totcustas'];?> </div>
      <div style="margin:7px"> <span class="titulo">total:</span> <?=$r['tothonorarios']+$r['totcustas'];?> </div> 
    </div>
  </div>
  <div class="buttons" id="button-rec" style="align-content:center; display: flex; align-items: center; margin-top:3px; float:right;">
    <button class="mybutton" onclick="window.location.href='<?php echo site_url('reciboe/'.$r['id']) ?>';" style="border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 80px;margin:5px;">Editar</button>
    <button class="mybutton" type="button"  onclick="confirmaExclusao(<?=$r['id'];?> )" style="border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 80px;margin:5px;">Delete</button>
  </div>
<?php endforeach; ?>
</div>  

<br>  
  <!-- -----------------------------------Recibosub ----------------------->
  <div id="orderform" class="container" style="margin-top:25px">
    <orderform :orderd="formdata"></orderform>
    <div id="app" style="background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;">   
      <i class="bi bi-three-dots-vertical"></i>
       
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
                <td style="background-color:white;"><?=($rec['nome']);?></td>
                <td style="background-color:white;"><?=($rec['servicos']);?></td>
                <td style="background-color:white;"><?=($rec['locals']);?></td>
                <td style="background-color:white;"><?=($rec['honorarios']);?></td>
                <td style="background-color:white;"><?=($rec['custas']);?></td>
                <td style="background-color:white;"><?=($rec['total']);?></td>
                <td style="background-color:white;"><?=($rec['ok']);?></td>
                <td style="background-color:white;"> 
                    <a href="<?php echo base_url('recibosube/'.$rec['id']) ?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('recibosubdel/'.$rec['id'].'/'.$rec['idRec']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div>
       <?php foreach($recibo as $r): ?>  
       <div id="button-1" class="buttons">
          <button class="mybutton" onclick="window.location.href='<?php echo site_url('recibosub/'.$r['idc'].'/'.$r['id']) ?>';" style="border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 80px;margin:5px;">+ Serviço</button>
       </div>
       <?php endforeach; ?>
    </div>
  </div>

  <br>  
  <!-- -----------------------------------Recibopgt ----------------------->
  <div id="orderform" class="container">
    <orderform :orderd="formdata"></orderform>
    <div id="app" style="background-color:white; border-radius:20px; box-shadow: 0 4px 4px grey; padding:8px; margin:5px;">   
      <i class="bi bi-three-dots-vertical"></i>
    
       <div class="shadow rounded">
          <table class="table-table-sm">
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
              <tr style="background-color:white;">
                <td style="background-color:white;"><?=($rec['venct']);?></td>
                <td style="background-color:white;"><?=($rec['valor']);?></td>
                <td style="background-color:white;"><?=($rec['iva']);?></td>
                <td style="background-color:white;"><?=($rec['total']);?></td>
                <td style="background-color:white;"><?=($rec['tipo']);?></td>
                <td style="background-color:white;"><?=($rec['repete']);?></td>
                <td style="background-color:white;"><?=($rec['pgtoIVA']);?></td>
                <td style="background-color:white;"> 
                    <a href="<?php echo base_url('recibopgte/'.$rec['id']) ?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
                    <a href="<?php echo base_url('recibopgtdel/'.$rec['id'].'/'.$rec['idRec']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
                </td>
              </tr>
              <?php endforeach; ?>
          </table>
       </div>
       <?php foreach($recibo as $r): ?>  
       <div id="button-1" class="d-flex justify-content-end mt-2">
          <button class="mybutton" onclick="window.location.href='<?php echo site_url('parcelar/'.$r['idc'].'/'.$r['id']) ?>';" style="border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 160px;margin:5px; transition: background-color 0.3s ease;">Parcela automática</button>
          <button class="mybutton" onclick="window.location.href='<?php echo site_url('recibopgta/'.$r['id']) ?>';" style="border-radius: 5px; border: 1px solid #333; background-color: Teal; color: #fff;height: 30px;width: 80px;margin:5px;">+ Parcelas</button>
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

<script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
<script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script>

<?= $this->endSection('conteudo'); ?>
