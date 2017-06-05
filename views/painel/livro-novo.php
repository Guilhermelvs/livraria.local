<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Cadastrar Novo Livro | [C] R U D</h2>
            <form class="form-horizontal" action="<?php echo URL_BASE; ?>painel/livro-salvar" method="POST" style="margin-top: 25px;">

                <div class="form-group">
                    <label for="genero" class="col-sm-2 control-label">Gênero</label>
                    <div class="col-sm-10">
                        <select name="genero_id" id="genero" class="form-control" required>
                            <?php
                                /* Definindo objeto*/
                                $generos = new Genero();
                                $generos->selectDB($generos);

                                if($generos->row > 0){
                                    $g_array = $generos->dataReturn('array');
                                    foreach ($g_array as $genero) {
                            ?>
                                <option value="<?php echo $genero['genero_id']; ?>"><?php echo utf8_encode($genero['descricao']); ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" class="form-control" id="nome" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autor" class="col-sm-2 control-label">Autor</label>
                    <div class="col-sm-10">
                        <input name="autor" type="text" class="form-control" id="autor" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="valor" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon">R$ </span>
                            <input name="valor" type="text" class="form-control" id="valor" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detalhes" class="col-sm-2 control-label">Detalhes</label>
                    <div class="col-sm-10">
                        <textarea name="detalhes" class="form-control" id="detalhes"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-warning btn-block">Cadastrar <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once('menu-left.php'); ?>
    </div>
</div>
