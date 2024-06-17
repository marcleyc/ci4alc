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
          return this.items.filter(item => item.nome.toLowerCase().includes(this.query.toLowerCase())) &&
                 this.items.filter(item => item.idc.toString().includes(this.query.toString())) 
        },
      },
      methods: {
        search() {
          console.log('Itens filtrados:', this.filteredItems);
        },
        openLink(url) {
          var urls = "/global/" + url;
          //window.open(urls), "_self"; // abre uma pagina em outra aba
          window.location.href = urls;  // abre uma pagina na mesma aba
        },       
      }
    });

    // Montando o aplicativo Vue
    app.mount('#app');
    