<?php echo $this->extend('main'); ?> 

<?= $this->section('conteudo'); ?>

        <main>

            <!-- ------------------------ menu de resumo ---------------------------- -->
            <ul class="insights">
                <li onclick="financeiroAR()">
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                           <?= $total; ?>
                        </h3>
                        <p>A Receber</p>
                    </span>
                </li>
                <li onclick="recibos()"><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            <?= $totalv; ?>
                        </h3>
                        <p>Venda Mensal</p>
                    </span>
                </li>
                <li onclick="tramitando()"><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            <?= $tramitando; ?>
                        </h3>
                        <p>Tramitando</p>
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
            
            <!-- --------------------- Vendas do Mês -------------------- -->
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
                            <tr onclick="linkRecibo('<?= $x['id']; ?>') ">
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
                        <i class='bx bx-plus' onclick="linkReceber()"></i>
                    </div>
                    <ul class="task-list">
                    <?php foreach($areceber as $x): ?>
                        <li class="completed" onclick="linkReceber()">
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
    
    <script> // pegar dados com php
        var ddd = <?php echo json_encode($clientesp); ?>; 
        //console.log('bonjour',ddd);
        var xurls = "<?= base_url('/global'); ?>/";
    </script>

    <script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script> 

    <script> 
        // pegar dados com fetchapi
        //var ddd = '';
        //fetch('?= //site_url('/api/clientes') ?>')
    	//.then((response) => response.json())
	    //.then((data) => {console.log(data.clientes)})
        //.then((data) => {this.ddd = data.clientes})
    </script> 

    <script>
        function financeiroAR() { 
          var urls = "<?= site_url('/financeiroar2'); ?>";
          window.location.href = urls;
        }
        
        function tramitando() { 
            var urls = "<?= site_url('tramitando'); ?>"; 
            window.location.href = urls; 
        }

        function recibos() { 
            var urls = "<?= site_url('recibos'); ?>"; 
            window.location.href = urls; 
        }

        function linkRecibo(id) { 
            var urls = "<?= site_url('recibo'); ?>"+"/"+`${id}`;
            console.log(urls); 
            window.location.href = urls; 
        }

        function linkReceber() { 
            var urls = "<?= site_url('financeiroar2'); ?>";
            window.location.href = urls; 
        }
    </script>
    


<?= $this->endSection('conteudo'); ?>   
 