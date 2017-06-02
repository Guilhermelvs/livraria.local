<div class="new-products">

<?php
    /* Definindo objeto*/
    $l = new Livro();
    $l->extraSelect = ' order by valor desc limit 6';
    $l->selectDB($l);

    if($l->row > 0){
        $l_array = $l->dataReturn('array');

        $passo = 1;
        $i= array(1=>1, 2=>4, 3=>2, 4=>5, 5=>3, 6=>6);
        foreach ($l_array as $livro) {
            if($passo == 1) echo '<div class="new-items">';
            else if($passo == 3) echo '<div class="new-items new_middle">';
            else if($passo == 5) echo '<div class="new-items new_last">';
?>
            <div class="item<?php echo $i[$passo]; ?>">
                <a href="<?php echo URL_BASE; ?>livros/livro?id=<?php echo $livro['livro_id']; ?>"><img src="<?php echo URL_IMG . '/produtos/' . $livro['livro_id']; ?>.jpg" style="width: 80%" alt=""/></a>
                <div class="item-info<?php if($passo>1) echo $i[$passo]; ?>">
                    <h4><a href="<?php echo URL_BASE; ?>livros/livro?id=<?php echo $livro['livro_id']; ?>"><?php echo utf8_encode($livro['nome']); ?></a></h4>
                    <span>R$ <?php echo $livro['valor']; ?></span>
                    <a href="<?php echo URL_BASE; ?>livros/livro?id=<?php echo $livro['livro_id']; ?>">Ver mais</a>
                </div>
            </div>
<?php
            if($passo == 2 or $passo == 4 or $passo == 6) echo '</div>';
            $passo++;
        }
    }
?>

    <div class="clearfix"></div>
</div>
