<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

</head>
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
             <th>Id</th>
             <th>Dataf</th>
             <th>Banco</th>
             <th>Tipo</th>
             <th>Historico</th>
             <th>Numero</th>
             <th>Valor</th>
             <th>IDC</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($financeiro): ?>
          <?php foreach($financeiro as $user): ?>
          <tr>
             <td class="col-sm-1"><?php echo $user['id']; ?></td>
             <td class="col-sm-1"><?php echo $user['dataf']; ?></td>
             <td class="col-sm-1"><?php echo $user['banco']; ?></td>
             <td class="col-sm-1"><?php echo $user['tipo']; ?></td>
             <td class="col-sm-3"><?php echo $user['historico']; ?></td>
             <td class="col-sm-1"><?php echo $user['numero']; ?></td>
             <td><?php echo $user['valor']; ?></td>
             <td><?php echo $user['cliente']; ?></td>
             <td>
              <a href="<?php echo base_url('financeiroe/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?php echo base_url('financeirod/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
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

<!-- Id Dataf Banco Tipo Historico Numero Valor IDC -->
             