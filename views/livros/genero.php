<div class="new">
    <div class="container">
        <?php
            $pathLivro = dirname(dirname(dirname(__FILE__))) . '/models/Livro.class.php';
            $pathGenero = dirname(dirname(dirname(__FILE__))) . '/models/Genero.class.php';
            require_once($pathLivro);
            require_once($pathGenero);

            $categoria = $_GET['id']; //echo $categoria;

            /* Definindo objeto*/
            $genero = new Genero();

            $genero->extraSelect = ' where genero_id = ' . $categoria;
            $genero->selectDB($genero);

            if($genero->row > 0){
                $categoria = $genero->dataReturn();
        ?>
            <h3>Livros > Gênero > <?php echo utf8_encode($categoria->descricao); ?></h3>
            <div class="seller-grids">
                <?php
                    $livros = new Livro();
                    $livros->extraSelect = ' where livros.genero_id = ' . $categoria->genero_id;
                    $livros->innerJoinDB($livros, ['genero' => 'genero_id']);

                    if($livros->row > 0){
                        $livros_array = $livros->dataReturn('array');
                        $i=0;
                        foreach ($livros_array as $livro) {
                ?>
                    <div class="col-md-3 seller-grid">
                        <a href="<?php echo URL_BASE; ?>livros/livro?id=<?php echo $livro['livro_id']; ?>"><img src="<?php echo URL_IMG . '/produtos/' . $livro['livro_id']; ?>.jpg" alt=""/></a>
                        <h4><a href="<?php echo URL_BASE; ?>livros/livro?id=<?php echo $livro['livro_id']; ?>"><?php echo utf8_encode($livro['nome']); ?></a></h4>
                        <p>R$ <?php echo $livro['valor']; ?></p>
                    </div>

                    <?php if($i == 3){
                        echo '<div class="clearfix"></div>';
                        $i=0;
                    } else {
                        $i++;
                    }
                } } else { ?>
                    <span class="alert alert-danger">Nenhum Livro localizado</span>
            </div>
            <?php } } else { ?>
                <span class="alert alert-danger">Nenhum Gênero localizado</span>
            <?php } ?>
    </div>
</div>
