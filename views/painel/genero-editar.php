<?php

if(
    isset($_GET['id'])
){
    $genero = new Genero();
    $genero->extraSelect = ' where genero_id = ' . $_GET['id'];

    if($genero->row == 1){
?>



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
