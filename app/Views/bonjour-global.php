<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

        <main>     

            <!-- --------------------- Familiares -------------------- -->
            <ul class="family">
                <li onclick="newFamily('<?= $clientes[0]['idc']; ?>')">
                    <i class='bx bx-user-plus' style="color:blue"></i>
                    <span class="info"> Novo Familiar - cód: <b style="color:blue"><?= $clientes[0]['idc']; ?></b></span>
                </li>
            <?php foreach($clientes as $x): ?> 
                <li>
                    <i class='bx bx-user'></i>
                    <span class="info">
                        <?php echo $x['nome']; ?>
                    </span>
                </li>
                <?php endforeach; ?> 
            </ul>
            
            <!-- --------------------- Processos -------------------- -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h4>Processos</h4>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Serviço</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($processos as $x): ?>
                            <?php if ($x['ok'] == 'F'){ ?>
                            <tr style="font-size: 14px;" onclick="linkProcesso('<?= $x['id']; ?>')" >
                                <td><?= $x['inicio']; ?></td>
                                <td><?= $x['nome']; ?></td>
                                <td><span class="status process"><?= $x['servicos']; ?></span></td>
                                <td><?= $x['total']; ?></td>
                            </tr>
                            <?php } else { ?>
                            <tr style="font-size: 14px;" onclick="linkProcesso('<?= $x['id']; ?>')" >
                                <td><?= $x['inicio']; ?></td>
                                <td><?= $x['nome']; ?></td>
                                <td><span class="status pending"><?= $x['servicos']; ?></span></td>
                                <td><?= $x['total']; ?></td>
                            </tr>
                            <?php }; ?>    
                            <?php endforeach; ?> 
                        </tbody>
                    </table>
                </div>

                <!-- --------------------- A Receber -------------------- -->
                <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h4>A Receber</h4>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <?php foreach($processos as $x): ?>
                        <li class="completed" style="font-size: 14px;" onclick="linkReceber()">
                            <div class="task-title">
                                <p><?= $x['nome']; ?></p>
                            </div>
                            <p><?= $x['total']; ?></p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <?php endforeach; ?>     
                    </ul>
                </div>

            </div>

            <!-- --------------------- Financeiro -------------------- -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h4>Financeiro</h4>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Historico</th>
                                <th>Número</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <ul class="task-list">
                        <li class="completed" style="font-size: 14px;">      
                            <?php foreach($financeiro as $x): ?>
                            <?php if ($x['valor'] > 0){ ?>    
                            <tr style="font-size: 14px;">
                                <td id="borda-esq"> <p><?php echo $x['dataf']; ?></p> </td>
                                <td> <p><?php echo $x['historico']; ?></p> </td>
                                <td><?= $x['numero']; ?></td>
                                <td><?= $x['valor']; ?></td>
                            </tr>
                            <?php } else { ?>
                                <tr style="font-size: 14px;">
                                <td id="borda-esq-v"> <p><?php echo $x['dataf']; ?></p> </td>
                                <td> <p><?php echo $x['historico']; ?></p> </td>
                                <td><?= $x['numero']; ?></td>
                                <td><?= $x['valor']; ?></td>
                            </tr>    
                            <?php }; ?> 
                            <?php endforeach; ?>
                        </li>    
                        </ul>     
                        </tbody>
                    </table>
                </div>
                
            </div>

        </main>

        <script>
            function newFamily(id) { 
                var urls = "<?= site_url('clientesa'); ?>"+"/"+`${id}`;
                window.location.href = urls; 
            }
            function linkProcesso(id) { 
                var urls = "<?= site_url('tramitandoet'); ?>"+"/"+`${id}`;
                window.location.href = urls; 
            }
            function linkReceber(id) { 
                var urls = "<?= site_url('financeiroar2'); ?>";
                window.location.href = urls; 
            }
        </script>

        <script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
        <script> var xurls = "<?= base_url('/global'); ?>/"; </script> 
        <script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script> 

<?= $this->endSection('conteudo'); ?>  