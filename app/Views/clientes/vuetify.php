<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  

<div class="container">  
  <center><h2 class="mb-2">C L I E N T E S</h2></center>
  <div id="app">
    <v-app>
      <v-main>
        <v-data-table
          :headers="headers"
          :items="filteredDesserts"
          :items-per-page="12"
          class="elevation-1"
        >
          <template v-slot:header.idc="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="idcs ? 'primary' : ''">
                    mdi-filter
                  </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field
                  v-model="idcs"
                  class="pa-4"
                  type="number"
                  label="Enter the search term"
                  :autofocus="true"
                ></v-text-field>
                <v-btn
                  @click="idcs = ''"
                  small
                  text
                  color="primary"
                  class="ml-2 mb-2"
                >Clean</v-btn>
              </div>
            </v-menu>
          </template>
          
          <template v-slot:header.nome="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="nome ? 'primary' : ''">
                    mdi-filter
                  </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field
                  v-model="nomes"
                  class="pa-4"
                  type="text"
                  label="Enter the search term"
                  :autofocus="true"
                ></v-text-field>
                <v-btn
                  @click="nomes = ''"
                  small
                  text
                  color="primary"
                  class="ml-2 mb-2"
                >Clean</v-btn>
              </div>
            </v-menu>
          </template>
          
          <template v-slot:header.fat="{ header }">
            {{ header.text }}
            <v-menu offset-y :close-on-content-click="false">
              <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                  <v-icon small :color="fat ? 'primary': ''">
                    mdi-filter
                  </v-icon>
                </v-btn>
              </template>
              <div style="background-color: white; width: 280px">
                <v-text-field
                  v-model="fat"
                  class="pa-4"
                  type="number"
                  label="Enter the search term"
                  :autofocus="true"
                ></v-text-field>
                <v-btn
                  @click="fat = ''"
                  small
                  text
                  color="primary"
                  class="ml-2 mb-2"
                >Clean</v-btn>
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
  var ddd = <?php echo json_encode($cliente) ?>;
</script>

  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data () {
      return {
        idcs: '',
        nomes: '',
        emails: '',
        headers: [
          { text: 'idc', value: 'idc', sortable: true, align: 'start', search:'true' },
          { text: 'nome', value: 'nome' },
          { text: 'email', value: 'email' },
        ],
        desserts: ddd,
      }
    },
   computed: {
    filteredDesserts() {
      
      conditions = [];
      
      if (this.idcs) {
        conditions.push(this.filterIdc);
      }
      
      if (this.nomes) {
        conditions.push(this.filterNome);
      }
      
      if (this.fat) {
        conditions.push(this.filterFat);
      }
      
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
     filterIdc(item) {
       return item.idc.toString().includes(this.idcs);
       //return item.idc.toLowerCase().includes(this.dessertName.toLowerCase());
     },
     filterNome(item) {
       return item.nome.toLowerCase().includes(this.nomes.toLowerCase());
     },
     filterFat(item) {
       return item.fat.toString().includes(this.fat);
     }
   }
   })
  </script>

<?= $this->endSection('conteudo'); ?>