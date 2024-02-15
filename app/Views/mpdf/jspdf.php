<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <!-- script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script -->
    <title>Document</title>
</head>
<body>

Olºa
    
</body>
</html>

<script>
var name = prompt('What is your name?');
var multiplier = prompt('Enter a number:');
multiplier = parseInt(multiplier);

var doc = new jsPDF();
doc.setFontSize(22);	
doc.text(20, 20, 'Questions');
doc.setFontSize(16);
doc.text(20, 30, 'This belongs to: ' + name);

for(var i = 1; i <= 12; i ++) {
	doc.text(20, 30 + (i * 10), i + ' x ' + multiplier + ' = ___');
}

doc.addPage();
doc.setFontSize(22);
doc.text(20, 20, 'Answers');
doc.setFontSize(16);

for(var i = 1; i <= 12; i ++) {
	doc.text(20, 30 + (i * 10), i + ' x ' + multiplier + ' = ' + (i * multiplier));
}
doc.save('two-by-four.pdf')	
doc.output('datauri');
</script>