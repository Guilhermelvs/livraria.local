<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Listagem de Gêneros | C [R] U D</h2>
            <div class="table-responsive" style="margin-top: 25px">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="col-md-9">Gênero</th>
                        <th class="col-md-2 text-center">Ações</th>
                    </thead>
                    <tbody>
                        <?php
                            /* Definindo objeto*/
                            $generos = new Genero();
                            $generos->extraSelect = ' order by genero_id';
                            $generos->selectDB($generos);

                            if($generos->row > 0){
                                $g_array = $generos->dataReturn('array');
                                foreach ($g_array as $genero) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $genero['genero_id']; ?></td>
                                <td><?php echo utf8_encode($genero['descricao']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo URL_BASE; ?>painel/genero-editar?id=<?php echo $genero['genero_id']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="<?php echo URL_BASE; ?>painel/genero-deletar?id=<?php echo $genero['genero_id']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include_once('menu-left.php'); ?>
    </div>
</div>
