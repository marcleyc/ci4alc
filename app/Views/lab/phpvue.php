<?php
  $number = ['one', 'two', 'three'];
  $one = 2023;
  $ages = array("Peter"=>35, "Ben"=>37, "Joe"=>43);  
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<h1>objeto PHP & VUE.</h1>

<body id="app">
<div class="flex-container">
  <!-- -----------------------------------1a linha & 1a coluna ------------->
  <div style="flex-grow:3; text-align:left;">
     <span style="margin:7px"> data: {{ ci.dataf }} </span> <br>
     <span style="margin:7px">  nº recibo: {{ ci.id }} </span> <br>
     <span style="margin:7px"> idc: {{ ci.idc }} </span>
  </div>
  <!-- -----------------------------------1a linha & 2a coluna ------------->
  <div style="flex-grow:6; text-align:left;">
      <span style="margin:7px"> advogada: {{ ci.prestador }} </span> <br>
      <span style="margin:7px"> cliente: {{ ci.nome }} </span> <br>
      <span style="margin:7px"> tipo pagto: {{ ci.tipo_pgto }} </span> <br>
  </div>
  <!-- -----------------------------------1a linha & 3a coluna ------------->
  <div style="flex-grow:3; text-align:left;">
      <span style="margin:7px"> total de honorários: {{ Number(ci.tothonorarios) }} </span> <br>
      <span style="margin:7px"> total de custas: {{ Number(ci.totcustas) }} </span> <br>
      <span style="margin:7px"> total: {{ Number(ci.tothonorarios) + Number(ci.totcustas) }} </span> 
  </div>    
</div>

<br>  
  <!-- -----------------------------------Recibosub ----------------------->
  <div id="orderform">
    <orderform :orderd="formdata"></orderform>
    <div id="app">
       
       <div class="grid-container">
          <table class="table">
              <tr>
                <th>nome</th>
                <th>serviços</th>
                <th>local</th>
                <th>honorarios</th>
                <th>custas</th>
                <th>total</th>
                <th>inicio</th>
                <th>nºprocesso</th>
                <th>código</th>
                <th>término</th>
                <th>ok</th>
              </tr>
              <tr v-for="item in sub">
                <td>{{ item.nome }}</td>
                <td>{{ item.servicos }}</td>
                <td>{{ item.locals }}</td>
                <td>{{ item.honorarios }}</td>
                <td>{{ item.custas }}</td>
                <td>{{ item.total }}</td>
                <td>{{ item.inicio }}</td>
                <td>{{ item.nprocesso }}</td>
                <td>{{ item.codigo }}</td>
                <td>{{ item.termino }}</td>
                <td>{{ item.ok }} </td>
              </tr>
          </table>
       </div> 

       <br><br><br>{{ message }}
       <div>{{ formdata }}</div><br>
       <div>{{ number }}</div><br>
       <div>{{ age.Peter }}</div><br>
       <div>{{ ci }}</div><br>
       <div>{{ sub }}</div><br>
       <br>

    </div>
  </div>
  
</body>

<script>
  const { createApp } = Vue

  createApp({
    data() {
      return {
        message: 'Hello Vue!',
        formdata: '<?php print json_encode($one) ?>',
        number: '<?php print json_encode($number) ?>',
        age: JSON.parse('<?php echo json_encode($ages) ?>'),
        ci: JSON.parse('<?php echo json_encode($recibo[0]) ?>'),
        sub: <?php echo json_encode($recibosub) ?>,
      }
    }
  }).mount('#app')
</script>


<style> 
body {background-color: #37444d; color: white;}

h1 {text-align:center;}

th, td {border: 1px solid white; border-radius: 10px; padding: 8px;}

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
