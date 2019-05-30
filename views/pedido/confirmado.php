<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'completed'): ?>

    <h1>Tu pedido ha sido confirmado</h1>
    <p>Tu pedido ha sido guardado con éxito. Una vez realizado el pago en la cuenta 1234567890, será procesado y enviado.</p>
    
    <br>

    <?php if(isset($pedido)): ?>

        <h3>Datos del pedido</h3>
        Número de pedido: <?= $pedido->id ?> <br>
        Total a pagar: <?= $pedido->coste ?> € <br>
        Productos: <br>
        
        <table class="table">

            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </thead>

            <tbody>

                <?php while($producto = $productos->fetch_object()): ?>
                    
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
                            <?= $producto->unidades ?>
                        </td>
                    </tr>            

                <?php endwhile; ?>

            </tbody>

        </table>

    <?php endif; ?>

    <a href="<?= BASE_URL ?>carrito/delete_all" class="button">Aceptar</a>

<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>

    <h1>Tu pedido no ha podido procesarse.</h1>

<?php endif; ?>