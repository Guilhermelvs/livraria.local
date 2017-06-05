<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Cadastrar Novo Gênero | [C] R U D</h2>
            <form class="form-horizontal" action="<?php echo URL_BASE; ?>painel/genero-salvar" method="POST" style="margin-top: 25px;">
                <div class="form-group">
                    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <input name="descricao" type="text" class="form-control" id="descricao">
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
