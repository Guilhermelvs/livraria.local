<?php

if(
    isset($_POST['genero_id']) AND
    isset($_POST['nome']) AND
    isset($_POST['autor']) AND
    isset($_POST['valor']) AND
    isset($_POST['detalhes'])
){
    $livros = new Livro();

    //validar
    $erro=false;

    $val_data = str_replace(",",".", $_POST['valor']);

    if(!is_numeric($val_data)) $erro=true;

    if($erro == false){
        $add_data = array(
            'genero_id' => $_POST['genero_id'],
            'nome' => $_POST['nome'],
            'autor' => $_POST['autor'],
            'valor' => $val_data,
            'detalhes' => $_POST['detalhes']
        );

        $livros->insert($add_data);
?>

<div class="container">
    <div class="single-sec">
        <div class="alert alert-success" role="alert" id="success_message" style="margin: 25px">
            <p>Sucesso <i class="glyphicon glyphicon-thumbs-up"></i></p>
            <p>O livro foi cadastrado corretamente!</p>
            <br />
            <a href="<?php echo URL_BASE; ?>painel/livro-lista" class="btn btn-warning btn-sm">Ir para Lista de Livros</a>
        </div>
    </div>
</div>

<?php } else { ?>

        <div class="container">
            <div class="single-sec">
                <div class="alert alert-danger" role="alert" id="error_message" style="margin: 25px">
                    <p>ERRO! <i class="glyphicon glyphicon-warning-sign"></i></p>
                    <p>O campo Valor não pode conter letras!</p>
                    <br />
                    <a href="javascript:window.history.back();" class="btn btn-danger btn-sm">Voltar para Corrigir</a>
                </div>
            </div>
        </div>

<?php } ?>

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
