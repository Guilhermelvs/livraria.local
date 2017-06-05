
<?php

if(
    isset($_GET['id'])
){
    $id_data = $_GET['id'];

    $livro = new Livro();
    $livro->extraSelect = ' where livro_id = ' . $id_data;
    $livro->selectDB($livro);

    if($livro->row == 1) {
        $livro->delete($id_data);
?>

<div class="container">
    <div class="single-sec">
        <div class="alert alert-success" role="alert" id="success_message" style="margin: 25px">
            <p>Sucesso <i class="glyphicon glyphicon-thumbs-up"></i></p>
            <p>O Livro foi deletado corretamente!</p>
            <br />
            <a href="<?php echo URL_BASE; ?>painel/livro-lista" class="btn btn-warning btn-sm">Voltar para Lista de Livros</a>
        </div>
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
