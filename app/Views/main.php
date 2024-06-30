<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">
    <!-- link href="<//?= base_url("assets/css/bootstrap5.css") ?>" rel="stylesheet" -->
    <link href="<?= base_url("assets/css/datatables.min.css") ?>" rel="stylesheet">
    <script src="<?= base_url("assets/js/datatables.min.js") ?>" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="<?= base_url("assets/css/dashboard.css") ?>" rel="stylesheet">
    <script src="https://unpkg.com/vue@3.2.0/dist/vue.global.js"></script>

    <title>ALC Advocacia</title>
</head>

<body>

<!--------------------------------------------------- Sidebar -->
<div class="sidebar">
    <a href="<?= site_url('/bonjour') ?>" class="logo">
        <!-- i class='bx bx-code-alt'></i -->
        <img style="margin-left:8px" src="<?= base_url("assets/img/logo-50.png") ?>"></img>
        <div style="margin-left:10px" class="logo-name"><span>ALC</span>Advocacia</div>
    </a>

    <ul class="side-menu"> 
        <li><a href="<?= site_url('/contatos') ?>"><i class='bx bx-user'></i>Contatos</a></li>
        <li><a href="<?= site_url('/clientes') ?>"><i class='bx bx-group'></i>Clientes</a></li>
        <li><a href="<?= site_url('/recibos') ?>"><i class='bx bx-money-withdraw'></i>Recibos</a></li>
        <li><a href="<?= site_url('/processos') ?>"><i class='bx bx-collection'></i>Processos</a>
        <li><a href="<?= site_url('/financeiro') ?>"><i class='bx bx-euro'></i>Financeiro</a></li>
        <li><a href="<?= site_url('/tramitando4') ?>"><i class='bx bx-check-circle'></i>Global</a></li>
        <li><a href="<?= site_url('/servicos') ?>"><i class='bx bx-analyse'></i>Serviços</a></li>
        <li><a href="<?= site_url('/mobile') ?>"><i class='bx bx-git-branch'></i>Mobile</a></li>
    </ul>
    
    <ul class="side-menu">
        <li>
            <a href="<?= site_url('/logout') ?>" class="logout"> <i class='bx bx-log-out-circle'></i> Logout </a>
        </li>
    </ul>
</div>
<!---------------------------------------------------End of Sidebar -->

<div class="content" id="app">
        <!-- ------------------------- Navbar ------------------------------- -->
        <nav>
            <i id="bx-menu" class='bx bx-menu'></i>
            <form action="#" id="pesqCliente">
                <div class="form-input">
                    <input type="search" v-model="query" @input="filterData" placeholder="Pesquisar o cliente...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif"> <i class='bx bx-bell'></i> <span class="count">12</span> </a>
            <a href="#" class="profile" id="logo"> <img src="<?= base_url("assets/img/logo-50.png") ?>"> </a>
        </nav>
        <!-- ------------------------- End Navbar ------------------------------- -->
        <div class="results" v-if="query" id="results">
                <ul>
                    <li v-for="item in filteredItems" :key="item.name" @click="openLink(item.idc)">
                    {{ item.nome }} - {{ item.idc }} 
                    </li>
                </ul>
        </div>

    <main>
    <!------------------------------------- Main Content --------------------------------------->
       <?= $this->renderSection('conteudo') ?>
    <!------------------------------------- Main Content End ----------------------------------->
    </main>

</div>

<script src="<?= base_url("assets/js/dashboard.js") ?>" ></script> 
  
</body>

</html>