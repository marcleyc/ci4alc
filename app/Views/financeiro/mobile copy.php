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
    *{margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; background-color: #696969;}
    /* .container{display: flex; color: aliceblue; flex-direction: row;} */
    .container{width: 800px; margin: 20px;}
    .itens{display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));grid-gap: 24px; margin-right:20px}
    .etiq{width: 150px; text-align:center; padding:5px ; margin:5px; border-radius: 7px; border: 1px solid #808080; background-color: #808080;}
    h4{background-color: #808080;} 
    h5{background-color: #808080;}
    p{background-color: #808080;} 
    @media (max-width: 800px) {
      .container{ flex-direction: column; margin-right:20px;}
      .etiq{width: 450px;}
      }
</style>

<body> 

<div class="container">
  <div class="itens">
    <?php foreach($dados as $x): ?>  
    <div class="etiq" id="tipo" onclick="allert()">
      <h4><?= $x['tipo']; ?></h4>
      <p><?= $x['total']; ?></p>
    </div>
    <?php endforeach; ?>  
  </div>
</div>

<script>
   let valor = 1234.56;
   // Usando toLocaleString
   let euro = valor.toLocaleString('pt', { style: 'currency', currency: 'EUR' });
   console.log("Valor formatado com toLocaleString:", euro);

   const button = document.getElementById("tipo");
   button.addEventListener("click", function() {
     alert("The button was clicked!");
  });

  function allert() {alert("The button was clicked!");}
</script>

</body>
</html>