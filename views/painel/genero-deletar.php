
<?php

if(
    isset($_GET['id'])
){
    $genero = new Genero();
    $genero->extraSelect = ' where genero_id = ' . $_GET['id'];

    if($genero->row == 1) $genero->delete($_GET['id']);
?>

<div class="container">
    <div class="single-sec">
        <div class="alert alert-success" role="alert" id="success_message" style="margin: 25px">
            <p>Sucesso <i class="glyphicon glyphicon-thumbs-up"></i></p>
            <p>O Gênero foi deletado corretamente!</p>
            <br />
            <a href="<?php echo URL_BASE; ?>painel/genero-lista" class="btn btn-warning btn-sm">Voltar para Lista de Gêneros</a>
        </div>
    </div>
</div>

<?php } else { ?>

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
