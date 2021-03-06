<?php if(isset($categoria)): ?>
    
    <h1><?= $categoria->nombre ?></h1>

    <?php if($productos->num_rows == 0): ?>

        <p>No hay productos para mostrar.</p>

    <?php else: ?>

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

    <?php endif; ?>

<?php else: ?>

    <h1>La categoría no existe</h1>

<?php endif; ?>