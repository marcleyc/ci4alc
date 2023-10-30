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
                <th>processos</th>
          </tr>
       </thead>
       <tbody>
          <?php if($recibosub): ?>
          <?php foreach($recibosub as $user): ?>
          <tr>
             <td class="col-sm-1">
             <div><?php echo $user['locals']; ?>
               <span>- s e r v i ç o:</span> <?php echo $user['servicos']; ?>
               <span>- n o m e:</span> <?php echo $user['nome']; ?></div>
               <span>- i n i c i o:</span> <?php echo $user['inicio']; ?>
               <span>- nº p r o c e s s o:</span> <?php echo $user['nprocesso']; ?>
               <span>- s e n h a:</span><?php echo $user['codigo']; ?>
               <span>- s i t:</span><?php echo $user['sit']; ?>
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

<style> 
body {background-color: white; color: blue;}

h1 {text-align:center;}

th, td {border: 1px solid grey; border-radius: 10px; padding: 3px;}

span {color: black;}

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