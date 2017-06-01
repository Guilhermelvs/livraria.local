<?php

require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

$obj = new AtendimentoController(); 
$user = new UsuarioController();
$reinvidicacao = new ReinvidicacaoController(); 

$user->extraSelect = 'WHERE login_user = "' . $_SESSION['user_cress'] . '"';
$user->selectDB($user);
$user_logado = $user->dataReturn();

$reinvidicacao->extraSelect = 'WHERE idUsuario = "' . $user_logado->idUsuario . '"';
$reinvidicacao->selectDB($reinvidicacao);
$user_reinvidicacao = $reinvidicacao->dataReturn(); ?>

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
					<a href="<?php echo BASE_URL; ?>principal">Principal</a>
				</li>
				
				<li class="active dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Atendimento <span class="caret"></span></a>
					
					<ul class="dropdown-menu">
						
						<li>
							<a href="<?php echo BASE_URL; ?>atendimento/abertos">Abertos</a>
						</li>
						
						<li>
							<a href="<?php echo BASE_URL; ?>atendimento/fechados">Fechados</a>
						</li>
					</ul>
				</li>
			<?php if($user_logado->administrador == 2){ ?>
				<li>
					<a href="<?php echo BASE_URL; ?>usuario">Usuários</a>
				</li>
			<?php } ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="<?php echo BASE_URL; ?>logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair do sistema <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php switch ($action) { case "abertos": ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 main">
			<h2 class="sub-header">
				<span>Atendimento</span>
				<span class="text-muted">: abertos</span>
				<a href="#" class="btn btn-default btn">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Modo Lixeira
				</a>
			</h2>
			
			<div class="table-responsive">
				<table class='table table-hover'>
					<thead>
						<tr>
							<th></th>
							<th class='text-center'>Protocolo</th>
							<th>Assunto</th>
							<th class='text-center'>Tipo</th>
							<th class='text-center'>Situação</th>
							<th class='text-center'>Data Abertura</th>
							<th class='text-center'></th>
						</tr>
					</thead>
					<tbody>
					
					<?php 
						if($reinvidicacao->row > 0){
							$obj->extraSelect  = 'WHERE idReinvidicacao = "' . $user_reinvidicacao->idReinvidicacao . '"';
							$obj->extraSelect .= 'AND status = 1';
							$obj->selectDB($obj);
							
							if($obj->row > 0){
								while($result = $obj->dataReturn()){
					?>
					<?php if($result->flag == 1){ ?>
						<tr class="warning">
					<?php } else { ?>
						<tr>
					<?php } ?>
							<td>
							<?php if($result->flag == 2){ ?>
								<span class="glyphicon glyphicon-unchecked" aria-hidden="true" title='Atendimento não lido'></span>
							<?php } else { ?>
								<span class="glyphicon glyphicon-check" aria-hidden="true" title='Atendimento lido'></span>
							<?php } ?>
							</td>
							
							<td class="text-center"><?php echo $result->protocolo; ?></td>
							
							<td><?php echo substr($result->assunto, 0, 50); ?></td>
							
							<td class="text-center"><?php if(!empty($result->tipo)) echo $result->tipo; else echo '<span style="color: gray">< não definido> </span>'; ?></td>
							
							<td class="text-center"><?php if($result->status == 1) echo 'ABERTO'; elseif($result->status == 2) echo 'FECHADO'; ?></td>
							
							<td class="text-center"><?php echo DateConversor($result->data_abertura, 'BR'); ?></td>
							
							<td class="text-right">
								<a href="<?php echo BASE_URL . $view; ?>/resumo?cod=<?php echo $result->idAtendimento; ?>" class="btn btn-success btn-sm" title="Resumo do Atendimento">
									<span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
								</a>
								
								<a href="<?php echo BASE_URL . $view; ?>/editar?cod=<?php echo $result->idAtendimento; ?>" class="btn btn-success btn-sm" title="Responder Atendimento">
									<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
								</a>
							<?php if($user_logado->administrador == 1){ ?>
								<a href="<?php echo BASE_URL . $view; ?>/excluir?cod=<?php echo $result->idAtendimento; ?>" class="btn btn-success btn-sm" title="Excluir Atendimento">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</a>
							<?php } ?>
							</td>
						</tr>
					<?php 
								}
							}
						} else {
							$obj->row = 0;
						}
					?>
					</tbody>
					<tfoot>
							<tr>
								<td colspan="7" class="text-<?php if($obj->row == 0) echo 'center'; else echo 'right'; ?>"><?php if($obj->row == 0){ echo 'Nenhum'; } else { echo $obj->row; } ?> atendimento<?php if($obj->row > 1){ echo 's'; } ?> em aberto para você!</td>
							</tr
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<?php break; case "resumo": 
		if(isset($_GET['cod'])){
			$obj->extraSelect = "WHERE idAtendimento = " . $_GET['cod'];
			$obj->selectDB($obj);
			
			if ($obj->row == 1) {
				$obj_info = $obj->dataReturn();
				
				$update_data = array(
					'protocolo' => $obj_info->protocolo,
					'assunto' => $obj_info->assunto,
					'texto' => $obj_info->texto,
					'flag' => 2,
					'status' => $obj_info->status,
					'deletado' => $obj_info->deletado
				);
				
				$obj->updateController($obj_info->idAtendimento, $update_data);
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 main">
			<h2 class="sub-header">
				<?php echo $obj_info->protocolo; ?>
				
				<a href="<?php echo BASE_URL . $view; ?>/abertos" class="btn btn-default btn">
					<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar
				</a>
				
				<a href="<?php echo BASE_URL . $view; ?>/marcarnaolida?cod=<?php echo $obj_info->idAtendimento; ?>" class="btn btn-default btn">
					<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>&nbsp;&nbsp;Marcar como não lido
				</a>
				
				<a href="<?php echo BASE_URL . $view; ?>/fechar?cod=<?php echo $obj_info->idAtendimento; ?>" class="btn btn-default btn">
					<span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Finalizar Atedimento
				</a>
			</h2>
			
			<div class="panel panel-default">
				<div class="panel-heading">Assunto</div>
				<div class="panel-body">
					<?php echo $obj_info->assunto; ?>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Texto</div>
				<div class="panel-body">
					<?php echo nl2br($obj_info->texto); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-body">
							{resposta}
						</div>
						<div class="panel-footer text-right">às {data_hora} por {usuario}</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-body">
							{resposta}
						</div>
						<div class="panel-footer text-right">às {data_hora} por {usuario}</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-body">
							{resposta}
						</div>
						<div class="panel-footer text-right">às {data_hora} por {usuario}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 		}
		}
	break; case "marcarnaolida": 
		if(isset($_GET['cod'])){
			$obj->extraSelect = "WHERE idAtendimento = " . $_GET['cod'];
			$obj->selectDB($obj);
			
			if ($obj->row == 1) {
				$obj_info = $obj->dataReturn();
				
				$naolida_data = array(
					'protocolo' => $obj_info->protocolo,
					'assunto' => $obj_info->assunto,
					'texto' => $obj_info->texto,
					'flag' => 1,
					'status' => $obj_info->status,
					'deletado' => $obj_info->deletado
				);
				
				$obj->updateController($obj_info->idAtendimento, $naolida_data);
				
				Redirect($view . '/abertos');
			}
		}
	break; case "fechados": ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 main">
			<h2 class="sub-header">
				<span>Atendimento</span>
				<span class="text-muted">: fechados</span>
				<a href="#" class="btn btn-default btn">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Modo Lixeira
				</a>
			</h2>
			
			<div style="margin-bottom: 15px">
				
				
			</div>
			
			<div class="table-responsive">
				<table class='table table-hover'>
					<thead>
						<tr>
							<th class='text-center'>Protocolo</th>
							<th>Assunto</th>
							<th class='text-center'>Tipo</th>
							<th class='text-center'>Situação</th>
							<th class='text-center'>Data Abertura</th>
							<th class='text-center'>Data Fechamento</th>
							<th class='text-center'></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$obj->extraSelect = "WHERE status = 2";
						$obj->selectDB($obj);
						
						if($obj->row > 0){
							while($result = $obj->dataReturn()){
					?>
						<tr>
							<td class="text-center"><?php echo $result->protocolo; ?></td>
							
							<td><?php echo substr($result->assunto, 0, 50); ?></td>
							
							<td class="text-center"><?php echo $result->tipo; ?></td>
							
							<td class="text-center"><?php if($result->status == 1) echo 'ABERTO'; elseif($result->status == 2) echo 'FECHADO'; ?></td>
							
							<td class="text-center"><?php echo DateConversor($result->data_abertura, 'BR'); ?></td>
							
							<td class="text-center"><?php echo DateConversor($result->data_fechamento, 'BR'); ?></td>
							
							<td class="text-right">
								<a href="<?php echo BASE_URL . $view; ?>/ver?cod=<?php echo $result->idAtendimento; ?>" class="btn btn-success btn-sm" title="Visualizar Atendimento">
									<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
								</a>
							<?php if($user_logado->administrador == 1){ ?>
								<a href="<?php echo BASE_URL . $view; ?>/reabrir?cod=<?php echo $result->idAtendimento; ?>" class="btn btn-success btn-sm" title="Re-abrir Atendimento">
									<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
								</a>
							<?php } ?>
							</td>
						</tr>
					<?php 
							}
						}
					?>
					</tbody>
					<tfoot>
							<tr>
								<td colspan="6" class="text-<?php if($obj->row == 0) echo 'center'; else echo 'right'; ?>"><?php if($obj->row == 0){ echo 'Nenhum'; } else { echo $obj->row; } ?> atendimento<?php if($obj->row > 1){ echo 's'; } ?> fechado por você! </td>
							</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<?php break; default: ; ?>
	
<?php break; } ?>