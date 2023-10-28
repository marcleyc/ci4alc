<html>

<div>  
   <h2 padding-top=25px margin-top=25px align="center">CLIENTES</h2>
</div>  
<div>  
   <a href="http://192.168.1.67:3000/processos" target="_blank">PROCESSOS</a>
   <a href="http://192.168.1.67:3000/financas" target="_blank">FINANCEIRO</a>
<div>  
   
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>  
<body>
  <div id="app">
  <div class="container">	
<template>
  <v-data-table
     dense
    :headers="headers"
    :items="desserts"
    :search="search"
    sort-by="nome"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title></v-toolbar-title>
        
        <v-text-field v-model="search" append-icon="mdi-magnify" label="Pesquisar" single-line hide-details center></v-text-field>
        </div>
        
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
                
        <v-dialog v-model="dialog" max-width="500px"> 
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Novo Item</v-btn>
          </template>

          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>
                    <v-spacer></v-spacer> 
            <v-card-text> 
              <v-container> 
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.idc" label="Dessert name"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.nome" label="Calories"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.sexo" label="Fat (g)"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-btn small class="mr-2" :href="`https://192.168.1.95/carvalhos/default/next/${item.idc}`" target="_blank" > global </v-btn>
      <v-btn small class="mr-2" :href="`https://192.168.1.95/carvalhos/default/contatos/contatos/recibo.idc/${item.idc}`" target="_blank" > recibos </v-btn>
      <v-btn small class="mr-2" :href="`https://192.168.1.95/carvalhos/default/contatos/contatos/clientes.idc/${item.idc}`" target="_blank" > família </v-btn>
      <v-btn small class="mr-2" :href="`file://///192.168.1.95/myshare/${item.idc}`"> file </v-btn>
      <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
      <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
</template>
</div>
</div>
<script>
  var ddd = <?php echo json_encode($cliente) ?>;
  var dados = <?php echo json_encode($cliente) ?>;
  console.log('js puro',dados);
</script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
  new Vue({
  el: '#app',
  vuetify: new Vuetify(),
    data: () => ({
      dialog: false,
      search: '',
      url:'https://192.168.1.67/carvalhos/default/next/',
      dadosphp: dados,
      headers: [
        {
          //text: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'id', value: 'id' },
        { text: 'nome', value: 'nome' },
        { text: 'email', value: 'email' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      desserts: ddd,
      editedIndex: -1,
      editedItem: { id:0, nome:'', sexo:'',},
      defaultItem: { id:0, nome:'', sexo:'',},
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },      
    },

    mounted () {               
      console.log('php', this.dadosphp)
    },
    
    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      //this.initialize()
    }, //created mounted

    methods: {
      //initialize () {axios.get('http://localhost/codeigniter-alc/public/index.php/clijson').then(response => (this.desserts = response.data.clientes))}
    },

      editItem (item) {
        //return this.url
       this.editedIndex = this.desserts.indexOf(item)
       console.log("mostrar",this.editedIndex)
       this.editedItem = Object.assign({}, item)
       this.dialog = true
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },

            

    }
  )
</script>
</body>
</html>
