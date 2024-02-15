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
