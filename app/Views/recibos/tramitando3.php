<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    

<div class="container">  
  <center><h2 class="mb-2">T R A M I T A N D O com F I L T R O</h2></center>
  <div id="app">
    <v-app>
      <v-main>
        <v-data-table :headers="headers" :items="filteredDesserts" :items-per-page="12" class="elevation-1">
          // I N I C I O -----------------------------------------------------
          <template v-slot:header.inicio="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="inicio ? 'primary' : ''"> mdi-filter </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field v-model="inicios" class="pa-4" type="text" label="Enter the search term" :autofocus="true"></v-text-field>
                <v-btn @click="inicios = ''" small text color="primary" class="ml-2 mb-2">Clean</v-btn>
              </div>
            </v-menu>
          </template>
          // L U G A R -----------------------------------------------------
          <template v-slot:header.locals="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="locals ? 'primary' : ''"> mdi-filter </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field v-model="localss" class="pa-4" type="text" label="Enter the search term" :autofocus="true"></v-text-field>
                <v-btn @click="localss = ''" small text color="primary" class="ml-2 mb-2">Clean</v-btn>
              </div>
            </v-menu>
          </template>
          // S E R V I C O S ----------------------------------------------
          <template v-slot:header.servicos="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="servicos ? 'primary' : ''"> mdi-filter </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field v-model="servicoss" class="pa-4" type="text" label="Enter the search term" :autofocus="true"></v-text-field>
                <v-btn @click="servicoss = ''" small text color="primary" class="ml-2 mb-2">Clean</v-btn>
              </div>
            </v-menu>
          </template>
          // N O M E -----------------------------------------------------
          <template v-slot:header.nome="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="nome ? 'primary' : ''"> mdi-filter </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field v-model="nomes" class="pa-4" type="text" label="Enter the search term" :autofocus="true"></v-text-field>
                <v-btn @click="nomes = ''" small text color="primary" class="ml-2 mb-2">Clean</v-btn>
              </div>
            </v-menu>
          </template>
          
        </v-data-table>
      </v-main>
    </v-app>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>

<script>
  var ddd = <?php echo json_encode($recibosub) ?>;
</script>

  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data () {
      return {
        inicios: '',
        nomes: '',
        localss: '',
        servicoss: '',
        headers: [
          { text: 'inicio', value: 'inicio', align: 'start', search:'true' },
          { text: 'lugar', value: 'locals', search:'true'  },
          { text: 'serviço', value: 'servicos', search:'true' },
          { text: 'nome', value: 'nome' },
          { text: 'senha', value: 'codigo' },
          { text: 'nº', value: 'nprocesso' },
          { text: 'sit', value: 'sit' },
          { text: 'alterado', value: 'verificado' },
        ],
        desserts: ddd,
      }
    },
   computed: {
    filteredDesserts() {
      
      conditions = [];
      if (this.inicios)   {conditions.push(this.filterInicio);}
      if (this.nomes)     {conditions.push(this.filterNome);}
      if (this.localss)   {conditions.push(this.filterLocal);}
      if (this.servicoss) {conditions.push(this.filterServico);}
      
      if (conditions.length > 0) {
        return this.desserts.filter((dessert) => {
          return conditions.every((condition) => {
            return condition(dessert);
          })
        })
      }
      return this.desserts;
    }
  },
   methods: {
     filterInicio(item)  {return item.inicio.toLowerCase().includes(this.inicios);},
     filterNome(item)    {return item.nome.toLowerCase().includes(this.nomes.toLowerCase());},
     filterLocal(item)   {return item.locals.toLowerCase().includes(this.localss.toLowerCase());},
     filterServico(item) {return item.servicos.toLowerCase().includes(this.servicoss.toLowerCase());},
     //filterInicio(item) {return item.inicio.toString().includes(this.inicios);}, //para número
   }
   })
  </script>

<?= $this->endSection('conteudo'); ?>