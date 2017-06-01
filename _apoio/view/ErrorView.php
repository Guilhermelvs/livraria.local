<?php

require_once(dirname(dirname(__FILE__)) . '/autoload.php');
ProtectSystem(basename(__FILE__));

switch ($action) {
	case 'Show':
		?>
			<div>ERRO NÃO LOCALIZADO</div>
		<?php 
	break;
	
	case '1':
		?>
			<div class="alert-success">Você fez logoff com sucesso!</div>
		<?php 
	break;
	
	case '2':
		?>
			<div class="alert-danger">Dados incorretos ou usuário inativo</div>
		<?php 
	break;
	
	case '3':
		?>
			<div class="alert-warning">Faça login antes de acessar a página solicitada!</div>
		<?php 
	break;
	
	default:
		?>
			<div>ERROR NÃO LOCALIZADO</div>
		<?php 
	break;
}

?>
