<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
        
    <!-- bootstrap css" --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>RECIBO</title>
</head>

<body class="">
<h1 style="text-align: center;" class="mt-3">RECIBO my</h1>

<div class="container overflow-hidden" id="invoice-app">    
    <!-- ------------------------------------------------------ first row -->
    <div class="container text-right">
        <div class="row gx-3">
          <div class="col">
           <div class="p-2 rounded border border-muted shadow-sm" style="line-height: 200%;" >  <!--------------------- first content column -->
            <p>Date:  <input type="date" v-model="ci.dataf" class="border border-muted rounded p-1 mb-1 border-opacity-25 mr-3">
            Código do cliente:  <input type="number" v-model="ci.idc" class="border border-muted rounded m-2 p-1 mb-1 border-opacity-25"></p>
            <p>Nome do cliente:  <input type="string" v-model="ci.nome" class="border border-muted rounded p-1 mb-1 border-opacity-25">{{ items.nome }}</p>
            <p>Parceria:  <input type="string" v-model="ci.parceria" class="border border-muted rounded p-1 mb-1 border-opacity-25"></p>
            <p>Obs:  <input type="string" v-model="ci.obs" class="border border-muted rounded p-1 mb-1 border-opacity-25"></p>
           </div>
          </div>
          <div class="col">
            <div class="p-5 rounded border border-muted shadow-sm" style="line-height: 148%;"> <!--------------------- second content column -->
                <p>Número do recibo:  <input type="number" v-model="ci.id" class="border border-muted rounded m-2 p-1 mb-1 border-opacity-25"></p>
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td class="border-muted rounded"> {{ decimalDigits(subTotal) }}</td>
                    </tr>
                    <tr>
                        <td><div class="cell-with-input">Discount <input class="text-right border-muted border-opacity-25 rounded" type="number" min="0" max="100" v-model="discountRate" />%</div></td>
                        <td>{{ decimalDigits(discountTotal) }}</td>
                    </tr>
                    <tr>
                        <td><div class="cell-with-input">Tax <input class="text-right border-muted border-opacity-25 rounded" type="number" min="0" max="100" v-model="taxRate" />%</div></td>
                        <td>{{ decimalDigits(taxTotal) }}</td>
                    </tr>
                    <tr class="text-bold border-muted border-opacity-25 rounded">
                        <td>Grand Total</td>
                        <td>{{ decimalDigits(grandTotal) }}</td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>

      <div class="container text-center"> <!-- ------------------------------ second row -->
        
      </div>      
     
    <div class="container overflow-hidden" id="invoice-app">
        
            <!--  ---------------------------------------------------------------------------------------------------------  -->
            <table class="responsive-table mt-4"> 
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>IdRec</th>
                        <th>Serviços</th>
                        <th>Nome</th>
                        <th>Honorários</th>
                        <th>Custas</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tr v-for="item in items">
                    <td data-label="ID" width="5%"><input type="number" v-model="item.id" /> </td>
                    <td data-label="idRec" class="w-1"><input type="number" v-model="item.idRec" /> </td>
                    <td data-label="servicos"><input type="text" v-model="item.servicos" /> </td>
                    <td data-label="nome"><input type="text" v-model="item.nome" /> </td>
                    <td data-label="honorarios"><input type="number" min="0" v-model="item.honorarios" /> </td>
                    <td data-label="Custas"><input type="number" v-model="item.custas" /> </td>
                    <td data-label="Total">{{ decimalDigits(item.honorarios + item.custas) }}</td>
                    <td class="text-right"><button class="btn btn-danger btn-sm mt-2" v-on:click="deleteItem('item.id')">Delete item</button></td>
                </tr>
            </table>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1">modal 1</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal2"> modal 2 </button>
            <button v-on:click="addNewItem" class="btn btn-primary btn-sm mt-1 rounded-pill mt-3">Add item</button>
            <button v-on:click="printInvoice" class="btn btn-secondary btn-sm mt-1 rounded-pill mt-3">Print Invoice</button>
            <button v-on:click="printInvoice" class="btn btn-secondary btn-sm mt-1 rounded-pill mt-3">Mostrar dados</button>    
        </div>

        
    </main>
</div>    
</div>   <!-- nome honorarios custas total locals inicio -->

<script>
    const url = "https://jsonplaceholder.typicode.com/posts"
    const url2 = "http://localhost:8080/index.php/clientesapix2/200"
    const json = fetch(url2)
    .then(resposta => resposta.json())
    .then(dados=>{console.log("1o",dados)})
    
    const dois = fetch(url)
    .then(datas => {return datas.json();})
    .then(post => {console.log("2o",post);})
    
</script>    

<script>
// https://codepen.io/vinceumo/pen/qKPzjL  
 
 document.addEventListener('DOMContentLoaded', function(){ 
    var app = new Vue({
        el: '#invoice-app',
        data: {
            ci: JSON.parse('<?php echo json_encode($recibo[0]) ?>'),
            invoiceCurrency: {
                "symbol": "€",
                "name": "Euro",
                "symbol_native": "€",
                "decimal_digits": 2,
                "rounding": 0,
                "code": "EUR",
                "name_plural": "Euros"
            },
            taxRate: 20,
            discountRate: 0,
            items: [{ id:10, idRec:20, servicos:'nacionalidade', nome:'manuel',honorarios:500, custas: 200, total: 0, locals: 'coimbra'},],
            currencies: currenciesData,
            company: {
                name: 'ALC Advocacia',
                contact: 'Your address\nYour tel\nYour email'
            },
            client: 'Client information',
            invoiceDate: ''
        },
        methods: {
            addNewItem: function() {
                this.items.push({ id:10, idRec:20, servicos:'nacionalidade', nome:'manuel',honorarios:500, custas: 200, total: 0 })
            },
            deleteItem: function(index) {
                this.items.splice(index, 1)
            },
            decimalDigits: function(value) {
                return this.invoiceCurrency.symbol + ' ' + value.toFixed(this.invoiceCurrency.decimal_digits);
            },
            printInvoice: function() {
                window.print();
            },
            adjustTextAreaHeight: function(event){
                var el = event.target;
                el.style.height = "1px";
                el.style.height = (25+el.scrollHeight)+"px";
            }
            
        },
        computed: {
            subTotal: function() {
                var total = this.items.reduce(function(accumulator, item) { return accumulator + (item.honorarios * item.custas);}, 0)
                return total;
            },
            discountTotal: function() {
                var total = this.subTotal * (this.discountRate / 100);
                return total;
            },
            taxTotal: function() {
                var total = (this.subTotal - this.discountTotal) * (this.taxRate / 100);
                return total;
            },
            grandTotal: function() {
                var total = (this.subTotal - this.discountTotal) + this.taxTotal;
                return total;
            }
        }
    });
}, false);

var currenciesData=[{"symbol":"$","name":"US Dollar","symbol_native":"$","decimal_digits":2,"rounding":0,"code":"USD","name_plural":"US dollars"},{"symbol":"R$","name":"Brazilian Real","symbol_native":"R$","decimal_digits":2,"rounding":0,"code":"BRL","name_plural":"Canadian dollars"},{"symbol":"€","name":"Euro","symbol_native":"€","decimal_digits":2,"rounding":0,"code":"EUR","name_plural":"euros"},];

</script>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Sign up</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="mi-name" class="form-control" />
                        <label class="form-label" for="name2">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="mi-email" class="form-control" />
                        <label class="form-label" for="email2">Email address</label>
                    </div>

                    <!-- password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="mi-password" class="form-control" />
                        <label class="form-label" for="password2">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal grande -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Modal grande</button>

<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-body p-4">
        <form>
            <!-- Name input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="name2">Name</label>  
                <input type="text" id="me-name" class="form-control" />   
            </div>

            <!-- Email input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="email2">Email address</label>
                <input type="email" id="me-email" class="form-control" />
            </div>

            <!-- password input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="password2">Password</label>
                <input type="text" id="me-password" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
            </form>
        </div>            
    </div>
  </div>
</div>
<!-- Modal grande -->

</body>
</html>