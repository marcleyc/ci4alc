<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="<?= base_url("assets/icon/logo-ico.ico") ?>">
    <link href="<?= base_url("assets/css/dashboard.css") ?>" rel="stylesheet">
    <script src="<?= base_url("assets/js/dashboard.js") ?>" ></script>

    <title>ALC Advocacia dsb</title>
</head>

<body>

<!--------------------------------------------------- Sidebar -->

<div class="sidebar">
    <a href="<?= site_url('/bonjour') ?>" class="logo">
        <i class='bx bx-code-alt'></i>
        <div class="logo-name"><span>ALC</span>Advocacia</div>
    </a>

    <ul class="side-menu"> 
        <li><a href="<?= site_url('/contatos') ?>"><i class='bx bx-user'></i>Contatos</a></li>
        <li><a href="<?= site_url('/clientes') ?>"><i class='bx bx-group'></i>Clientes</a></li>
        <li><a href="#"><i class='bx bx-collection'></i>Processos</a></li>
        <li class="active"><a href="#"><i class='bx bx-analyse'></i>Serviços</a></li>
        <li><a href="#"><i class='bx bx-money-withdraw'></i>Recibos</a></li>
        <li class="menu-item"><a href="#" onclick="toggleSubmenu(event)"><i class='bx bx-user'></i>Processos</a></li>
        <ul id="sublinks" class="submenu">
            <li><a href="#"><i class='bx bx-group'></i>pro1</a></li>
            <li><a href="#"><i class='bx bx-collection'></i>pro2</a></li>
        </ul>
        <li><a href="#"><i class='bx bx-euro'></i>Financeiro</a></li>
        <li><a href="#"><i class='bx bx-git-branch'></i>Lab</a></li>
    </ul>
    
    <ul class="side-menu">
        <li>
            <a href="#" class="logout"> <i class='bx bx-log-out-circle'></i> Logout </a>
        </li>
    </ul>
</div>

<!---------------------------------------------------End of Sidebar -->

    <!------------------------------------- Main Content --------------------------------------->
 
    <?= $this->renderSection('conteudo') ?>

    <!------------------------------------- Main Content End --------------------------------------->
    
</body>

</html>