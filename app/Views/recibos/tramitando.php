<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

<div>  
  <center> <h3 padding-top=25px margin-top=25px>TRAMITANDO</h3> </center>
</div>  

 <head> <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>  

<body>
  <div id="app">
  <div class="container">	
<template>
  <v-data-table dense :headers="headers" :items="desserts" :search="search" sort-by="nome" class="elevation-1">
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title></v-toolbar-title>
        
        <v-text-field v-model="search" append-icon="mdi-magnify" label="Pesquisar" single-line hide-details center></v-text-field>
           
        <v-divider class="mx-4" inset vertical></v-divider>
        <v-spacer></v-spacer>
                
        <v-dialog v-model="dialog" max-width="500px"> 
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">Inicio</v-btn>
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
                    <v-text-field v-model="editedItem.servico" label="Fat (g)"></v-text-field>
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
      <a small class="mr-1" :href="`<?php echo site_url('/tramitandoet')?>/${item.id}`" target="_blank"> <v-icon>mdi-pencil </v-icon></a>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
</template>
 <mostrar v-show = "search.length">  mostra esse texto  </mostrar>  
</div>
</div>

</body>
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
      url:'https://192.168.1.95/carvalhos/default/next/',
      headers: [
        {
          //text: 'Dessert (100g serving)',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'idc', value: 'idc' },
        { text: 'nome', value: 'nome' },
        { text: 'servico', value: 'servicos' },
        { text: 'local', value: 'locals' },
        { text: 'inicio', value: 'inicio' },
        { text: 'nprocesso', value: 'nprocesso' },
        { text: 'senha', value: 'codigo' },
        { text: 'nº', value: 'sit' },
        { text: 'ok', value: 'ok' },        
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      desserts: <?php echo json_encode($recibosub) ?>, //[],
      editedIndex: -1,
      editedItem: { id:0, nome:'', sexo:'',},
      defaultItem: { id:0, nome:'', sexo:'',},
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
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
      //initialize () {axios.get('http://192.168.1.95:3000/tramitando').then(response => (this.desserts = response.data))}
    },

      editItem (item) {
        //return this.url
       this.editedIndex = this.desserts.indexOf(item)
       console.log("mostrar",item)
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

<?= $this->endSection('conteudo'); ?>