<?php

if(
    isset($_GET['id'])
){
    $id_data = $_GET['id'];

    $genero = new Genero();
    $genero->extraSelect = ' where genero_id = ' . $id_data;
    $genero->selectDB($genero);

    if($genero->row == 1){
        $g = $genero->dataReturn();
?>

<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Editar Gênero | C R [U] D</h2>
            <form class="form-horizontal" action="<?php echo URL_BASE; ?>painel/genero-atualizar" method="POST" style="margin-top: 25px;">
                <input name="genero_id" type="hidden" value="<?php echo $g->genero_id; ?>">
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input name="descricao" type="text" class="form-control" id="descricao" value="<?php echo $g->descricao; ?>">
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
