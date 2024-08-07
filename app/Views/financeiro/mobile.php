<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- js --> 
    <script src="#"></script>    
    <!-- css --> 
    <title>Mobile</title>
</head>

<style>
.container {
  display: grid;
  grid-template-columns: repeat(5, 1fr); 
  grid-auto-rows: minmax(50px, auto);
  grid-gap: 20px;
  padding: 15px;
}
.item {
  background-color: #f0f0f0;
  padding: 20px;
  text-align: center; font-size:17px;
  border: 1px solid #ADD8E6; border-radius: 7px;
}
.item:hover {
  background-color: yellow;
}
@media (max-width: 800px) {
  .container{ display: grid;
  grid-template-columns: repeat(3, 1fr); 
  grid-auto-rows: minmax(20px, auto);
  grid-gap: 5px;
  padding: 10px;}
  .item {
  background-color: #f0f0f0;
  padding: 20px;
  text-align: center; font-size:17px;
  border: 1px solid #ADD8E6; border-radius: 7px;
}
}
</style>

<body> 

<div class="container">
<?php foreach($dados as $x): ?>  
  <div class="item" id="tipo" onclick="npag('<?= $x['tipo']; ?>')">
      <h4 id="tip"><?= $x['tipo']; ?></h4>
      <p><?= $x['total']; ?></p>
  </div>
  <?php endforeach; ?>  
</div>

<script>
   let valor = 1234.56;
   // Usando toLocaleString
   let euro = valor.toLocaleString('pt', { style: 'currency', currency: 'EUR' });
   console.log("Valor formatado com toLocaleString:", euro);

   const val = document.getElementById("tip").innerHTML;
   console.log(val);
   
  function allert(x) {alert(`The button was clicked! ${x}`)};
  function npag(x) {location.href = `mobileadd?id=${x}`};

</script>

</body>
</html>