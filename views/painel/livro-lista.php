<div class="container">
    <div class="single-sec">
        <div class="col-md-9 product-model-sec">
            <h2>Listagem de Livros | C [R] U D</h2>
            <div class="table-responsive" style="margin-top: 25px">
                <table class="table table-striped">
                    <thead>
                        <th class="text-center">#</th>
                        <th class="col-md-2">Gênero</th>
                        <th class="col-md-6">Nome</th>
                        <th class="col-md-2">Valor</th>
                        <th class=" text-center">Ações</th>
                    </thead>
                    <tbody>
                        <?php
                            /* Definindo objeto*/
                            $livros = new Livro();
                            $livros->extraSelect = ' order by livro_id';
                            $livros->innerJoinDB($livros, ['genero' => 'genero_id']);

                            if($livros->row > 0){
                                $l_array = $livros->dataReturn('array');
                                foreach ($l_array as $livro) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $livro['livro_id']; ?></td>
                                <td><?php echo utf8_encode($livro['descricao']); ?></td>
                                <td>
                                    <p><?php echo utf8_encode($livro['nome']); ?></p>
                                    <p style="font-size: 10pt">Autor: <?php echo utf8_encode($livro['autor']); ?></p>
                                </td>
                                <td>R$ <?php echo str_replace('.', ',', $livro['valor']); ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
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
