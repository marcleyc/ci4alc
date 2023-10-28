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
        <div><h3>C O N T A T O S</h3></div>
        <div><button class="btn btn-sm" onclick="window.location.href='<?php echo site_url('/contatosc') ?>';">
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
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($contatos): ?>
          <?php foreach($contatos as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['nome']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td>
             <a href="<?php echo base_url('contatosf/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/family2.png")?>" height="20" width="20" alt=""></a>
              <a href="<?php echo base_url('contatose/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?php echo base_url('contatosd/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?php echo base_url('clientesa/'.$user['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/groupadd.png")?>" height="20" width="20" alt=""></a>
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