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
  <div v-for="dado in dados" :key="dado.id">
    <ul>
    <li class="item" id="app" onclick="allert()">
      <h4 id='tip'>{{ dado.tipo }}</h4>;
      <p>{{ dado.total }}</p>
    </li> 
    </ul>
  </div>
</div>


<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<script>
   let valor = 1234.56;
   // Usando toLocaleString
   let euro = valor.toLocaleString('pt', { style: 'currency', currency: 'EUR' });
   console.log("Valor formatado com toLocaleString:", euro);

   const val = document.getElementById("tip").innerHTML;
   console.log(val);
   //const button = document.getElementById("tipo");
   //button.addEventListener("click", function() { alert(`The button was clicked! ${val}`); });

  function allert() {alert(`The button was clicked! ${val}`)};
</script>

<!-- script> var ddd =  < //json_encode($dados); ?> </script --> 
<script>
    var itens = JSON.parse('<?php echo json_encode($dados) ?>'); 
    console.log(itens);
    const { createApp } = Vue
    createApp({
        data() 
        {
            return { dados: itens,}
        },
        methods: 
        {
           increment() { this.count2++ },
           allert() { console.log('dados',this.dados) },
           filtra() { this.dados = itens.filter((x)=>x.cor=="primary"); },
        },
        computed:
        {
           //O COMPUTED é executado quando o vue e carregado com a página 
        },
    }).mount('#app')
</script>

</body>
</html>