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

//require_once __DIR__ . '../vendor/autoload.php';
require('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([
    'pagenumPrefix' => 'Página ',
    'pagenumSuffix' => ' / ',
    'nbpgPrefix' => '',
    'nbpgSuffix' => '',
    'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 18,
	'margin_bottom' => 27,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetHeader('ALC ADVOCACIA');

$mpdf->SetFooter('
<div style=text-align:center;font-size:9px;margin-top: 7mm>ESCRITÓRIO DE ADVOCACIA</div>
<div style=text-align:center;font-size:9px>Praça da República n.o 8, 2ºF, Condeixa-a-Nova, Coimbra, Portugal 3150-127</div>
<div style=text-align:center;font-size:9px>Advogada Andréa L Carvalho - C.P.: 57281C  +351 911 992 069  andrealevindo@gmail.com</div>
<div>{PAGENO}{nbpg}</div>
');

$mpdf->WriteHTML("

<style>
@page toc { sheet-size: A4; }
h1.bigsection {page-break-before: always; page: bigger;}

p { text-align: justify; text-justify: inter-word; }
#foot { font-size:8pt; text-align:center }
#texto { text-align: justify; text-justify: inter-word; } 
</style>

<p style=text-align:center><b>CONTRATO DE PRESTAÇÃO DE SERVIÇOS ADVOCATÍCIOS</b></p>

<p><b>CONTRATANTES: $nome</b>, $estcivil, $profissao, $nacionalidade, portador do passaporte n.o $passaporte, emitido pela República Federativa do Brasil e válido até $validade, identificação fiscal (CPF) sob o n.o $cpf, residente em $endereco e endereço eletrônico em $email.</p> 

<div id='texto'><b>CONTRATADA: ANDRÉA LEVINDO CARVALHO</b>, casada, advogada, brasileira, inscrita na Ordem dos Advogados sob o n.o 57281C, identificação fiscal (NIF) sob o n.o 289418054, com endereço profissional em Praça da República, n.o 8 - 2 F, 3150-127 Condeixa-a-Nova, Coimbra, Portugal, e endereços eletrônicos em andrealevindo@gmail.com e andrea-57281c@adv.oa.pt.</div>

<p>As partes acima identificadas têm, entre si, justo e acertado o presente Contrato de Prestação de Serviços Advocatícios, que se regerá
pelas cláusulas e pelas condições a seguir descritas.</p>

<p><b>DO OBJETO DO CONTRATO</b></p>

<b>Cláusula 1.a </b>O presente contrato tem como objeto a prestação de serviços advocatícios para a defesa dos interesses do CONTRATANTE, especificadamente em relação à representação junto à Autoridade Tributária e Aduaneira e a uma instituição bancária
em Portugal.
<p><b>Parágrafo único</b>. Os objetivos específicos desta contratação são: (i) a Representação Fiscal de singular, SEM gestão de bens e de
direitos, e procuradoria jurídica, com a obtenção do número de identificação fiscal (NIF) do CONTRATANTE e (ii) a Abertura de uma
conta bancária em Portugal.</p>

<p><b>DAS ATIVIDADES</b></p>

<p><b>Cláusula 2.a </b> A CONTRATADA, quanto a representação fiscal, tem a responsabilidade de garantir o cumprimento dos deveres
tributários acessórios do CONTRATANTE, como obter o número de identificação fiscal (NIF), entregar declarações, guardar os
documentos comprovativos de despesas e rendimentos e prestar esclarecimentos à Autoridade Tributária e Aduaneira, assim como o
que for especificado na outorga da procuração, com a diligência habitual que se presume da atuação profissional. E, quanto a abertura
de uma conta bancária, tem como responsabilidades a apresentação dos documentos pessoais do CONTRATANTE para a apreciação
do banco, que será escolhido pelo CONTRATANTE, a assinatura dos documentos necessários e o acompanhamento de todo o processo
até a disponibilização dos dados de sua nova conta bancária.</p>
<p><b>Subcláusula 1a</b>. Os poderes conferidos a CONTRATADA como representante fiscal, não implicam para esta qualquer
responsabilidade no que respeita ao conteúdo das declarações fiscais apresentadas, bem como, qualquer responsabilidade no
pagamento de taxas, impostos, multas, coimas ou quaisquer outros pagamentos devidos pelo CONTRATANTE. Já os poderes
conferidos para a abertura de uma conta bancária, não implicam a inclusão da CONTRATADA como procuradora na respectiva conta
bancária. Para a prestação de outros serviços relacionados terá a necessidade da elaboração de um novo Contrato de prestação de
serviços advocatícios, onde será apresentada uma nova proposta de honorários advocatícios e custas.
</p>

<p><b>DAS DESPESAS</b></p>

<b>Cláusula 3.a</b> Todas as despesas efetuadas pela CONTRATADA, mesmo que indiretamente relacionadas com a sua atuação, incluindo-
se cópias, digitalizações, envio de correspondência, e demais gastos de natureza diversa da verba honorária, ficarão às expensas do CONTRATANTE, desde que previamente por ele autorizadas.
Cláusula 4.a Todas as despesas serão acompanhadas de documento comprobatório, devidamente organizado pela CONTRATADA.

<p><b>DOS HONORÁRIOS</b></p>
<b>Cláusula 5a.</b> O CONTRATANTE, como contraprestação aos serviços jurídicos prestados, pagará a CONTRATADA, a título de honorários, o valor de 610,00 € (seiscentos e dez euros), a serem pagos segundo a página 4 deste contrato, sem dedução de taxa cambial, imposto de operações financeiras ou tarifas cobradas para envio de emissão de ordem de pagamento.

<p><b>Subcláusula 1a.</b> O adimplemento dos valores ajustados na presente cláusula será feito mediante pagamento direto a CONTRATADA,
através de depósito em sua conta corrente portuguesa n.o PT50.0018.0003.4284.8986.020.72 e SWIFT TOTAPTPLXXX, no banco
Santander Totta.</p>

<p><b>Parágrafo único</b> Caso haja morte ou incapacidade civil da CONTRATADA, seus sucessores ou representantes legais receberão os
honorários na proporção do trabalho realizado.</p>
<b>Cláusula 6a.</b> Havendo desistência pelo CONTRATANTE, este fato não prejudicará o recebimento de todos os honorários pela
CONTRATADA.
DA VIGÊNCIA
Cláusula 7a. Este contrato tem vigência até o adimplemento das obrigações ajustadas, sendo a renovação da Representação fiscal
anual, e também automática caso não seja denunciado pelas partes.
Subcláusula 1a. No caso de não renovação da representação fiscal, por parte do CONTRATANTE, deverá este apresentar por e-mail,
no ato da denúncia, o comprovativo emitido pela Autoridade Tributária e Aduaneira de residência fiscal em Portugal, de cancelamento
ou de substituição de representante fiscal, com antecedência mínima de 30 dias, da data da próxima renovação contratual, para que
sejam operados os seus efeitos, nomeadamente o termo e a não obrigação de pagamento da verba honorária.
Subcláusula 2a. No caso de não renovação da representação fiscal, por parte da CONTRATADA, deverá esta enviar, no ato da
denúncia, uma comunicação escrita para a última morada do CONTRATANTE, com antecedência mínima de 30 dias, da data da próxima
renovação contratual, para que sejam operados os seus efeitos, nomeadamente o termo e a não obrigação de pagamento da verba
honorária.
Parágrafo único. O representado terá um prazo máximo de 90 dias, a contar da data do aviso de recebimento (AR) da correspondência,
para nomear novo representante fiscal. Neste caso, e apenas nesta circunstância, terá lugar ao pagamento pro rata, isto é, o pagamento
proporcional da verba honorária respeitante aos dias que excederam a última renovação contratual automática.


<p><b>DA RESPONSABILIDADE</b></p>
<b>Cláusula 8a.</b> A CONTRATADA não será responsabilizada por quaisquer danos que sobrevierem das demandas que patrocinar,
cabendo-lhe tão somente o emprego diligente de seus conhecimentos, meios e técnicas para a defesa dos interesses do
CONTRATANTE.
Parágrafo único. A CONTRATADA, como representante fiscal, pode responder por infrações fiscais, mas nunca ter de pagar impostos
devidos por este. Para a CONTRATADA está reservado o direito de reclamação, recurso ou impugnação perante a Autoridade Tributária
e Aduaneira.

<p><b>Cláusula 9a.</b> A CONTRATADA não será responsabilizada acaso resultem danos por não tomar conhecimento de informações e
documentos substanciais para a sua atividade ou em decorrência da impossibilidade de contato com o CONTRATANTE, que deverá
manter atualizadas quaisquer informações relevantes para a demanda, em especial o seu endereço para a entrega de notificações, bem
como as informações cadastrais fornecidas por aquela.</p>

<b>Cláusula 10a.</b> É obrigação do CONTRATANTE, sempre que solicitado, entregar, fornecer ou disponibilizar para a CONTRATADA todos
os documentos necessários, provas, informações e subsídios, em tempo hábil, para que esta possa cumprir o objeto do presente
contrato. Qualquer omissão ou negligência por parte do CONTRATANTE será de sua inteira responsabilidade, caso advenha algum
prejuízo a seus interesses.
DA PROTEÇÃO DE DADOS PESSOAIS

<p><b>Cláusula 11a.</b> Para garantir as boas práticas de proteção de dados pessoais, todos os dados pessoais que forem coletados pela
CONTRATADA, tendo em vista a relação profissional estabelecida, serão tratados exclusivamente com as finalidades propostas e não
serão compartilhados com terceiros, salvo em virtude de lei. Fica assegurada a guarda destes dados pessoais por até 3 anos após o
término da prestação dos serviços, sendo eliminados a partir de então.
DO FORO</p>

<b>Cláusula 12.a</b> Para dirimir quaisquer controvérsias oriundas deste contrato, as partes elegem o foro de Coimbra, Portugal.
Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor.

<p>Em_____________________ aos ______,de ___________________ de 2023.</p>
<p><b>CONTRATADA</b></p>

<div>_______________________________________________________________________________</div>
<div><b>ANDRÉA LEVINDO CARVALHO</b></div>

<p>CONTRATANTE</p>

_______________________________________________________________________________
$nome

FATURA DE PRESTAÇÃO DE SERVIÇOS ADVOCATÍCIOS
NOTA DE HONORÁRIOS, EMOLUMENTOS E CUSTAS

REFERÊNCIA: 10/2023
CONTRATANTE: VICTOR KOLTUNIK FRANÇA
IDENTIFICAÇÃO FISCAL BRASILEIRA (CPF): 938.123.537-68

FORMA DE PAGAMENTO: à vista, no valor total de 610,00 €.

<p><b>CONTRATADA</b></p>

<div>_______________________________________________________________________________</div>
<div>ANDRÉA LEVINDO CARVALHO</div>

<br>
<p><b>CONTRATANTE</b></p>

<div>_______________________________________________________________________________</div>
<div>$nome</div>

");

$mpdf->AddPage('P'); // Adds a new page in Landscape orientation
$mpdf->WriteHTML('Hello World');

$mpdf->Output();




