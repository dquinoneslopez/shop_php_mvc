<?php if(isset($_SESSION['carrito'])): ?>

    <h1>Carrito de la compra</h1>

    <table class="table">

        <thead>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </thead>

        <tbody>
        
            <?php 
                
                foreach($carrito as $indice => $elemento): 

                    $producto = $elemento['producto'];
                    
            ?>

                <tr>
                    <td>
                        <?php if($producto->imagen == null): ?>

                            <img src="<?= BASE_URL ?>assets/img/camiseta.png" alt="" class="img_carrito">    

                            <?php else: ?> 

                            <img src="<?= BASE_URL ?>/uploads/images/<?= $producto->imagen ?>" alt="" class="img_carrito">

                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                    </td>
                    <td>
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $elemento['unidades'] ?>
                    </td>
                </tr>            

            <?php endforeach; ?>

        </tbody>

    </table>

    <br>

    <div class="total-carrito">
    
        <?php $stats = Utils::statsCarrito() ?>
        <h3>Precio total: <?= $stats['total'] ?></h3>
        <a href="" class="button button-pedido">Hacer pedido</a>

    </div>

<?php else: ?>

    <h1>Carrito de la compra vacío.</h1>

<?php endif;?>