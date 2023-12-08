<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALC Advocacia</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">

    <link href="<?= base_url("assets/css/bootstrap5.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/css/datatables.min.css") ?>" rel="stylesheet">
    <script src="<?= base_url("assets/js/datatables.min.js") ?>" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<!-- body style="background-color: #F5F5F9;" -->
<style> #footer {position: absolute; bottom: 0; width: 100%; height: 2.5rem;} </style>

<!-- ----------------------------------- N A V B A R ------------------------------------------ -->   

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?= site_url('/') ?>">ALC Advocacia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/contatos') ?>">Contatos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/clientes') ?>">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/servicos') ?>">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/recibos') ?>">Recibos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/financeiro') ?>">Financeiro</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/processos') ?>">Processos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('/cadonline') ?>">Lab</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tramitando</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= site_url('/tramitando') ?>">Tramitando</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="<?= site_url('/tramitando2') ?>">Relatório por local</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('/tramitando8') ?>">Relatório por serviço</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('/tramitando3') ?>">Relatório c/filtro</a></li>
                            </ul>
                        </li>
                    </ul>                    
                </div>
            </div>
</nav>

<!-- ------------------------------------------------------------------------------------------ -->
<script>
new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({
    drawer: false,
    group: null,
  }),

  watch: {
    group () {
      this.drawer = false
    },
  },
})
</script>

<?= $this->renderSection('conteudo') ?>

    <!--
    <footer id="footer"> -->
       <!-- script src="<!?= #base_url('assets/js/bootstrap.min.js') ?>"></script --> 
       <!-- em class="m-2">MyTech &copy; 2023</em>
    </footer>
    -->
</body>
</html>