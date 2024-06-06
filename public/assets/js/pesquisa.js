console.log('js',ddd)
 
// Definindo o aplicativo Vue
    const app = Vue.createApp({
      data() {
        return {
          query: '',
          items: ddd
        }
      },
      computed: {
        filteredItems() {
          return this.items.filter(item => 
            item.nome.toLowerCase().includes(this.query.toLowerCase())
          );
        },
      },
      methods: {
        search() {
          console.log('Itens filtrados:', this.filteredItems);
        },
        openLink(url) {
          var uidc = 200;
          var urls = "";
          var urls = "global/" + url;
          window.open(urls);
        },        

      }
    });

    // Montando o aplicativo Vue
    app.mount('#app');
    