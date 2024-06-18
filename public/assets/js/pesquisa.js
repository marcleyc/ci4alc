//console.log('js',ddd)
 
// Definindo o aplicativo Vue
    const app = Vue.createApp({
      data() {
        return {
          query: '',
          items: ddd,
          uuu : xurls,
          filteredItems:[],
        }
      },
      computed: {
      },
      methods: {
        filterData() {
          const qqq = this.query.toLowerCase();
          this.filteredItems = this.items.filter(item => {
            return (
              item.nome.toLowerCase().includes(qqq) ||
              item.idc.toLowerCase().includes(qqq)
            );
          });
        },
        openLink(url) {
          //var urls = this.uuu + url;
          var urls = "/global/" + url;
          //window.open(urls), "_self"; // abre uma pagina em outra aba 
          window.location.href = urls;  // abre uma pagina na mesma aba
        },       
      }
    });

    // Montando o aplicativo Vue
    app.mount('#app');
    