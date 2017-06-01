<?php

require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

$obj = new AtendimentoController();
$reinvidicacao = new ReinvidicacaoController();
$reinvidicacao->extraSelect = 'WHERE deletado = 1';
$reinvidicacao->selectDB($reinvidicacao);
$resposta = new RespostaController(); ?>


<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="#"><?php echo EMPRESA; ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<li>
					<a href="<?php echo BASE_URL; ?>principal">Ouvidoria</a>
				</li>

				<li class="active">
					<a href="<?php echo BASE_URL; ?>acompanhe">Acompanhe seu atendimento aqui</a>
				</li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<!--
						<a href="<?php echo BASE_URL; ?>logout"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Administrativo <span class="sr-only">(current)</span></a>
					-->
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12 main">
		<?php switch ($action) { case "index": ?>
			<h2 class="sub-header">Consulte o andamento de sua manifestação</h2>

			<div class="row">
				<div class="col-md-7">
				<?php	if(isset($_POST['buscar'])){
							if((isset($_POST['insert_protocolo'])) and (!empty($_POST['insert_protocolo']))){
								$obj->extraSelect = 'WHERE protocolo = "' . $_POST['insert_protocolo'] . '"';
								$obj->selectDB($obj);

								if($obj->row == 1){
									$manifesto = $obj->dataReturn();

									Redirect($view . '/manifesto?p=' . $manifesto->protocolo);
								} else {
				?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span>Número de protocolo não localizado.</span>
					</div>
				<?php			}
							} else {
				?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span>Número de protocolo não informado.</span>
					</div>
				<?php		}
						}
				?>
				</div>
			</div>

			<form method="post" action="<?php echo BASE_URL . $view; ?>">
				<div class="row">
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" class="form-control" id="IptProtocolo" name="insert_protocolo" placeholder="Insira o número de protocolo aqui" autocomplete="off">

							<span class="input-group-btn">
								<button type="submit" class="btn btn-success btn">Consultar</button>
							</span>
						</div>
					</div>
					<div class="col-md-3">
						<a href="<?php echo BASE_URL; ?>" class="btn btn-info btn-block">Fazer uma manifestação</a>
					</div>
				</div>

				<input type="hidden" name="buscar" value="true">
			</form>
		</div>

<?php break; case "manifesto":
				if((isset($_GET['p'])) and (!empty($_GET['p']))){
					$obj->extraSelect = 'WHERE protocolo = "' . $_GET['p'] . '"';
					$obj->selectDB($obj);

					if($obj->row == 1){
						$manifesto = $obj->dataReturn();
?>
	<div class='well' style='background: #fbfbfb; padding-top:0'>
    	<h3 style='margin-bottom: 20px'><small>informações pessoais</small></h3>
    	<div class='row'>
    		<div class='col-md-8'>
    			<div class="form-group">
    				<label for="IptNome"><span style="color: red">*</span> Nome Completo</label>
    				<input type="text" class="form-control" id="IptNome" value="<?php echo $manifesto->info_nome; ?>" disabled>
    			</div>
    		</div>

			<div class='col-md-4'>
    			<div class="form-group">
    				<label for="IptCPF"><span style="color: red">*</span> CPF</label>
    				<input type="text" class="form-control" id="IptCPF" value="<?php echo $manifesto->info_cpf; ?>" disabled>
    			</div>
    		</div>
    	</div>

		<div class='row'>
    		<div class='col-md-6'>
    			<div class="form-group">
    				<label for="IptEmail"><span style="color: red">*</span> E-mail</label>
    				<input type="email" class="form-control" id="IptEmail" value="<?php echo $manifesto->info_email; ?>" disabled>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptTelefone"><span style="color: red">*</span> Telefone Fixo</label>
    				<input type="text" class="form-control" id="IptTelefone" value="<?php echo $manifesto->info_telefone; ?>" disabled>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptCelular"><span style="color: red">*</span> Telefone Celular</label>
    				<input type="text" class="form-control" id="IptCelular" value="<?php echo $manifesto->info_celular; ?>" disabled>
    			</div>
    		</div>
    	</div>
    </div>

    <div class='well' style='background: #fbfbfb; padding-top:0'>
    	<h3 style='margin-bottom: 20px'><small>informações de endereço</small></h3>
    	<div class='row'>
    		<div class='col-md-4'>
    			<div class="form-group">
    				<label for="IptEstado"><span style="color: red">*</span> Estado</label>
    				<select class="form-control" id="IptEstado" name="insert_estado" disabled>
    					<option value="AC">[ AC ] ACRE</option>
    					<option value="AL">[ AL ] ALAGOAS</option>
    					<option value="AM">[ AM ] AMAZONAS</option>
    					<option value="AP">[ AP ] AMAPÁ</option>
    					<option value="BA">[ BA ] BAHIA</option>
    					<option value="CE">[ CE ] CEARÁ</option>
    					<option value="DF">[ DF ] DISTRITO FEDERAL</option>
    					<option value="ES">[ ES ] ESPÍRITO SANTO</option>
    					<option value="GO">[ GO ] GOIÁS</option>
    					<option value="MA">[ MA ] MARANHÃO</option>
    					<option value="MG">[ MG ] MINAS GERAIS</option>
    					<option value="MS">[ MS ] MATO GROSSO DO SUL</option>
    					<option value="MT">[ MT ] MATO GROSSO</option>
    					<option value="PA">[ PA ] PARÁ</option>
    					<option value="PB">[ PB ] PARAÍBA</option>
    					<option value="PE" selected="selected">[ PE ] PERNAMBUCO</option>
    					<option value="PI">[ PI ] PIAUÍ</option>
    					<option value="PR">[ PR ] PARANÁ</option>
    					<option value="RJ">[ RJ ] RIO DE JANEIRO</option>
    					<option value="RN">[ RN ] RIO GRANDE DO NORTE</option>
    					<option value="RO">[ RO ] RONDÔNIA</option>
    					<option value="RR">[ RR ] RORAIMA</option>
    					<option value="RS">[ RS ] RIO GRANDE DO SUL</option>
    					<option value="SC">[ SC ] SANTA CATARINA</option>
    					<option value="SE">[ SE ] SERGIPE</option>
    					<option value="SP">[ SP ] SÃO PAULO</option>
    					<option value="TO">[ TO ] TOCANTINS</option>
    				</select>
    			</div>
    		</div>

    		<div class='col-md-4'>
    			<div class="form-group">
    				<label for="IptBairro"><span style="color: red">*</span> Bairro</label>
    				<input type="text" class="form-control" id="IptBairro" value="<?php echo $manifesto->info_bairro; ?>" disabled>
    			</div>
    		</div>

    		<div class='col-md-4'>
    			<div class="form-group">
    				<label for="IptCEP"><span style="color: red">*</span> CEP</label>
    				<input type="text" class="form-control" id="IptCEP" value="<?php echo $manifesto->info_cep; ?>" disabled>
    			</div>
    		</div>
    	</div>

    	<div class='row'>
    		<div class='col-md-6'>
    			<div class="form-group">
    				<label for="IptEndereco"><span style="color: red">*</span> Endereço</label>
    				<input type="text" class="form-control" id="IptEndereco" value="<?php echo $manifesto->info_endereco; ?>" disabled>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptNumero"><span style="color: red">*</span> Número</label>
    				<input type="text" class="form-control" id="IptNumero" value="<?php echo $manifesto->info_numero; ?>" disabled>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptComplemento">Complemento</label>
    				<input type="text" class="form-control" id="IptComplemento" value="<?php echo $manifesto->info_complemento; ?>" disabled>
    			</div>
    		</div>
    	</div>
    </div>

    <div class='well' style='background: #fbfbfb; padding-top:0'>
    	<h3 style='margin-bottom: 20px'><small>informações adicionais</small></h3>
        <div class='row'>
    		<div class='col-md-4'>
    			<div class="form-group">
    				<label for="IptOcupacao"><span style="color: red">*</span> Ocupação</label>
    				<select class="form-control" id="IptOcupacao" disabled>
    					<?php if($manifesto->info_ocupacao == 1){ ?>
    					<option value="1">ESTUDANTE DE SERVIÇO SOCIAL</option>
    					<?php } else if($manifesto->info_ocupacao == 2){ ?>
    					<option value="2">ESTUDANTE DE OUTRO CURSO</option>
    					<?php } else if($manifesto->info_ocupacao == 3){ ?>
    					<option value="3">PROFISSIONAL DE SERVIÇO SOCIAL</option>
    					<?php } else if($manifesto->info_ocupacao == 4){ ?>
    					<option value="4">PROFISSIONAL DE OUTRA ÁREA</option>
    					<?php } else if($manifesto->info_ocupacao == 5){ ?>
    					<option value="5">OUTROS</option>
    					<?php } ?>
    				</select>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptFormaContato">Como deseja ser atendido</label>
    				<select class="form-control" id="IptFormaContato" disabled>
    					<?php if($manifesto->forma_contato == 1){ ?>
    					<option value="1">CARTA</option>
    					<?php } else if($manifesto->forma_contato == 2){ ?>
    					<option value="2" selected="selected">E-MAIL</option>
    					<?php } ?>
    				</select>
    			</div>
    		</div>

    		<div class='col-md-3'>
    			<div class="form-group">
    				<label for="IptReinvidicacao"><span style="color: red">*</span> Reinvidicação</label>
    				<select class="form-control" id="IptReinvidicacao" disabled>
    				<?php if($reinvidicacao->row > 0){ while($a = $reinvidicacao->dataReturn()){ ?>
    					<option value="<?php echo $a->idReinvidicacao; ?>"><?php echo strtoupper($a->descricao); ?></option>
    				<?php } } ?>
    				</select>
    			</div>
    		</div>

    		<div class='col-md-2'>
    			<div class="form-group">
    				<label for="IptCRESS">Número do CRESS</label>
    				<input type="text" class="form-control" id="IptCRESS" value="<?php echo $manifesto->numero_cress; ?>" disabled>
    			</div>
    		</div>
    	</div>
    </div>

	<div class='well' style='background: #fbfbfb; padding-top:0'>
    	<h3 style='margin-bottom: 20px'><small>informações de registro</small></h3>

  		<div class="form-group">
    		<label for="IptAssunto"><span style="color: red">*</span> Assunto</label>
    		<input type="text" class="form-control" id="IptAssunto" value="<?php echo $manifesto->assunto; ?>" disabled>
    	</div>

     	<div class="form-group">
        	<label for="IptManifestacao"><span style="color: red">*</span> Manifestação:</label>
            	<textarea class="form-control" rows="10" id="IptManifestacao" disabled><?php echo $manifesto->texto; ?></textarea>
        </div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		<?php
			$resposta->extraSelect = " WHERE idAtendimento = " . $manifesto->idAtendimento;
			$resposta->selectDB($resposta);

			if($resposta->row > 0){
				while($resp = $resposta->dataReturn()){
		?>
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo $resp->mensagem; ?>
				</div>
				<div class="panel-footer text-right"><?php echo DateConversor($resp->resposta_data, 'BR', FALSE); ?> às <?php echo $resp->resposta_hora; ?></div>
			</div>
		<?php } } else { ?>
			<div class="panel panel-default">
				<div class="panel-body text-center">Nenhuma resposta até o momento</div>
			</div>
		<?php } ?>
		</div>
	</div>

<?php } } break; case "error": ?>

ERRO: Protocolo não localizado!

<?php break; default: ?>

<?php break; } ?>

	</div>
</div>
