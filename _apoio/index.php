<?php
	require_once('functions.php');
	require_once('autoload.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="view/public/img/favicon.ico">

	<title><?php echo EMPRESA; ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet">

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CSS_PATH; ?>fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

	<script src='https://www.google.com/recaptcha/api.js'></script>  -->

	<!-- Custom styles for this template -->
	<link href="<?php echo CSS_PATH; ?>navbar-fixed-top.css" rel="stylesheet">
	<link href="<?php echo CSS_PATH; ?>signin.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!---[if lt IE 9]><script src="<?php echo JS_PATH; ?>ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="<?php echo JS_PATH; ?>ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php
		//Definindo Controler
		$url = $_SERVER['REQUEST_URI'];

		$prepare = explode('/', $url);

		// valide
		if(count($prepare) > CODE_VIEW){
			if($prepare[CODE_VIEW] != NULL) $view = $prepare[CODE_VIEW]; else $view = 'principal';

			if(count($prepare) > CODE_ACTION){
				if($prepare[CODE_ACTION] != NULL){
					$prepare_action = explode('?', $prepare[CODE_ACTION]);

					$action = $prepare_action[0];
				} else{
					$action = 'index';
				}
			} else {
				$action = 'index';
			}
		} else {
			$view = 'principal';
			$action = 'index';
		}

		// load > View
		LoadView($view, $action);
	?>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo JS_PATH; ?>jquery-2.1.4.min.js"></script>
	<script src="<?php echo JS_PATH; ?>jquery.maskedinput.js"></script>
	<script src="<?php echo JS_PATH; ?>jquery.validate.min.js"></script>
	<script src="<?php echo JS_PATH; ?>jquery.dataTables.min.js"></script>

	<script src="<?php echo JS_PATH; ?>bootstrap.min.js"></script>
	<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
	<script src="<?php echo JS_PATH; ?>holder.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="<?php echo JS_PATH; ?>ie10-viewport-bug-workaround.js"></script>
<!--
	<script src="<?php echo JS_PATH; ?>fileinput.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>fileinput_locale_pt-BR.js" type="text/javascript"></script> -->

	<script src="<?php echo JS_PATH; ?>jquery.printElement.js"></script>
	<script src="<?php echo JS_PATH; ?>custom.js"></script>
</body>
</html>
