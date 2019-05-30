<?php if(isset($pedido)): ?>

    <h3>Detalles de envío</h3>
    Provincia: <?= $pedido->provincia ?> <br>
    Localidad: <?= $pedido->localidad ?> <br>
    Dirección: <?= $pedido->direccion ?> <br><br>

    <h3>Detalles del pedido</h3>
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

    <a href="<?= BASE_URL ?>pedido/mis_pedidos" class="button">Volver</a>

<?php endif; ?>