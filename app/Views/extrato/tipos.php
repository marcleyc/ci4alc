
<div>
<?php //$qtd = count($recibosub); ?>

<center>    
<div class="container bg-white shadow-sm m-1 border border-light rounded">
    <div class="mt-2">
        <div style="font-size:22; color:gray; padding:4px"> TIPOS </div>  
	  </div> <br>

      <?php //print_r($dados); ?>
    
    <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
  <div class="mt-1">
     <table class="table table-sm" id="users-list">
       <thead>
          <tr>  
                <th>Tipo</th>
                <th>Descrição</th>
          </tr>
       </thead>
       <tbody>
          <?php if($dados): ?>
          <?php foreach($dados as $user): ?>
          <tr>
             <td class="col-sm-1"><?php echo $user->ttipo; ?></td>
             <td class="col-sm-1"><?php echo $user->tdescricao; ?></td>
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

th, td { border: 1px solid grey; border-radius: 10px; padding: 5px; text-align: center; font-size: 16}

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