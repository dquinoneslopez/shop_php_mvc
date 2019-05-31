<?php if(isset($_SESSION['identity'])): ?>

    <?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>

        <h1>Carrito de la compra</h1>

        <table class="table">

            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Eliminar</th>
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
                        <td>
                        <a href="<?= BASE_URL ?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Eliminar</a>
                        </td>
                    </tr>            

                <?php endforeach; ?>

            </tbody>

        </table>

        <br>

        <div class="delete-carrito">
        
            <a href="<?= BASE_URL ?>carrito/delete_all" class="button button-delete button-red">Vaciar carrito</a>
        
        </div>

        <div class="total-carrito">

            <?php $stats = Utils::statsCarrito() ?>
            <h3>Precio total: <?= $stats['total'] ?></h3>
            <a href="<?= BASE_URL ?>pedido/hacer" class="button button-pedido">Hacer pedido</a>

        </div>

    <?php else: ?>

        <h1>Carrito de la compra vacío.</h1>

    <?php endif;?>

<?php else: ?>

    <?php Utils::redirection(BASE_URL) ?>

<?php endif; ?>