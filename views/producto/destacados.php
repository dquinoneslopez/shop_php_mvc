<h1>Algunos de nuestros productos</h1>

<?php while($prod = $productos->fetch_object()): ?>
    <div class="product">

        <?php if($prod->imagen == null): ?>

        <img src="<?= BASE_URL ?>assets/img/camiseta.png" alt="">    

        <?php else: ?> 

            <img src="<?= BASE_URL ?>/uploads/images/<?= $prod->imagen ?>" alt="">

        <?php endif; ?>
        
        <h2><?= $prod->nombre ?></h2>
        <p><?= $prod->precio ?> euros</p>
        <a class="button" href="">Comprar</a>
    </div>
<?php endwhile; ?>