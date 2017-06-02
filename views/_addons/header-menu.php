<!------>
<div class="mega_nav">
    <div class="container">
        <div class="menu_sec">
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <li class="active grid"><a class="color1" href="<?php echo URL_BASE; ?>">Home</a></li>
                <li class="grid"><a class="color2" href="#">Livros</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <h4>Gênero</h4>
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
                            </div>
                        </div>
                    </div>
                </li>
                <li><a class="color5" href="<?php echo URL_BASE; ?>autores">Autores</a></li>
                <li><a class="color3" href="<?php echo URL_BASE; ?>contato">Contato</a></li>
            </ul>
            <div class="search">
                <form>
                    <input type="text" value="" placeholder="Buscar...">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
