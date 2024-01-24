<?php

$nome = "VICTOR KOLTUNIK FRANÇA";
$estcivil = "casado";
$profissao = "prático de navios";
$nacionalidade = "brasileiro";
$passaporte = "GG589069";
$validade = "30/03/2033";
$cpf = "058.419.127-80";
$endereco = "av.Antonio Borges, n.o 80, apartamento 1302, Ed Grand Bay, 29065-250 Mata da Praia, Vitória/ES, Brasil";
$email = "victorkfranca@gmail.com";
$ano = date("Y");

//require_once __DIR__ . '../vendor/autoload.php';
require('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([
    'pagenumPrefix' => 'Página ',
    'pagenumSuffix' => ' / ',
    'nbpgPrefix' => '',
    'nbpgSuffix' => '',
    'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 26,
	'margin_bottom' => 27,
	'margin_header' => 10,
	'margin_footer' => 10
]);

//$mpdf->SetHeader('<img src="logo.png" align="middle" width=200 >');

$mpdf->SetHeader('
<table width="100%" style="vertical-align: bottom; font-family: serif; 
    font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
    <tr>
        <td width="33%"><span style="font-weight: bold; font-style: italic;"></span></td>
        <td width="33%" align="center"><img src="logo.png" align="middle" width=200 ></td>
        <td width="33%" style="text-align: right; "></td>
    </tr>
</table>', 'O'
);

$mpdf->SetFooter('
<div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>ESCRITÓRIO DE ADVOCACIA</div>
<div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>Praça da República n.o 8, 2ºF, Condeixa-a-Nova, Coimbra, Portugal 3150-127</div>
<div style=text-align:center;font-size:10px;font-style:normal;font-weight:normal;font-family:Arial;>Advogada Andréa L Carvalho - C.P.: 57281C  +351 911 992 069  andrealevindo@gmail.com</div>
<div style=text-align:right;font-size:8pt;font-style:normal;>{PAGENO}{nbpg}</div>
');

$mpdf->WriteHTML("

<style>
@font-face {font-family: ArialNova-Light; src: url(./ArialNova-Light.ttf)}
@page toc { sheet-size: A4; }
h1.bigsection {page-break-before: always; page: bigger;}

p { text-align: justify; text-justify: inter-word; font-family:Arial Narrow;font-weight: 800;font-size:11pt}
b { font-family:Arial Narrow; }
div { text-align: justify; text-justify: inter-word; font-family:Arial Narrow;font-weight: 800;font-size:11pt}
#foot { font-size:8pt; text-align:center }
#texto { text-align: justify; text-justify: inter-word; font-family:Arial Narrow; } 
</style>

<p style=text-align:center><b>CONTRATO DE PRESTAÇÃO DE SERVIÇOS ADVOCATÍCIOS</b></p>

<p><b>CONTRATANTES: $nome</b>, $estcivil, $profissao, $nacionalidade, portador do passaporte n.o $passaporte, emitido pela República Federativa do Brasil e válido até $validade, identificação fiscal (CPF) sob o n.o $cpf, residente em $endereco e endereço eletrônico em $email.</p> 

<div id='texto'><b>CONTRATADA: ANDRÉA LEVINDO CARVALHO</b>, casada, advogada, brasileira, inscrita na Ordem dos Advogados sob o n.o 57281C, identificação fiscal (NIF) sob o n.o 289418054, com endereço profissional em Praça da República, n.o 8 - 2 F, 3150-127 Condeixa-a-Nova, Coimbra, Portugal, e endereços eletrônicos em andrealevindo@gmail.com e andrea-57281c@adv.oa.pt.</div>

<p>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato de Prestação de Serviços Advocatícios, que se regerá
pelas cláusulas e pelas condições a seguir descritas.</p>

<p><b>DO OBJETO DO CONTRATO</b></p>

<p><b>Cláusula 1.ª </b>O presente contrato tem como objeto a prestação de serviços advocatícios para a defesa dos interesses do CONTRATANTE, especificadamente em relação à representação junto à Autoridade Tributária e Aduaneira e a uma instituição bancária
em Portugal.</p>

<p><b>Parágrafo único</b>. Os objetivos específicos desta contratação são: (i) a Representação Fiscal de singular, SEM gestão de bens e de
direitos, e procuradoria jurídica, com a obtenção do número de identificação fiscal (NIF) do CONTRATANTE e (ii) a Abertura de uma
conta bancária em Portugal.</p>

<p><b>DAS ATIVIDADES</b></p>

<p><b>Cláusula 2.ª </b> A CONTRATADA, quanto a representação fiscal, tem a responsabilidade de garantir o cumprimento dos deveres
tributários acessórios do CONTRATANTE, como obter o número de identificação fiscal (NIF), entregar declarações, guardar os
documentos comprovativos de despesas e rendimentos e prestar esclarecimentos à Autoridade Tributária e Aduaneira, assim como o
que for especificado na outorga da procuração, com a diligência habitual que se presume da atuação profissional. E, quanto a abertura
de uma conta bancária, tem como responsabilidades a apresentação dos documentos pessoais do CONTRATANTE para a apreciação
do banco, que será escolhido pelo CONTRATANTE, a assinatura dos documentos necessários e o acompanhamento de todo o processo
até a disponibilização dos dados de sua nova conta bancária.</p>

<p><b>Subcláusula 1.ª</b>. Os poderes conferidos a CONTRATADA como representante fiscal, não implicam para esta qualquer
responsabilidade no que respeita ao conteúdo das declarações fiscais apresentadas, bem como, qualquer responsabilidade no
pagamento de taxas, impostos, multas, coimas ou quaisquer outros pagamentos devidos pelo CONTRATANTE. Já os poderes
conferidos para a abertura de uma conta bancária, não implicam a inclusão da CONTRATADA como procuradora na respectiva conta
bancária. Para a prestação de outros serviços relacionados terá a necessidade da elaboração de um novo Contrato de prestação de
serviços advocatícios, onde será apresentada uma nova proposta de honorários advocatícios e custas.
</p>

<p><b>DAS DESPESAS</b></p>

<b>Cláusula 3.ª</b> Todas as despesas efetuadas pela CONTRATADA, mesmo que indiretamente relacionadas com a sua atuação, incluindo-
se cópias, digitalizações, envio de correspondência, e demais gastos de natureza diversa da verba honorária, ficarão às expensas do CONTRATANTE, desde que previamente por ele autorizadas.
<p><b>Cláusula 4.ª</b> Todas as despesas serão acompanhadas de documento comprobatório, devidamente organizado pela CONTRATADA.</p>

<p><b>DOS HONORÁRIOS</b></p>
<b>Cláusula 5.ª</b> O CONTRATANTE, como contraprestação aos serviços jurídicos prestados, pagará a CONTRATADA, a título de honorários, o valor de 610,00 € (seiscentos e dez euros), a serem pagos segundo a página 4 deste contrato, sem dedução de taxa cambial, imposto de operações financeiras ou tarifas cobradas para envio de emissão de ordem de pagamento.

<p><b>Subcláusula 1.ª</b> O adimplemento dos valores ajustados na presente cláusula será feito mediante pagamento direto a CONTRATADA,
através de depósito em sua conta corrente portuguesa n.o PT50.0018.0003.4284.8986.020.72 e SWIFT TOTAPTPLXXX, no banco
Santander Totta.</p>

<p><b>Parágrafo único</b> Caso haja morte ou incapacidade civil da CONTRATADA, seus sucessores ou representantes legais receberão os
honorários na proporção do trabalho realizado.</p>
<p><b>Cláusula 6.ª</b> Havendo desistência pelo CONTRATANTE, este fato não prejudicará o recebimento de todos os honorários pela CONTRATADA.</p>

<p><b>DA VIGÊNCIA</b></p>

<p><b>Cláusula 7.ª</b> Este contrato tem vigência até o adimplemento das obrigações ajustadas, sendo a renovação da Representação fiscal
anual, e também automática caso não seja denunciado pelas partes.</p>

<p><b>Subcláusula 1.ª</b> No caso de não renovação da representação fiscal, por parte do CONTRATANTE, deverá este apresentar por e-mail,
no ato da denúncia, o comprovativo emitido pela Autoridade Tributária e Aduaneira de residência fiscal em Portugal, de cancelamento
ou de substituição de representante fiscal, com antecedência mínima de 30 dias, da data da próxima renovação contratual, para que
sejam operados os seus efeitos, nomeadamente o termo e a não obrigação de pagamento da verba honorária.</p>

<p><b>Subcláusula 2.ª</b> No caso de não renovação da representação fiscal, por parte da CONTRATADA, deverá esta enviar, no ato da
denúncia, uma comunicação escrita para a última morada do CONTRATANTE, com antecedência mínima de 30 dias, da data da próxima
renovação contratual, para que sejam operados os seus efeitos, nomeadamente o termo e a não obrigação de pagamento da verba
honorária.</p>

<p><b>Parágrafo único.</b> O representado terá um prazo máximo de 90 dias, a contar da data do aviso de recebimento (AR) da correspondência,
para nomear novo representante fiscal. Neste caso, e apenas nesta circunstância, terá lugar ao pagamento pro rata, isto é, o pagamento
proporcional da verba honorária respeitante aos dias que excederam a última renovação contratual automática.</p>

<p><b>DA RESPONSABILIDADE</b></p>

<b>Cláusula 8.ª</b> A CONTRATADA não será responsabilizada por quaisquer danos que sobrevierem das demandas que patrocinar,
cabendo-lhe tão somente o emprego diligente de seus conhecimentos, meios e técnicas para a defesa dos interesses do
CONTRATANTE.
Parágrafo único. A CONTRATADA, como representante fiscal, pode responder por infrações fiscais, mas nunca ter de pagar impostos
devidos por este. Para a CONTRATADA está reservado o direito de reclamação, recurso ou impugnação perante a Autoridade Tributária
e Aduaneira.

<p><b>Cláusula 9.ª</b> A CONTRATADA não será responsabilizada acaso resultem danos por não tomar conhecimento de informações e
documentos substanciais para a sua atividade ou em decorrência da impossibilidade de contato com o CONTRATANTE, que deverá
manter atualizadas quaisquer informações relevantes para a demanda, em especial o seu endereço para a entrega de notificações, bem
como as informações cadastrais fornecidas por aquela.</p>

<p><b>Cláusula 10.ª</b> É obrigação do CONTRATANTE, sempre que solicitado, entregar, fornecer ou disponibilizar para a CONTRATADA todos
os documentos necessários, provas, informações e subsídios, em tempo hábil, para que esta possa cumprir o objeto do presente
contrato. Qualquer omissão ou negligência por parte do CONTRATANTE será de sua inteira responsabilidade, caso advenha algum
prejuízo a seus interesses.</p>

<p><b>DA PROTEÇÃO DE DADOS PESSOAIS</b></p>

<p><b>Cláusula 11.ª</b> Para garantir as boas práticas de proteção de dados pessoais, todos os dados pessoais que forem coletados pela
CONTRATADA, tendo em vista a relação profissional estabelecida, serão tratados exclusivamente com as finalidades propostas e não
serão compartilhados com terceiros, salvo em virtude de lei. Fica assegurada a guarda destes dados pessoais por até 3 anos após o
término da prestação dos serviços, sendo eliminados a partir de então.
DO FORO</p>

<p><b>Cláusula 12.ª</b> Para dirimir quaisquer controvérsias oriundas deste contrato, as partes elegem o foro de Coimbra, Portugal.
Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor.</p>
<br>
<p>Em_____________________ aos ______,de ___________________ de $ano.</p>

<p><b>CONTRATADA</b></p>

<div>_______________________________________________________________________________</div>
<div>ANDRÉA LEVINDO CARVALHO</div>

<br>
<p><b>CONTRATANTE</b></p>

<div>_______________________________________________________________________________</div>
<div>$nome</div>

");

// --------------------------------------------- PÁGINA DE FATURA
$mpdf->AddPage('P'); // Adds a new page fatura
$num = 174;

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>

<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; ">
  <span style="font-weight: bold; font-size: 14pt;">ALC Advocacia.</span>
  <br />Praça da República 8, 2ºF
  <br />Condeixa-a-Nova, Coimbra, Portugal
  <br /><span style="font-family:dejavusanscondensed;">&#9742;
  </span> 911.992.069</td>
<td width="50%" style="text-align: right;">Invoice No.<br />
  <span style="font-weight: bold; font-size: 12pt;"> '.$ano.$num.' </span>
</td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right">Date: 13th November 2008</div>

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
</tr></table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="30%">Nome</td>
<td width="30%">Serviço</td>
<td width="15%">Honorarios</td>
<td width="15%">Custas</td>
</tr>
</thead>
<tbody>

<!-- ITEMS HERE -->

<tr>
<td align="center">Alessandro Penido</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td class="cost">&euro;12.26</td>
<td class="cost">&euro;325.60</td>
</tr>

<tr>
<td align="center">Giane Freitas</td>
<td>Large pack Hoover bags</td>
<td class="cost">&euro;2.56</td>
<td class="cost">&euro;25.60</td>
</tr>

<tr>
<td align="center">Vitor Freitas</td>
<td>Womans waterproof jacket</td>
<td class="cost">&euro;102.11</td>
<td class="cost">&euro;102.11</td>
</tr>

<!-- END ITEMS HERE -->

<tr>
<td class="blanktotal" colspan="2" rowspan="4"></td>
<td class="totals">Total de honorários</td>
<td class="totals cost">&euro;1825.60</td>
</tr>

<tr>
<td class="totals">Total de custas</td>
<td class="totals cost">&euro;18.25</td>
</tr>

<tr>
<td class="totals">IVA</td>
<td class="totals cost">&euro;0.00</td>
</tr>

<tr>
<td class="totals"><b>TOTAL</b></td>
<td class="totals cost"><b>&euro;1782.56</b></td>
</tr>

</tbody>
</table>
<br>
<div style="text-align: center; font-style: italic;">Termos de pagamento: até 30 dias</div>

</body>
</html>
';

$mpdf->WriteHTML($html);

$mpdf->Output();




