<body style="background-color: #F5F5F9;">
 
<div>
<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <div>
          <h1></h1>
        </div>
        <div><h3>T R A M I T A N D O</h3></div>
        <div><button class="btn btn-sm" onclick="window.location.href='<?php echo site_url('/financeiroc') ?>';">
               <img src="<?= base_url("assets/icon/add24.png") ?>" height="20" width="20">
             </button>
        </div>   
	  </div>
    
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
  <div class="mt-1">
     <table class="table table-hover table-sm" id="users-list">
       <thead>
          <tr>
             <th>IDC</th>
             <th>Serviços</th>
             <th>Local</th>
             <th>Início</th>
             <th>noProcesso</th>
             <th>código</th>
          </tr>
       </thead>
       <tbody>
          <?php if($recibo): ?>
          <?php foreach($recibo as $user): ?>
          <tr>
             <td class="col-sm-1"><?php echo $user['idc']; ?></td>
             <td class="col-sm-2"><?php echo $user['servicos']; ?></td>
             <td class="col-sm-1"><?php echo $user['locals']; ?></td>
             <td class="col-sm-1"><?php echo $user['inicio']; ?></td>
             <td class="col-sm-1"><?php echo $user['nprocesso']; ?></td>
             <td class="col-sm-1"><?php echo $user['codigo']; ?></td>
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
    $(document).ready( function () { $('#users-list').DataTable(); });
</script>

<?= $this->endSection('conteudo'); ?>

<!-- Id Dataf Banco Tipo Historico Numero Valor IDC -->
             