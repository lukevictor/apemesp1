@extends('admin.dashboard')

@section('titulo', 'Cadastro e Edição de dados pessoais')

@section('extrastyle')


  {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}


@endsection

@section('conteudo')

<form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ url('/associado/dadospessoais')}}">

	{{ csrf_field() }}
		<fieldset>

				
				<legend>Dados Pessoais</legend>
				<!-- Aviso sobre o tipo de arquivo -->
					<div class="form-group">
						<div class="col-md-4"></div>
						  <div class="col-md-4 alert alert-info alert-dismissable" role="alert">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  	<strong>Por favor.</strong> Carregue a imagem abaixo no formato JPG.
						  </div>
					 </div>

				<!-- Botão de Arquivo --> 
					<div class="form-group" id="mensagem">
					  <label class="col-md-4 control-label" for="filebutton">Foto do perfil: </label>
					  <div class="col-md-4">
					    <input id="foto" name="foto" class="input-file" type="file"> 
					  </div>
					</div>
				<!-- Campo Nome -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="name">Nome Completo:</label>  
					  <div class="col-md-4">
					  <input id="name" name="name" type="text" placeholder="Nome" class="form-control input-md" required="">
					  </div>
					</div>

				<!-- Campo Nascimento -->
					<div class="form-group">
			
                <label class="col-md-4 control-label" for="nascimento">Data de Nascimento:</label>
                <div class="col-md-4">
                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="nascimento" data-link-format="yyyy-mm-dd">
                    <input name="nascimento" id="nascimento" class="form-control" type="text" value="" readonly="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                </div>
      			  </div>
        
					

				<!-- Nascionalidade -->

					<div class="form-group">
					  <label class="col-md-4 control-label" for="nacionalidade">Nacionalidade</label>
					  <div class="col-md-4">
					    <select id="nacionalidade" name="nacionalidade" class="form-control">
					    @foreach($nacionalidades as $nacionalidade)
					      <option value="{{ $nacionalidade->id }}">{{ $nacionalidade->nacionalidade }}</option>
					     @endforeach
					    </select>
					  </div>
					</div>


					<!-- RG -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="rg">RG:</label>  
					  <div class="col-md-4">
					  <input id="rg" name="rg" type="text" maxlength="12" placeholder="Registro Geral" class="form-control input-md" required="">
					  </div>
					</div>

					<!-- CPF -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="cpf">CPF:</label>  
					  <div class="col-md-4">
					  <input id="cpf" name="cpf" type="text" onkeyup="somenteNumeros(this);" maxlength="11" placeholder=" CPF (somente numeros) " class="form-control input-md" required="">
					  </div>
					</div>

				

				<legend>Dados de contato</legend>

				<div class="form-group">
					  <label class="col-md-4 control-label" for="facebook"><span class="fa fa-facebook"></span></label>  
					  <div class="col-md-4">
					  
					  <input id="facebook" name="facebook" type="text" placeholder="facebook.com/seuperfil" class="form-control">
					  
					  </div>
					</div>

				<!-- Campo LinkedIn -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="linkedin"><span class="fa fa-linkedin"></span></label>  
					  <div class="col-md-4">
					  <input id="ies" name="ies" type="text" placeholder="linkedin.com/in/seuperfil" class="form-control input-md">
					  </div>
					</div>

				<!-- CEP -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="cep">CEP:</label>  
					  <div class="col-md-4">
					  <input id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="">
					  </div>
					</div>

				<!-- Endereço -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="endereco">Endereço:</label>  
					  <div class="col-md-4">
					  <input id="endereco" name="endereco" type="text" placeholder=" Endereço " class="form-control input-md" required="">
					  </div>
					</div>

				<!-- Complemento -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="complemento">Complemento:</label>  
					  <div class="col-md-4">
					  <input id="complemento" name="complemento" type="text" placeholder=" Compl. " class="form-control input-md">
					  </div>
					</div>

				<!-- Bairro -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="bairro">Bairro:</label>  
					  <div class="col-md-4">
					  <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control input-md" required="">
					  </div>
					</div>

				

				<!-- Estado -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="selectbasic">Estado</label>
					  <div class="col-md-4">
					    <select id="estado" name="estado" class="form-control">
					    @foreach($estados as $estado)
					      <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
					     @endforeach
					    </select>
					  </div>
					</div>

				<!-- Cidade -->
					<div class="form-group">
					 <label class="col-md-4 control-label" for="selectbasic">Cidade</label>
					  <div class="col-md-4">
					    <select id="cidade" name="cidade" class="form-control">
					   	@foreach($cidades as $cidade)
					      <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
					     @endforeach
					   	</select>
					  </div>
					</div>

				<legend>Numeros de Telefones</legend>

				<!-- Comercial -->
					<div class="form-group">
					 <label class="col-md-4 control-label" for="selectbasic">Tel. Comercial</label>
					  <div class="col-md-4">
					    <input id="tel_comercial" name="tel_comercial" onkeyup="somenteNumeros(this);" maxlength="11" class="form-control">
					   	

					  </div>
					</div>

				<!-- Celular -->
					<div class="form-group">
					 <label class="col-md-4 control-label" for="selectbasic">Tel. Celular</label>
					  <div class="col-md-4">
					    <input id="tel_celular" name="tel_celular" onkeyup="somenteNumeros(this);" maxlength="11" class="form-control" required="">
					   
					  </div>
					</div>

				<!-- Residencial -->
					<div class="form-group">
					 <label class="col-md-4 control-label" for="selectbasic">Tel. Residêncial</label>
					  <div class="col-md-4">
					    <input id="tel_residencial" name="tel_residencial" onkeyup="somenteNumeros(this);" maxlength="11" class="form-control">
					  </div>
					</div>


				<!-- Botão -->
					<div class="form-group">
					  
					  <div class="col-md-4">
					    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
					  </div>
					</div>


		</fieldset>
</form>





@endsection


@section('extrascript')

<script type="text/javascript">
	var i = 0;
	$('#foto').on('change',function () {
            var foto = $(this).val();
            var formato = '';
            var limite = foto.length - 3;
            while(limite < foto.length)
            {
            	formato = formato + foto[limite];
            	limite++;
            }
      		
      		if(formato != 'jpg'){
  
      			if(i < 1){
      			$("#mensagem").append('<div id="fotomensagem" class=" alert alert-danger" role="alert"><strong>Cuidado:</strong> Esta imagem não é do tipo JPG</div>');
      			i++;
      		}
      			$("#foto").val('');
      		}else{
      			document.getElementById("fotomensagem").remove();
      		}
      		
        });
</script>



<script type = "text/javascript" language = "javascript">
        $('#estado').on('change',function () {
            var idEstado = $(this).val();
            $.get('/associado/ajax/' + idEstado, function (cidades) {
                 $('#cidade').empty();
            var i =0;
      
                $.each(cidades, function (key, cidade) {
                	
                	var size = cidade.length;
                	while(i < size){
                		$('#cidade').append('<option value=' + cidade[i].id + '>' + cidade[i].nome + '</option>');
                		i++;
                	}          
                   
                });
            });
        });
      </script>	

<!--validar o campo somente numeros -->
<script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
 </script>


       <!-- Adicionando Javascript para busca de CEP -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
               
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("http://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);

                      		  $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
       </script>

@endsection