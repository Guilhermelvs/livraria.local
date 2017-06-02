<div class="new">
    <div class="container">
        <?php
            $pathLivro = dirname(dirname(dirname(__FILE__))) . '/models/Livro.class.php';
            require_once($pathLivro);

            $produto_id = $_GET['id']; //echo $categoria;

            $livros = new Livro();
            $livros->extraSelect = ' where ' . $livros->table_name . '.livro_id = ' . $produto_id;
            $livros->innerJoinDB($livros, ['genero' => 'genero_id']);

            if($livros->row ==1){
                $livro = $livros->dataReturn();
        ?>
        <div class="single-sec">
    		<div class="container">
    			<ol class="breadcrumb">
    				<li><a href="<?php echo URL_BASE; ?>">Home</a></li>
    				<li><a href="<?php echo URL_BASE; ?>livros/genero?id=<?php echo $livro->genero_id; ?>"><?php echo utf8_encode($livro->descricao); ?></a></li>
    				<li class="active"><?php echo utf8_encode($livro->nome); ?></li>
    			</ol>
    			<!-- start content -->
    			<div class="col-md-9 det">
    				<div class="single_left">
    					<div class="grid images_1_of_1">
    						<ul id="etalage">
    							<li>
    								<img class="etalage_source_image" src="<?php echo URL_IMG . '/produtos/' . $livro->livro_id; ?>.jpg" class="img-responsive" style="width:100%" title="" />
    							</li>
    						</ul>
    						<div class="clearfix"></div>
    					</div>
    				</div>
    				<div class="single-right">
                        <div class="simpleCart_shelfItem">
                            <input type="hidden" value="1" class="item_Quantity">
        					<div class="id"><h4 class="item_name" style="font-size: 16pt">Título: <?php echo utf8_encode($livro->nome); ?></h4></div>
        					<div class="id"><h4>Autor: <?php echo $livro->autor; ?></h4></div>
        					<form action="" class="sky-form">
        						<fieldset>
        							<section>
        								<div class="rating">
        									<input type="radio" name="stars-rating" id="stars-rating-5">
        									<label for="stars-rating-5"><i class="icon-star"></i></label>
        									<input type="radio" name="stars-rating" id="stars-rating-4">
        									<label for="stars-rating-4"><i class="icon-star"></i></label>
        									<input type="radio" name="stars-rating" id="stars-rating-3">
        									<label for="stars-rating-3"><i class="icon-star"></i></label>
        									<input type="radio" name="stars-rating" id="stars-rating-2">
        									<label for="stars-rating-2"><i class="icon-star"></i></label>
        									<input type="radio" name="stars-rating" id="stars-rating-1">
        									<label for="stars-rating-1"><i class="icon-star"></i></label>
        									<div class="clearfix"></div>
        								</div>
        							</section>
        						</fieldset>
        					</form>
        					<div class="cost">
        						<div class="prdt-cost">
        							<ul>
        								<li>Preço:</li>
        								<li class="active">R$ <span class="item_price"><?php echo $livro->valor; ?></span></li>
        								<a class="item_add" href="javascript:;">Comprar Agora</a>
        							</ul>
                                </div>
    						    <div class="clearfix"></div>
                      		</div>
    					</div>
    				</div>
    				<div class="clearfix"></div>
                    <div class="sofaset-info">
    					<h4>Detalhes </h4>
                        <p class="prod-desc"><?php echo utf8_encode($livro->detalhes); ?></p>
    				</div>
    			</div>
    			<div class="clearfix"></div>
    		</div>
    	</div>
        <?php } ?>
    </div>
</div>
