# mac m1 = boottable - 6.70ms | datatable - 15ms | vuetify - 13.6ms | clientes - 65.4ms | 
# odroid = boottable - 18.4ms | datatable - 00ms | vuetify - 41.2ms | clientes -        | 3.0x < mac           
# raspbe = boottable - 49.5ms | datatable - 156ms| vuetify - 141ms  | clientes - 948.6ms| 2.7x < odroid     | 7,38x < mac
# ryzen5 = boottable - 78.5ms | datatable - 268ms| vuetify - 220ms  | clientes - 424.3ms| 1.6x < raspberry  | 11,7x < mac
# huawei = boottable - 111.5ms| datatable - 273ms| vuetify - 244ms  | clientes - 653.3ms| 1.4x < ryzen5     | 16,6x < mac

Bootstrap-Table (os melhores)
- https://examples.bootstrap-table.com/#options/buttons-toolbar.html
- https://examples.bootstrap-table.com/#options/detail-view.html
- https://examples.bootstrap-table.com/#options/detail-view-align.html - botão
- https://examples.bootstrap-table.com/#column-options/events.html - botao c/evento
- https://examples.bootstrap-table.com/#options/footer-style.html - total
- https://examples.bootstrap-table.com/#methods/toggle-detail-view.html - botao é a linha clicável
- https://examples.bootstrap-table.com/#extensions/filter-control.html - filtro por coluna
- https://examples.bootstrap-table.com/#extensions/multiple-sort.html - ordenarnação múltipla
- https://examples.bootstrap-table.com/#extensions/toolbar.html - busca avançada
- https://examples.bootstrap-table.com/#issues/4214.html - baixar a tabela em json ou xml

samsung note 9     - cam:107 - video:094 - bat:000
samsung A50        - cam:076 - video:067 - bat:000
samsung A54        - cam:107 - video:115 - bat:113
xiaomi note pro 5g - cam:121 - video:117 - bat:000
Xiaomi 13T         - cam:123 - video:132 - bat:114
Google Pixel 7a    - cam:133 - video:133 - bat:96
iphon 15 pro       - cam:134 - video:000 - bat:113 

( )colocar no sitema data para eliminar os arquivos físicos
(x)atualizar serviços para boottable
(x)login - https://www.mywebtuts.com/blog/codeigniter-4-authentication-login-and-registration-tutorial

<img src="<?= base_url("assets/icon/add24.png")?>" height="17" width="17" alt="">
<?php echo base_url('clientesa/'.$cliente['idc']);?>

<?php $qtd=count($recibosub); ?>
<div class="text-center"><h3><?= $qtd; ?>

$data_atual = new \DateTime($dataf);
$hoje = $data_atual->format('Y/m/d');

<?php foreach($recibo as $r): ?>
   <?php echo $item['nome']; ?>
<?php endif; ?>  

// S U B M E N U
<li class="dropdown"><a><i class='bx bx-collection'></i>Processos</a>
   <div class="dropdown-sub" id="dropdown-sub">
         <a class="dropdown-item" href="<?= site_url('/processos') ?>">Processos</a>
         <a class="dropdown-item" href="<?= site_url('/processos') ?>">Processos</a>
         <a class="dropdown-item" href="<?= site_url('/tramitando') ?>">Tramitando</a>
         <hr class="dropdown-divider" />
         <a class="dropdown-item" href="<?= site_url('/tramitando2') ?>">Tramitando por local</a>
         <a class="dropdown-item" href="<?= site_url('/tramitando5') ?>">Tramitando em Coimbra</a>
   </div>
</li>

{ name: 'Apple', url: 'https://www.apple.com' },
            { name: 'Banana', url: 'https://en.wikipedia.org/wiki/Banana' },
            { name: 'Cherry', url: 'https://en.wikipedia.org/wiki/Cherry' },
            { name: 'Date', url: 'https://en.wikipedia.org/wiki/Date_palm' },
            { name: 'Elderberry', url: 'https://en.wikipedia.org/wiki/Sambucus' },
            { name: 'Fig', url: 'https://en.wikipedia.org/wiki/Common_fig' },
            { name: 'Grape', url: 'https://en.wikipedia.org/wiki/Grape' },
            { name: 'Ferrari', url: 'https://en.wikipedia.org/wiki/Ferrari' },
            { name: 'Honeydew', url: 'https://en.wikipedia.org/wiki/Honeydew_(melon)' }

 fetch('http://localhost:8080/contatosapi')
    .then(response => response.json())
    //.then(data => console.log(data.data))
    .then(data => dados=data)
    .catch(error => console.error('Erro:', error));
    console.log('console',dados);     

    <?= $clientes[0]['idc']; ?>

    openLink(url) {
          var urls = "/global/" + url;
          //window.open(urls), "_self"; // abre uma pagina em outra aba
          window.location.href = urls;  // abre uma pagina na mesma aba
        },

onclick="financeiroAR()"

$dataModel = new ClientesModel();
$data['clientesp'] = $dataModel->select('idc,nome')->findAll();


<script> var ddd = <?php echo json_encode($clientesp); ?>; </script> 
<script> var xurls = "<?= base_url('/global'); ?>/"; </script> 
<script src="<?= base_url("assets/js/pesquisa.js") ?>" ></script>

computed: {
        filteredItems() {
          return this.items.filter(item => item.nome.toLowerCase().includes(this.query.toLowerCase())) ||
                 this.items.filter(item => item.idc.toString().includes(this.query.toString())) 
        },

<script> // pegar dados com fetchapi
  fetch('<?= site_url('/api/clientes') ?>')
	.then((response) => response.json())
	.then((data) => {console.log(data.clientes)})
</script>




https://www.imovirtual.com/pt/anuncio/apartamento-t2-com-vista-mar-box-para-2-viaturas-em-condominio-fechad-ID1ePI9
50/50

https://www.imovirtual.com/pt/anuncio/apartamento-t2-em-condominio-privado-oasis-mar-ID1cAjx
4% 50/50 916985330 João Santana 

https://www.imovirtual.com/pt/anuncio/apartamento-t3-no-condominio-oasis-mar-ID1aIWH

https://www.imovirtual.com/pt/anuncio/apartamento-de-luxo-3-quartos-frente-mar-praia-da-rocha-portimao-ID157k1

https://www.imovirtual.com/pt/anuncio/apartamento-t2-em-faro-de-207-00-m2-ID1dZwP

Policlinica de Condeixa
Rua Dr. Alfredo Pires de Miranda, 14
Condeixa-a-Nova,
3150-135 Condeixa-a-Nova
Telf: 351 239945985
Exames Oftalmologia

//( ) "configurar as paginas add e edt dos servicos";

foreach ($results2 as $xx) 
            {
                $xtipo = $xx->tipo;
                if (strpos($tipo, $xtipo) !== false)
                   { $data[] = ['tipo' => $xx->tipo, 'total' => $xx->total]; } 
                else 
                   { $data[] = ['tipo' => $tipo, 'total' => 0]; }
            } 

$query3 = $db->query(" SELECT tipo, YEAR(dataf) AS ano, MONTH(dataf) AS mes, SUM(valor) AS total,
CASE 
      WHEN EXISTS (SELECT 1 FROM fintipo WHERE fintipo.tipo = financeiro.tipo) 
      THEN 'valor'
      ELSE '0'
      END AS total
      FROM financeiro 
      WHERE YEAR(dataf) = '$ano' AND MONTH(dataf) = '$mes'
      GROUP BY tipo, ano, mes 
      ORDER BY ano, mes, tipo ");
$results3 = $query3->getResultArray();

for ($y = 0; $y < sizeof($tipos); $y++) 
        { 
            $data[] = ['tipo' => $tipos[$y]["tipo"], 'total' => 0, 'id' => $y];
            for($i = 0; $i < sizeof($results); $i++)
            { 
              $tipox = $tipos[$y]["tipo"];
              $tipo = $results[$i]["tipo"];
              $total = $results[$i]["total"];
    
            if (strpos($tipo, $tipox) !== false) 
               { 
                $lastKey = array_key_last($data); //pega ultimo item inserido no array
                unset($data[$lastKey]); // apaga o registo pela key array
                $data[] = ['tipo' => $tipo, 'total' => $total, 'id' => $lastKey]; 
               } 
            }           
        }

        <div class="item" id="tipo" onclick="allert(<?= $dados[$i]['tipo']; ?>)">
        <h4 id="tip"><?= $dados[$i]['tipo']; ?></h4>
        <p><?= $dados[$i]['total']; ?></p>
        </div> 

<div class="container">
<?php foreach($dados as $x): ?>  
  <div class="item" id="tipo" onclick="allert()">
      <h4 id="tip"><?= $x['tipo']; ?></h4>
      <p><?= $x['total']; ?></p>
  </div>
  <?php endforeach; ?>  
</div>
