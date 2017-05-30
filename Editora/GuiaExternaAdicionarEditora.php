<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Long Beach
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20081210

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Longbeach by TEMPLATED</title>
<link href="../layout/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="../index.php">Tópicos Integradores I </a></h1>
		</div>
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<input id="search-text" type="text" name="s" value="Search" size="15" />
				<input type="submit" id="search-submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<div>
	<ul id="menu">
		<li><a href="../index.php">Home</a></li>
		<li>
			<a href="#">Livros</a>
			<ul>
				<li><a href="../Livros/GuiaExternaAdicionarLivros.php">Mais procurados</a></li>
				<li><a href="../Livros/GuiaExternaRemoverLivros.php">Romance</a></li>
				<li><a href="../Livros/GuiaExternaConsultarAtualizarLivros.php">Comédia</a></li>
				<li><a href="../Livros/GuiaExternaConsultarAtualizarLivros.php">Drama</a></li>
				<li><a href="../Livros/GuiaExternaConsultarAtualizarLivros.php">Ficção</a></li>
				<li><a href="../Livros/GuiaExternaConsultarAtualizarLivros.php">Terror</a></li>
				<li><a href="../Livros/GuiaExternaConsultarAtualizarLivros.php">Documentário</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Autores</a>
			<ul>
				<li><a href="GuiaExternaAdicionarEditora.php">Autores mais procurados</a></li>
				<li><a href="GuiaExternaRemoverEditora.php">Todos os autores</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Login</a>
			<ul>
				<li><a href="../Cadastro/GuiaExternaAdicionarCadastro.php">Entre</a></li>
				<li><a href="../Cadastro/GuiaExternaRemoverCadastro.php">Cadastre-se</a></li>
			</ul>
		</li>
		<li>
	<a href="#">Contato</a>
	<ul>
		<li><a href="../Unidade/GuiaExternaAdicionarContato.php">Entre em contato</a></li>
	</ul>
		</li>
	</ul>
	</div>
	<!-- end #menu -->

	<div id="page">
		<div id="content">
				<h1 class="title">Cadastrar Editora </a></h1>
				<?php require_once("AdicionarEditora.php"); ?>
		</div>


		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Leitura</h2>
					<p>O ato da leitura é muito bom. Expande os horizontes, aumenta o vocabulário e nos torna mais flexíveis para argumentar. -Ninah Alves</p>
				</li>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="#">Livros biográficos</a> (61) </li>
						<li><a href="#">Livros científicos</a> (42) </li>
						<li><a href="#">Livros de contos</a> (105) </li>
						<li><a href="#">Livros de crônicas</a> (326) </li>
						<li><a href="#">Livros de fantasia</a> (203) </li>
					</ul>
				</li>
				<li>
					<h2>Mais vendidos</h2>
					<ul>
						<li><a href="#">Harry Potter</a> (460) </li>
						<li><a href="#">As crônicas de Narnia</a> (243) </li>
						<li><a href="#">O guia do mochileiro das galáxias</a> (70) </li>
						<li><a href="#">O lar das crianças peculiares</a> (170) </li>
						<li><a href="#">A cabana</a> (100) </li>
					</ul>
				</li>
				<li>
					<h2>Lançamento</h2>
					<ul>
						<li><a href="#">Dezembro 2016</a>&nbsp;(150)</li>
						<li><a href="#">Novembro 2016</a>&nbsp;(184)</li>
						<li><a href="#">Outubro 2016</a>&nbsp;(200)</li>
						<li><a href="#">Setembro 2016</a>&nbsp;(182)</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
<div id="footer">
	<p>&copy; Professor Sidney Lima. Disciplina: T&oacute;picos Integradores I</a>.</p>
</div>
<!-- end #footer -->
</div>
</body>
</html>
