<?php

if(
    isset($_GET['id'])
){
    $id_data = $_GET['id'];

    $livro = new Livro();
    $livro->extraSelect = ' where livro_id = ' . $id_data;
    $livro->selectDB($livro);

    if($livro->row == 1){
        $l = $livro->dataReturn();
?>

<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Editar Livro | C R [U] D</h2>
            <form class="form-horizontal" action="<?php echo URL_BASE; ?>painel/livro-atualizar" method="POST" style="margin-top: 25px;">
                <input name="livro_id" type="hidden" value="<?php echo $l->livro_id; ?>">
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
                                <option value="<?php echo $genero['genero_id']; ?>" <?php if($l->genero_id == $genero['genero_id']){echo "selected='selected'"; } ?>><?php echo utf8_encode($genero['descricao']); ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" class="form-control" id="nome" value="<?php echo $l->nome; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="autor" class="col-sm-2 control-label">Autor</label>
                    <div class="col-sm-10">
                        <input name="autor" type="text" class="form-control" id="autor" value="<?php echo $l->autor; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="valor" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon">R$ </span>
                            <input name="valor" type="text" class="form-control" id="valor" value="<?php echo str_replace('.', ',', $l->valor); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detalhes" class="col-sm-2 control-label">Detalhes</label>
                    <div class="col-sm-10">
                        <textarea name="detalhes" class="form-control" id="detalhes"><?php echo $l->detalhes; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-warning btn-block">Editar <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>
            </form>
        </div>

        <?php include_once('menu-left.php'); ?>
    </div>
</div>


<?php } } else { ?>

<div class="container">
    <div class="single-sec">
        <div class="alert alert-danger" role="alert" id="error_message" style="margin: 25px">
            <p>ERRO! <i class="glyphicon glyphicon-warning-sign"></i></p>
            <p>Esta página não existe!</p>
            <br />
            <a href="<?php echo URL_BASE; ?>painel" class="btn btn-danger btn-sm">Ir para tela inicial..</a>
        </div>
    </div>
</div>

<?php } ?>
