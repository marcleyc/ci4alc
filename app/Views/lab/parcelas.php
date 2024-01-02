<?php
function calcularParcelas($dataInicial, $numeroParcelas, $intervaloMeses) {
    $datasParcelas = [];
    
    // Cria um objeto DateTime a partir da data inicial
    $dataAtual = new DateTime($dataInicial);
    
    // Calcula as datas das parcelas usando DatePeriod
    $periodo = new DatePeriod($dataAtual, new DateInterval("P{$intervaloMeses}M"), $numeroParcelas - 1);
    
    // Armazena as datas no array
    foreach ($periodo as $dataParcela) {
        $datasParcelas[] = $dataParcela->format('Y-m-d');
    }
    
    return $datasParcelas;
}

// Exemplo de uso
$dataInicial = '2023-01-01'; // Sua data inicial
$numeroParcelas = 5; // Número de parcelas desejado
$intervaloMeses = 1; // Intervalo em meses entre as parcelas

$parcelas = calcularParcelas($dataInicial, $numeroParcelas, $intervaloMeses);

// Exibe as datas das parcelas
foreach ($parcelas as $parcela) {
    echo $parcela . PHP_EOL;
}
?>
