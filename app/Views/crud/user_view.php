<!doctype html>
<html lang="pt">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contatos</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/b-2.3.6/cr-1.6.2/fc-4.2.2/fh-3.3.2/r-2.4.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/b-2.3.6/cr-1.6.2/fc-4.2.2/fh-3.3.2/r-2.4.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js"></script>
    
</head>
<body>
<div style="background-color: F5F5F9;">
<center>    
<div class="container bg-white shadow-sm m-3 border border-light rounded">
    <div class="d-flex justify-content-between mt-2">
        <h4></h4>
        <div><h3>C O N T A T O S</h3></div>
        <div><!-- a href="<?php echo site_url('/user-form') ?>" class="btn btn-success">Add User</a --></div>
        <div><button class="btn btn-success btn-sm" onclick="window.location.href='<?php echo site_url('/user-form') ?>';">Add</button></div>
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
              <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm"><img src="assets/icon/edit24.png" height="20" width="20"></a>
              <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm">Delete</a>
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
      $('#users-list').DataTable(
        
      );
    });
</script>
</body>
</html>