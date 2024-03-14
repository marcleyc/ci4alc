<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">    
    </head>
    <body>  

    <?php 
      $data_atual = new \DateTime();
      $data_atual = $data_atual->format('Y-m-d'); 
      //echo $data_atual; 
    ?>

    <div class="book">
      <div class="page">
      <div class="mt-1">
      <h3 style="text-align:center">A Receber</h3>   
     <table class="table table-hover table-sm" id="users-list">
       <thead>
          <tr>
             <th>Vencto</th>
             <th>Nome</th>
             <th>Serviço</th>
             <th>Repete</th>
             <th>Valor</th>
          </tr>
       </thead>
       <tbody>
          <?php if($financeiro): ?>  
          <?php foreach($financeiro as $user): ?>
          <tr>
            <?php if($data_atual > $user['venct']): ?>
              <td class="col-sm-1 text-danger"><?php echo $user['venct']; ?></td>
            <?php else: ?>
              <td class="col-sm-1"><?php echo $user['venct']; ?></td>
            <?php endif; ?>   
              <td class="col-sm-3"><?php echo $user['nome']; ?></td>
              <td class="col-sm-3"><?php echo $user['serv']; ?></td>
              <td class="col-sm-1"><?php echo $user['repete']; ?></td>
              <td class="col-sm-1"><?php echo $user['total']; ?></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>    
      </div>    
    </div>
        <script src="" async defer></script>
    </body>

<style>
body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 10pt "Tahoma";
}
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
.page {
  width: 210mm;
  min-height: 297mm;
  padding: 2mm;
  margin: 2mm auto;
  border: 1px #D3D3D3 solid;
  border-radius: 2px;
  background: white;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
  padding: 1cm;
  border: 5px white solid;
  height: 257mm;
  outline: 2cm #FFEAEA solid;
}

@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
      width: 210mm;
      height: 297mm;        
  }
.page {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: always;
  }
}
</style>

<?= $this->endSection('conteudo'); ?>

</html>
