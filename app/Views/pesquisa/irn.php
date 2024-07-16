<style> center{color:green;} </style>
<?php
// Coleta os dados do formulário 
    echo "<center><h3>Nome: " . $nome . "</h3></center><br>";
// -------------------------------------------------- V I L A  R E A L
echo "<h3>----------------------------- VILA - REAL -----------------------------</h3>"."\n"."<br>";
$html = file_get_contents('https://digitarq.advrl.arquivos.pt/results?p0=ScopeContent&o0=3&v0='.$nome);
$start = stripos($html, 'class="Details"');
$end = stripos($html, '</ul>', $offset = $start);
$length = $end - $start;
$htmlSection = substr($html, $start, $length);
echo $htmlSection;
// -------------------------------------------------- P O R T O
echo "<h3>----------------------------- P O R T O -----------------------------</h3>"."\n"."<br>";
$html = file_get_contents('https://pesquisa.adporto.arquivos.pt/results?p0=ScopeContent&o0=3&v0='.$nome);
$start = stripos($html, 'class="Details"');
$end = stripos($html, '</ul>', $offset = $start);
$length = $end - $start;
$htmlSection = substr($html, $start, $length);
echo $htmlSection;
// -------------------------------------------------- B R A G A
echo "<h3>----------------------------- B R A G A -----------------------------</h3>"."\n"."<br>";
$html = file_get_contents('https://pesquisa.adb.uminho.pt/results?searchType=Description&p0=ScopeContent&o0=3&v0='.$nome.'&m0=False');
//$start = stripos($html, 'class="DescriptionItem"');
$start = stripos($html, 'id="SearchResultsControl_PanelResultsList"');
$end = stripos($html, '</ul>', $offset = $start);
$length = $end - $start;
$htmlSection = substr($html, $start, $length);
echo $htmlSection;
// -------------------------------------------------- R E S U L T
$html = file_get_contents('https://pesquisa.adb.uminho.pt/results?searchType=Description&p0=ScopeContent&o0=3&v0='.$nome.'&m0=False');
preg_match_all('/<div class="content-fluid" bis_skin_checked="1">(.*?)<\/div>/s',$html, $matches);
print_r($matches);
//}

?>
<br><br>
<a href="pesquisa.php">Voltar</a>