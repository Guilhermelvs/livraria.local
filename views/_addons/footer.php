<!---->
<div class="footer-content">
	 <div class="container">
		 <div class="ftr-grids">
			 <div class="col-md-3 ftr-grid">
				 <h4>Sobre</h4>
				 <ul>
					 <li><a href="#">Quem somos nós</a></li>
					 <li><a href="contact.html">Contato</a></li>
					 <li><a href="#">Nossos Sites</a></li>
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Serviço ao cliente</h4>
				 <ul>
					 <li><a href="#">FAQ</a></li>
					 <li><a href="#">Envio</a></li>
					 <li><a href="#">Cancelamento</a></li>
					 <li><a href="#">Devoluções</a></li>
					 <li><a href="#">Grandes encomendas</a></li>
					 <li><a href="#">Guias de compra</a></li>
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Sua Conta</h4>
				 <ul>
					 <li><a href="account.html">Sua Conta</a></li>
					 <li><a href="#">Infomações Pessoais</a></li>
					 <li><a href="#">Endereço</a></li>
					 <li><a href="#">Desconto</a></li>
					 <li><a href="#">Acompanhe seu Pedido</a></li>
				 </ul>
			 </div>
			 <div class="col-md-3 ftr-grid">
				 <h4>Gêneros</h4>
				 <ul>
					 <?php
						 /* Definindo objeto*/
						 $g = new Genero();
						 $g->selectDB($g);

						 if($g->row > 0){
							 $genero_array = $g->dataReturn('array');
							 foreach ($genero_array as $gen) {
					 ?>
						 <li><a href="<?php echo URL_BASE; ?>livros/genero?id=<?php echo $gen['genero_id']; ?>"><?php echo utf8_encode($gen['descricao']); ?></a></li>
					 <?php } } else { ?>
						 <li>Nenhum gênero encontrado</li>
					 <?php } ?>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="copywrite">
			 <p>&copy; Guilherme Lucas. Disciplina: T&oacute;picos Integradores I</a>.</p>
		 </div>
		 </div>
	 </div>
</div>
<!---->
