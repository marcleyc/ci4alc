<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

</head>
<body style="background-color: #F5F5F9;">
 
<div>
<center>    
<div class="container shadow-sm m-1 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div>
          <h1></h1>
        </div>
        <div><h3>R E C I B O S</h3></div>
        <div><button class="btn btn-sm" onclick="window.location.href='<?php echo site_url('reciboadd') ?>';">
               <img src="<?= base_url("assets/icon/add24.png") ?>" height="20" width="20">
             </button>
        </div>   
	  </div>
    
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
  <div class="mt-1">
     <table class="table table-hover table-sm" id="users-list">
       <thead>
 <!-- id,idc, dataf, prestador, nome, fatura, tipo_pgto, obs, tothonorarios, totcustas, total, parceria -->       
          <tr>                
             <th>Id</th> 
             <th>Idc</th>
             <th>Nome</th>
             <th>Tipo_pgto</th>
             <th>Total</th>
             <th></th>
          </tr>
       </thead>
       <tbody>
          <?php if($recibos): ?>
          <?php foreach($recibos as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['idc']; ?></td>
             <td><?php echo $user['nome']; ?></td>
             <td><?php echo $user['tipo_pgto']; ?></td>
             <td><?php echo $user['total']; ?></td>
             <td>
              <a href="<?php echo base_url('recibo/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?php echo base_url('contatosd/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
</center> 
</div>

<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>

<?= $this->endSection('conteudo'); ?>