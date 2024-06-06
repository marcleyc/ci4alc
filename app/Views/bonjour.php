<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

        <main>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                           <?= $total; ?>
                        </h3>
                        <p>A Receber</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            <?= $totalv; ?>
                        </h3>
                        <p>Venda Mensal</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-euro'></i>
                    <span class="info">
                        <h3 id="euro">
                            5,99
                        </h3>
                        <p>Euro cotação</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->
            
            <!-- --------------------- Vendas Recentes -------------------- -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Vendas do mês</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($recibos as $x): ?>
                            <tr>
                                <td>
                                  <i class='bx bx-euro'></i>
                                  <p><?= $x['nome']; ?></p>
                                </td>
                                <td><?= $x['dataf']; ?></td>
                                <td><?= $x['total']; ?></td>
                            </tr>
                        <?php endforeach; ?> 
                        </tbody>
                    </table>
                </div>

                <!-- --------------------- A RECEBER -------------------- -->
                <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>A Receber</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                    <?php foreach($areceber as $x): ?>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p> <?= $x['nome']; ?> </p>
                            </div>
                            <span style="font-align:right;"><?= $x['valor']; ?></span>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    <?php endforeach; ?>     
                    </ul>
                </div>

                <!-- End of Reminders-->

            </div>

        </main>

    </div>     
    
    <script> 
        var ddd = <?php echo json_encode($clientesp); ?>; 
        console.log('bonjour',ddd);
    </script> 
    <script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script> 

<?= $this->endSection('conteudo'); ?>   
 