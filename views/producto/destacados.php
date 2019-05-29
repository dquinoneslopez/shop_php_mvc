<h1>Algunos de nuestros productos</h1>

<?php while($prod = $productos->fetch_object()): ?>
    <div class="product">

        <a href="<?= BASE_URL ?>producto/ver&id=<?= $prod->id ?>">
            <?php if($prod->imagen == null): ?>

                <img src="<?= BASE_URL ?>assets/img/camiseta.png" alt="">    

            <?php else: ?> 

                <img src="<?= BASE_URL ?>/uploads/images/<?= $prod->imagen ?>" alt="">

            <?php endif; ?>

            <h2><?= $prod->nombre ?></h2>
        </a>
        <p><?= $prod->precio ?> euros</p>
        <a class="button" href="<?= BASE_URL ?>carrito/add&id=<?=$prod->id?>">Comprar</a>
    </div>
<?php endwhile; ?>