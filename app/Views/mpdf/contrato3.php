<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de mPDF</title>
</head>
<body>
    <h1>Dados Dinâmicos</h1>
    <p>Nome: nome</p>
    <p>Email: email </p>
    <!-- Outros dados dinâmicos aqui -->
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
          <?php //if($clientes): ?>
          <?php foreach($clientes as $cliente): ?>
          <tr>
             <td><?php echo $cliente['idc']; ?></td>
             <td><?php echo $cliente['nome']; ?></td>
             <td><?php echo $cliente['email']; ?></td>
             <td>
              <a href="<?php echo base_url('clientesa/'.$cliente['idc']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/add24.png")?>" height="17" width="17" alt=""></a> 
              <a href="<?php echo base_url('clientese/'.$cliente['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/edit24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?php echo base_url('clientesd/'.$cliente['id']);?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/del24.png")?>" height="17" width="17" alt=""></a>
              <a href="<?= '///R:/'.$cliente['idc'] ;?>" class="btn btn-sm"><img src="<?= base_url("assets/icon/file.png")?>" height="17" width="17" alt=""></a>
             </td>
          </tr>
         <?php endforeach; ?>
         <?php //endif; ?>
       </tbody>
     </table>
  </div>
</body>
</html>
