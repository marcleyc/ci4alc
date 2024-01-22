<?php

//require_once __DIR__ . '../vendor/autoload.php';
require('../vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf([
    'pagenumPrefix' => 'Página ',
    'pagenumSuffix' => ' / ',
    'nbpgPrefix' => '',
    'nbpgSuffix' => ''
]);

//$mpdf->SetHeader('ALC ADVOCACIA');
$mpdf->SetFooter('{PAGENO}{nbpg}');

$title = "Marcley";
$cliente = "VICTOR KOLTUNIK FRANÇA";
$mpdf->WriteHTML("

<CENTER><p>CONTRATO DE PRESTAÇÃO DE SERVIÇOS ADVOCATÍCIOS</p></CENTER>

<p>CONTRATANTES: $cliente, casado, prático de navios, brasileiro, portador do passaporte n.o GG589069, emitido pela República Federativa do Brasil e válido até 30/03/2033, $ identificação fiscal (CPF) sob o n.o 058.419.127-80, residente em av.Antonio Borges, n.o 80, apartamento 1302, Ed Grand Bay, 29065-250 Mata da Praia, Vitória/ES, Brasil e endereço eletrônico em victorkfranca@gmail.com.</p> 

CONTRATADA: ANDRÉA LEVINDO CARVALHO, casada, advogada, brasileira, inscrita na Ordem dos Advogados sob o n.o 57281C, identificação fiscal (NIF) sob o n.o 289418054, com endereço profissional em Praça da República, n.o 8 - 2 F, 3150-127 Condeixa-a-Nova, Coimbra, Portugal, e endereços eletrônicos em andrealevindo@gmail.com e andrea-57281c@adv.oa.pt.'

As partes acima identificadas têm, entre si, justo e acertado o presente Contrato de Prestação de Serviços Advocatícios, que se regerá
pelas cláusulas e pelas condições a seguir descritas.
<p>DO OBJETO DO CONTRATO Cláusula 1.a</p>
O presente contrato tem como objeto a prestação de serviços advocatícios para a defesa dos interesses do CONTRATANTE, especificadamente em relação à representação junto à Autoridade Tributária e Aduaneira e a uma instituição bancária
em Portugal.
Parágrafo único. Os objetivos específicos desta contratação são: (i) a Representação Fiscal de singular, SEM gestão de bens e de
direitos, e procuradoria jurídica, com a obtenção do número de identificação fiscal (NIF) do CONTRATANTE e (ii) a Abertura de uma
conta bancária em Portugal.
<p>DAS ATIVIDADES Cláusula 2.a</p>
A CONTRATADA, quanto a representação fiscal, tem a responsabilidade de garantir o cumprimento dos deveres
tributários acessórios do CONTRATANTE, como obter o número de identificação fiscal (NIF), entregar declarações, guardar os
documentos comprovativos de despesas e rendimentos e prestar esclarecimentos à Autoridade Tributária e Aduaneira, assim como o
que for especificado na outorga da procuração, com a diligência habitual que se presume da atuação profissional. E, quanto a abertura
de uma conta bancária, tem como responsabilidades a apresentação dos documentos pessoais do CONTRATANTE para a apreciação
do banco, que será escolhido pelo CONTRATANTE, a assinatura dos documentos necessários e o acompanhamento de todo o processo
até a disponibilização dos dados de sua nova conta bancária.
Subcláusula 1a. Os poderes conferidos a CONTRATADA como representante fiscal, não implicam para esta qualquer
responsabilidade no que respeita ao conteúdo das declarações fiscais apresentadas, bem como, qualquer responsabilidade no
pagamento de taxas, impostos, multas, coimas ou quaisquer outros pagamentos devidos pelo CONTRATANTE. Já os poderes
conferidos para a abertura de uma conta bancária, não implicam a inclusão da CONTRATADA como procuradora na respectiva conta
bancária. Para a prestação de outros serviços relacionados terá a necessidade da elaboração de um novo Contrato de prestação de
serviços advocatícios, onde será apresentada uma nova proposta de honorários advocatícios e custas.

ESCRITÓRIO DE ADVOCACIA
Praça da República n.o 8, 2 F
3150-127 Condeixa-a-Nova, Coimbra, Portugal

Advogada Andréa L Carvalho - C.P.: 57281C | +351 911 992 069 | andrealevindo@gmail.com

DAS DESPESAS

Cláusula 3.a Todas as despesas efetuadas pela CONTRATADA, mesmo que indiretamente relacionadas com a sua atuação, incluindo-
se cópias, digitalizações, envio de correspondência, e demais gastos de natureza diversa da verba honorária, ficarão às expensas do

CONTRATANTE, desde que previamente por ele autorizadas.
Cláusula 4.a Todas as despesas serão acompanhadas de documento comprobatório, devidamente organizado pela CONTRATADA.
DOS HONORÁRIOS
Cláusula 5a. O CONTRATANTE, como contraprestação aos serviços jurídicos prestados, pagará a CONTRATADA, a título de
honorários, o valor de 610,00 € (seiscentos e dez euros), a serem pagos segundo a página 4 deste contrato, sem dedução de taxa
cambial, imposto de operações financeiras ou tarifas cobradas para envio de emissão de ordem de pagamento.
Subcláusula 1a. O adimplemento dos valores ajustados na presente cláusula será feito mediante pagamento direto a CONTRATADA,
através de depósito em sua conta corrente portuguesa n.o PT50.0018.0003.4284.8986.020.72 e SWIFT TOTAPTPLXXX, no banco
Santander Totta.
Parágrafo único. Caso haja morte ou incapacidade civil da CONTRATADA, seus sucessores ou representantes legais receberão os
honorários na proporção do trabalho realizado.
Cláusula 6a. Havendo desistência pelo CONTRATANTE, este fato não prejudicará o recebimento de todos os honorários pela
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

ESCRITÓRIO DE ADVOCACIA
Praça da República n.o 8, 2 F
3150-127 Condeixa-a-Nova, Coimbra, Portugal

Advogada Andréa L Carvalho - C.P.: 57281C | +351 911 992 069 | andrealevindo@gmail.com

DA RESPONSABILIDADE
Cláusula 8a. A CONTRATADA não será responsabilizada por quaisquer danos que sobrevierem das demandas que patrocinar,
cabendo-lhe tão somente o emprego diligente de seus conhecimentos, meios e técnicas para a defesa dos interesses do
CONTRATANTE.
Parágrafo único. A CONTRATADA, como representante fiscal, pode responder por infrações fiscais, mas nunca ter de pagar impostos
devidos por este. Para a CONTRATADA está reservado o direito de reclamação, recurso ou impugnação perante a Autoridade Tributária
e Aduaneira.
Cláusula 9a. A CONTRATADA não será responsabilizada acaso resultem danos por não tomar conhecimento de informações e
documentos substanciais para a sua atividade ou em decorrência da impossibilidade de contato com o CONTRATANTE, que deverá
manter atualizadas quaisquer informações relevantes para a demanda, em especial o seu endereço para a entrega de notificações, bem
como as informações cadastrais fornecidas por aquela.
Cláusula 10a. É obrigação do CONTRATANTE, sempre que solicitado, entregar, fornecer ou disponibilizar para a CONTRATADA todos
os documentos necessários, provas, informações e subsídios, em tempo hábil, para que esta possa cumprir o objeto do presente
contrato. Qualquer omissão ou negligência por parte do CONTRATANTE será de sua inteira responsabilidade, caso advenha algum
prejuízo a seus interesses.
DA PROTEÇÃO DE DADOS PESSOAIS
Cláusula 11a. Para garantir as boas práticas de proteção de dados pessoais, todos os dados pessoais que forem coletados pela
CONTRATADA, tendo em vista a relação profissional estabelecida, serão tratados exclusivamente com as finalidades propostas e não
serão compartilhados com terceiros, salvo em virtude de lei. Fica assegurada a guarda destes dados pessoais por até 3 anos após o
término da prestação dos serviços, sendo eliminados a partir de então.
DO FORO
Cláusula 12.a Para dirimir quaisquer controvérsias oriundas deste contrato, as partes elegem o foro de Coimbra, Portugal.
Por estarem assim justos e contratados, firmam o presente instrumento, em duas vias de igual teor.

Em_____________________ aos ______,de ___________________ de 2023.
CONTRATADA

_______________________________________________________________________________
ANDRÉA LEVINDO CARVALHO
CONTRATANTE

_______________________________________________________________________________
VICTOR KOLTUNIK FRANÇA

ESCRITÓRIO DE ADVOCACIA
Praça da República n.o 8, 2 F
3150-127 Condeixa-a-Nova, Coimbra, Portugal

Advogada Andréa L Carvalho - C.P.: 57281C | +351 911 992 069 | andrealevindo@gmail.com

FATURA DE PRESTAÇÃO DE SERVIÇOS ADVOCATÍCIOS
NOTA DE HONORÁRIOS, EMOLUMENTOS E CUSTAS

REFERÊNCIA: 10/2023
CONTRATANTE: VICTOR KOLTUNIK FRANÇA
IDENTIFICAÇÃO FISCAL BRASILEIRA (CPF): 938.123.537-68

FORMA DE PAGAMENTO: à vista, no valor total de 610,00 €.

CONTRATADA

_______________________________________________________________________________
ANDRÉA LEVINDO CARVALHO

CONTRATANTE

_______________________________________________________________________________
VICTOR KOLTUNIK FRANÇA
");

$mpdf->Output();

