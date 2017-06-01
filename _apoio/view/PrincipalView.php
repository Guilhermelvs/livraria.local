<?php

require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

/**$reinvidicacao = new ReinvidicacaoController();
$reinvidicacao->extraSelect = 'WHERE deletado = 1';
$reinvidicacao->selectDB($reinvidicacao);


$obj = new AtendimentoController(); ?>
*/
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

				<li class="active">
					<a href="<?php echo BASE_URL; ?>principal">Ouvidoria</a>
				</li>

				<li>
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

<?php switch ($action) { case "index":
		/*if(isset($_POST['insert'])){
			$erro = false;

			if($erro == false) {
			    $protocol = date('Ymdhis') . '000' . rand(10000, 99999);

				$insertdata = array(
						'idReinvidicacao'     => $_POST['insert_reinvidicacao'],
						'protocolo'           => $protocol,
						'info_nome'           => $_POST['insert_nome'],
						'info_cpf'            => $_POST['insert_cpf'],
						'info_email'          => $_POST['insert_email'],
						'info_telefone'       => $_POST['insert_telefone'],
						'info_celular'        => $_POST['insert_celular'],

						'info_estado'         => $_POST['insert_estado'],
						'info_bairro'         => $_POST['insert_bairro'],
						'info_cep'            => $_POST['insert_cep'],
						'info_endereco'       => $_POST['insert_endereco'],
						'info_numero'         => $_POST['insert_numero'],
						'info_complemento'    => $_POST['insert_complemento'],

						'info_ocupacao'       => $_POST['insert_ocupacao'],
						'forma_contato'       => $_POST['insert_formacontato'],
				        'numero_cress'        => $_POST['insert_cress'],
						'assunto'             => $_POST['insert_assunto'],
						'texto'               => $_POST['insert_manifestacao'],
					);

				$obj->insertController($insertdata);

				Redirect($view . '/index?msg=' . $protocol);
			} else {
				Redirect($view . '/index?erro=' . $erro_number);
			}
		} */
?>

<div class="container">
<?php if(!empty($_GET['msg'])){ ?>
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12 main">
			<span class="alert alert-success">Manifestação foi enviada com sucesso. Acompanhe seu andamento através do número de protocolo: <code><?php echo $_GET['msg']?></code></span>

			<a href="<?php echo BASE_URL; ?>" class="btn btn-default btn-lg">Voltar</a>
		</div>
	</div>
<?php } else { ?>

	<div class="row">
		<div class="col-md-12 main">
			<h2 class="sub-header">Ouvidoria</h2>
            <p>A ouvidoria no CRESS 4ª Região foi instituída como canal responsável para receber reclamações, denúncias e sugestões a respeito do desempenho das atividades do Conselho Regional de Serviço Social do Estado de Pernambuco.</p>

            <p>Seu funcionamento é um facilitador nas relações entre o Assistente Social e demais usuários dos serviços do CRESS/PE, onde o objetivo é viabilizar, dentro dos preceitos normativos e legais, as soluções encaminhadas para este setor, visando a promoção de melhorias nos serviços prestados.</p>

            <p>São atribuições da Ouvidoria:</p>

            <ul>
                <li>Atuar no pós-atendimento, na mediação de conflitos entre o cidadão e a instituição, procurando personalizar o atendimento ao demandante;</li>
                <li>Avaliar a procedência das solicitações, encaminhando-as aos setores competentes para a devida apreciação e resposta;</li>
                <li>Promover o acesso à informação como um direito do cidadão e dever da instituição;</li>
                <li>Acompanhar as providências adotadas;</li>
                <li>Cobrar soluções;</li>
                <li>Dar o devido retorno ao interessado de forma ágil e desburocratizada;</li>
                <li>Auxiliar a instituição no exercício da autocrítica e da reflexão;</li>
                <li>Mapear e localizar eventuais falhas nos procedimentos da instituição;</li>
                <li>Propor a adoção de providências ou medidas para soluções de problemas, quando necessário.</li>
            </ul>

			<div class='alert alert-info' role="alert">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<span>Ouvidor: PAULO HENRIQUE DE MELO LAGO, jornalista, assessor de comunicação do CRESS/PE desde fevereiro/2015.</span>
			</div>

			<p>A Ouvidoria está disponível por meio das seguintes formas de contato:</p>

    		<div class='well hidden-sm hidden-md hidden-lg'>
    			<div class='row margin-top-10'>
    				<div class='col-sm-2'>E-mail:</div>
    				<div class='col-sm-10'>
    					<code>ouvidoria@cresspe.org.br</code>
    				</div>
    			</div>
                <div class='row margin-top-10'>
    				<div class='col-sm-2'>Celular:</div>
    				<div class='col-sm-10'>
                        <div>
                            <code>99727-0342 (Recife e região Metropolitana)</code> ou
                            <code>0XX81 99727-0342 (Interior de Pernambuco e outros estados)</code>
                        </div>
                        <div>de segunda-feira à sexta-feira, das 8h às 20h</div>
                    </div>
    			</div>

    			<div class='row margin-top-10'>
    				<div class='col-sm-2'>Whatsapp:</div>
    				<div class='col-sm-10'>
    					<code>0XX81 99727-0342</code>
    				</div>
    			</div>

    			<div class='row margin-top-10'>
    				<div class='col-sm-2'>Carta:</div>
    				<div class='col-sm-10'>
    					<div>Endereçada à Ouvidoria do Conselho Regional de Serviço Social de Pernambuco (CRESS/PE)</div>
    					<div><code>Rua Dezenove de Novembro, 154, Madalena, Recife - PE - CEP: 50610-240</code></div>
    				</div>
    			</div>
			</div>

    		<div class='well hidden-xs'>
    			<div class='row margin-top-10'>
    				<div class='col-sm-2 text-right'>E-mail:</div>
    				<div class='col-sm-10'>
    					<code>ouvidoria@cresspe.org.br</code>
    				</div>
    			</div>
    			<div class='row margin-top-10'>
    				<div class='col-sm-2 text-right'>Celular:</div>
    				<div class='col-sm-10'>
    					<div>
                            <code>99727-0342 (Recife e região Metropolitana)</code> ou
    					    <code>0XX81 99727-0342 (Interior de Pernambuco e outros estados)</code>
                        </div>
                        <div>de segunda-feira à sexta-feira, das 8h às 20h</div>
    				</div>
    			</div>

                <div class='row margin-top-10'>
                    <div class='col-sm-2 text-right'>Whatsapp:</div>
                    <div class='col-sm-10'>
                        <code>0XX81 99727-0342</code>
                    </div>
                </div>

    			<div class='row margin-top-10'>
    				<div class='col-sm-2 text-right'>Carta:</div>
    				<div class='col-sm-10'>
    					<div>Endereçada à Ouvidoria do Conselho Regional de Serviço Social de Pernambuco (CRESS/PE)</div>
    					<div><code>Rua Dezenove de Novembro, 154, Madalena, Recife - PE - CEP: 50610-240</code></div>
    				</div>
    			</div>
			</div>

			<p class="text-center">FAÇA SUA SOLICITAÇÃO</p>
			<p class="text-center">ou consulte andamento clicando <a href="<?php echo BASE_URL; ?>acompanhe">aqui</a></p>

		<?php if(isset($_GET['erro'])){ if($_GET['erro'] == 1){ ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>ERRO:</strong> E-mail e Login já estão em uso! Por favor preencha novamente.
			</div>
		<?php } if($_GET['erro'] == 2){ ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>ERRO:</strong> E-mail já está em uso! Por favor preencha novamente.
			</div>
		<?php } if($_GET['erro'] == 3){ ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>ERRO:</strong> Login já está em uso! Por favor preencha novamente.
			</div>
		<?php } } ?>

			<form method="post" action="<?php echo BASE_URL . $view; ?>">
    			<div class='well' style='background: #fbfbfb; padding-top:0'>
    				<h3 style='margin-bottom: 20px'><small>informações pessoais</small></h3>
    				<div class='row'>
    					<div class='col-md-8'>
    						<div class="form-group">
    							<label for="IptNome"><span style="color: red">*</span> Nome Completo</label>
    							<input type="text" class="form-control" id="IptNome" name="insert_nome" required>
    						</div>
    					</div>

    					<div class='col-md-4'>
    						<div class="form-group">
    							<label for="IptCPF"><span style="color: red">*</span> CPF</label>
    							<input type="text" class="form-control" id="IptCPF" name="insert_cpf">
    						</div>
    					</div>
    				</div>

    				<div class='row'>
    					<div class='col-md-6'>
    						<div class="form-group">
    							<label for="IptEmail"><span style="color: red">*</span> E-mail</label>
    							<input type="email" class="form-control" id="IptEmail" name="insert_email" required>
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptTelefone"><span style="color: red">*</span> Telefone Fixo</label>
    							<input type="text" class="form-control" id="IptTelefone" name="insert_telefone">
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptCelular"><span style="color: red">*</span> Telefone Celular</label>
    							<input type="text" class="form-control" id="IptCelular" name="insert_celular">
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
    							<select class="form-control" id="IptEstado" name="insert_estado">
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
    							<input type="text" class="form-control" id="IptBairro" name="insert_bairro">
    						</div>
    					</div>

    					<div class='col-md-4'>
    						<div class="form-group">
    							<label for="IptCEP"><span style="color: red">*</span> CEP</label>
    							<input type="text" class="form-control" id="IptCEP" name="insert_cep">
    						</div>
    					</div>
    				</div>

    				<div class='row'>
    					<div class='col-md-6'>
    						<div class="form-group">
    							<label for="IptEndereco"><span style="color: red">*</span> Endereço</label>
    							<input type="text" class="form-control" id="IptEndereco" name="insert_endereco">
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptNumero"><span style="color: red">*</span> Número</label>
    							<input type="text" class="form-control" id="IptNumero" name="insert_numero">
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptComplemento">Complemento</label>
    							<input type="text" class="form-control" id="IptComplemento" name="insert_complemento">
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
    							<select class="form-control" id="IptOcupacao" name="insert_ocupacao" required>
    								<option value="1">ESTUDANTE DE SERVIÇO SOCIAL</option>
    								<option value="2">ESTUDANTE DE OUTRO CURSO</option>
    								<option value="3">PROFISSIONAL DE SERVIÇO SOCIAL</option>
    								<option value="4">PROFISSIONAL DE OUTRA ÁREA</option>
    								<option value="5">OUTROS</option>
    							</select>
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptFormaContato">Como deseja ser atendido</label>
    							<select class="form-control" id="IptFormaContato" name="insert_formacontato">
    								<option value="1">CARTA</option>
    								<option value="2" selected="selected">E-MAIL</option>
    							</select>
    						</div>
    					</div>

    					<div class='col-md-3'>
    						<div class="form-group">
    							<label for="IptReinvidicacao"><span style="color: red">*</span> Reinvidicação</label>
    							<select class="form-control" id="IptReinvidicacao" name="insert_reinvidicacao" required>
    							<?php if($reinvidicacao->row > 0){ while($a = $reinvidicacao->dataReturn()){ ?>
    								<option value="<?php echo $a->idReinvidicacao; ?>"><?php echo utf8_encode($a->descricao); ?></option>
    							<?php } } ?>
    							</select>
    						</div>
    					</div>

    					<div class='col-md-2'>
    						<div class="form-group">
    							<label for="IptCRESS">Número do CRESS</label>
    							<input type="text" class="form-control" id="IptCRESS" name="insert_cress">
    						</div>
    					</div>
    				</div>
    			</div>

				<div class='well' style='background: #fbfbfb; padding-top:0'>
    				<h3 style='margin-bottom: 20px'><small>informações de registro</small></h3>

    				<div class="form-group">
    					<label for="IptAssunto"><span style="color: red">*</span> Assunto</label>
    					<input type="text" class="form-control" id="IptAssunto" name="insert_assunto" required>
    				</div>

        			<div class="form-group">
            			<label for="IptManifestacao"><span style="color: red">*</span> Manifestação:</label>
            			<textarea class="form-control" rows="10" id="IptManifestacao" name="insert_manifestacao" required></textarea>
            		</div>

                    <div>
                        <span class="alert">Qualquer anexo referente ao registro pode ser encaminhado ao e-mail <code>ouvidoria@cresspe.org.br</code></span>
                    </div>
            	</div>

				<input type="hidden" name="insert" value="true">

				<!-- <div class="g-recaptcha" data-sitekey="6Ld8IhETAAAAAJMjhwneJro_3no8_q6cuUfSsx4B"></div> -->

				<button type="submit" class="btn btn-success btn" style="margin-top:10px">Enviar</button>
				<button type="reset" class="btn btn-default btn" style="margin-top:10px">Limpar dados</button>
			</form>
		</div>
	</div>
</div>

<?php } break; default: ?>

<?php break; } ?>
