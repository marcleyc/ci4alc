<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="author" content="Marcley"/>
	<meta name="created" content="2022-11-08T16:11:00"/>	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="bootstrap.min.css" />
</head>
<body>
<div title="header"><p align="center" style="margin-bottom: 0.5cm" class="mt-2">
<img src="<?php echo base_url("assets/img/logo-50.png") ?>" name="Imagem 1" align="center" width="50" height="50" border="0" />
<h7>FICHA DE CADASTRO</h7></p>	
	
<div class="container" style="width: 58rem;">
	<i>Os dados pessoais informados serão tratados em conformidade com as disposições legais aplicáveis em matéria de proteção de dados.</i></br></br>
	<form class="row row-cols-lg-auto g-3 align-items-center" method="post" action="<?php echo base_url("/clientecad") ?>">
		<div class="col-12">
		  <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
		  
		  <div class="input-group input-group-sm">
			<div class="input-group-text">Nome Completo</div><input type="text" class="form-control" name="nome" placeholder="nome" required />
		  </div>
		  
		  <div class="input-group input-group-sm">
			<div class="input-group-text">Naturalidade</div><input type="text" class="form-control" name="naturalidade" placeholder="naturalidade" required />
			<div class="input-group-text">Nacionalidade</div><input type="text" class="form-control" name="nacionalidade" placeholder="nacionalidade" required />
		  </div>

		  <div class="input-group input-group-sm">
			<div class="input-group-text">Data de nascimento </div><input type="date" class="form-control" name="nascimento" placeholder="nascimento" required />
			<label class="input-group-text" for="inputGroupSelect01">Sexo</label>
			<select class="form-select" name="sexo" required>
			  <option selected>selecione</option>
			  <option value="M">M</option>
			  <option value="F">F</option>
			</select>
		  </div>

		  <div class="input-group input-group-sm">
			<div class="input-group-text">Nome do pai</div><input type="text" class="form-control" name="pai" placeholder="pai" />
		  </div>

		  <div class="input-group input-group-sm">
			<div class="input-group-text">Nome do mãe</div><input type="text" class="form-control" name="mãe" placeholder="mãe" required />
		  </div>
		  
		  <div class="input-group input-group-sm">
			<label class="input-group-text" for="inputGroupSelect01">Identidade</label>
			<select class="form-select" name="ident-tipo" required>
			  <option selected>tipo</option>
			  <option value="1">Passaporte</option>
			  <option value="2">CNH</option>
			  <option value="2">RG</option>
			</select>
			<span class="input-group-text" name="ident-num">n.º</span>
			<input type="text" class="form-control" placeholder="número" aria-label="Server">
			<span class="input-group-text" name="emissao">emissão</span>
			<input type="date" class="form-control" placeholder="e-mail" aria-label="Server">
			<span class="input-group-text" name="validade">validade</span>
			<input type="date" class="form-control" placeholder="e-mail" aria-label="Server">
		  </div>

		  <div class="input-group input-group-sm">
			<label class="input-group-text" for="inputGroupSelect01">Orgão emissor</label>
            <input type="text" class="form-control" placeholder="orgão emissor" aria-label="Server">
			<label class="input-group-text" for="inputGroupSelect01">CPF n.º</label>
			<input type="text" class="form-control" pattern="^\d{3}\.\d{3}\.\d{3}\-\d{2}$" id="cpf" name="cpf" placeholder="CPF" required />				
		  </div>

		  <div class="input-group input-group-sm">
			<div class="input-group-text">Endereço completo</div><input type="text" class="form-control" name="endereco" placeholder="endereço" required />
		  </div>

		  <div class="input-group input-group-sm">
			<span class="input-group-text">CEP</span>
			<input type="text" pattern="^\d{2}\d{3}[-]\d{3}$" class="form-control cep-mask" placeholder="CEP" name="cep" aria-label="Username" required>
			<span class="input-group-text">@ e-mail</span>
			<input type="email" class="form-control" placeholder="e-mail" name="email" aria-label="Server" required>
		  </div>
        
		  <div class="input-group input-group-sm">
			<div class="input-group-text">Celular</div><input type="text" class="form-control" name="celular" placeholder="celular" required />
			<div class="input-group-text">Profissão</div><input type="text" class="form-control" name="profissao" placeholder="profissão" />
		  </div>

		  <div class="input-group input-group-sm">
			<label class="input-group-text" for="inputGroupSelect01">Estado civil</label>
			<select class="form-select" name="estado-civ" id="inputGroupSelect01" required>
			  <option selected>selecione...</option>
			  <option value="1">solteiro(a)</option>
			  <option value="2">casado(a) 1ºcasamento </option>
			  <option value="3">casado(a) 2º ou demais casamentos </option>
			  <option value="4">união estável</option>
			  <option value="4">divorciado(a)</option>
			  <option value="4">viúvo(a)</option>
			</select>
			<span class="input-group-text">Têm filhos? Quantos? Idades?</span>
			<input type="text" class="form-control" placeholder="quantidade" aria-label="Server">			
		  </div>
          
		  <div class="input-group input-group-sm">
			<div class="input-group-text">Como soube dos nossos serviços?</div><input type="text" class="form-control" />
		  </div>

		  <div class="input-group input-group-sm">
			<div class="input-group-text">Qual o seu principal objetivo com a contratação dos nossos serviços?</div>
			<input type="text" class="form-control" placeholder="objetivo" required />
		  </div>

		</br>    	  
		<div class="col-12">
		  <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
		</div>
	  </form>
	</br> 

	<p style="text-align: justify; font-size: 14px"> <i> Designadamente o Regulamento (UE) 2016/679 do Parlamento Europeu e do Conselho de 27 de abril de 2016
		 relativo à proteção das pessoas singulares no que diz respeito ao tratamento de dados pessoais e à livre
		 circulação desses dados e que revoga a Diretiva 95/46/CE (Regulamento Geral sobre a Proteção de Dados ou “RGPD”)
		 e a Lei n.º 58/2019, de 8 de agosto que assegura a execução, na ordem jurídica portuguesa, do RGPD (“Lei n.º 58/2019”).</i>
	</p>

		<div style="text-align: center; font-family:courier,arial,helvetica">
		    <span>ALC ADVOCACIA</span></br>
		    <span>Praça da República n.º 8, 2.º - Fração F</span></br> 
		    <span>3150-127 Condeixa-a-Nova, Coimbra, Portugal</span>
		</div>
		
		<p style="text-align: center; font-family: 'Times New Roman', Times, serif; font-size: 17px" class="mt-3" >
			Advogada Andréa L Carvalho | +351 911 992 069 | andrealevindo@gmail.com
		</p>

</div>

<script>
	// -------------------------------------------------- validação de CPF --------------------------------
	let value_cpf = document.querySelector('#cpf');

		value_cpf.addEventListener("keydown", function(e) {
		if (e.key > "a" && e.key < "z") {
			e.preventDefault();
		}
		});

		value_cpf.addEventListener("blur", function(e) {
			//Remove tudo o que não é dígito
			let validar_cpf = this.value.replace( /\D/g , "");

			//verificação da quantidade números
			if (validar_cpf.length==11){

			// verificação de CPF valido
			var Soma;
			var Resto;

			Soma = 0;
			for (i=1; i<=9; i++) Soma = Soma + parseInt(validar_cpf.substring(i-1, i)) * (11 - i);
				Resto = (Soma * 10) % 11;

			if ((Resto == 10) || (Resto == 11))  Resto = 0;
			if (Resto != parseInt(validar_cpf.substring(9, 10)) ) return alert("CPF Inválido!");;

			Soma = 0;
			for (i = 1; i <= 10; i++) Soma = Soma + parseInt(validar_cpf.substring(i-1, i)) * (12 - i);
			Resto = (Soma * 10) % 11;

			if ((Resto == 10) || (Resto == 11))  Resto = 0;
			if (Resto != parseInt(validar_cpf.substring(10, 11) ) ) return alert("CPF Inválido!");;

			//formatação final
			cpf_final = validar_cpf.replace( /(\d{3})(\d)/ , "$1.$2");
			cpf_final = cpf_final.replace( /(\d{3})(\d)/ , "$1.$2");
			cpf_final = cpf_final.replace(/(\d{3})(\d{1,2})$/ , "$1-$2");
			document.getElementById('cpf').value = cpf_final;

			} else {
			alert("CPF Inválido! É esperado 11 dígitos numéricos.")
			}   

        })
</script>
</body>
</html>