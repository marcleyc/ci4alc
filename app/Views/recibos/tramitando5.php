<div>
<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="mt-2">
        <div class="text-center"><h3>T R A M I T A N D O</h3></div>  
	  </div>
    
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
  <div class="mt-1">
     <table class="table table-sm" id="users-list">
       <thead>
          <tr>  
                <th>lugar</th>
                <th>serviço</th>
                <th>nome</th>
                <th>início</th>
                <th>senha</th>
                <th>sit</th>
          </tr>
       </thead>
       <tbody>
          <?php if($recibosub): ?>
          <?php foreach($recibosub as $user): ?>
          <tr>
             <td class="col-sm-1"><?php echo $user['locals']; ?></td>
             <td class="col-sm-1"><?php echo $user['servicos']; ?></td>
             <td class="col-sm-1"><?php echo $user['nome']; ?></td>
             <td class="col-sm-3"><?php echo $user['inicio']; ?></td>
             <td class="col-sm-1"><?php echo $user['codigo']; ?></td>
             <td class="col-sm-1"><?php echo $user['sit']; ?></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
</center> 
</div>

<style> 
body {background-color: white; color: blue;}

h1 {text-align:center;}

th, td {border: 1px solid grey; border-radius: 10px; padding: 3px;}

.flex-container {
  display: flex;
  align-items: stretch;
  background-color: #242424;
}

.flex-container > div {
  border-radius: 10px;
  background-color: #37444d;
  color: white;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>   