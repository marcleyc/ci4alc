<?php echo $this->extend('main'); ?> 
<?= $this->section('conteudo'); ?>

        <main>     

            <!-- --------------------- Familiares -------------------- -->
            <ul class="family">
                <li onclick="newFamily()">
                    <i class='bx bx-user-plus'></i>
                    <span class="info"> Novo Familiar - cód: <b><?= $clientes[0]['idc']; ?></b></span>
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
                            <tr style="font-size: 14px;">
                                <td><?= $x['inicio']; ?></td>
                                <td><?= $x['nome']; ?></td>
                                <td><span class="status process"><?= $x['servicos']; ?></span></td>
                                <td><?= $x['total']; ?></td>
                            </tr>
                            <?php } else { ?>
                            <tr style="font-size: 14px;">
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
                        <li class="completed" style="font-size: 14px;">
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

        <script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
        <script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script> 

<?= $this->endSection('conteudo'); ?>  