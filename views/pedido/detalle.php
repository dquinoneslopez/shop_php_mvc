  <h1>Detalles de envío</h1>
  
  <?php if(isset($pedido)): ?>

    <?php if(isset($_SESSION['admin'])): ?>

        <h3>Cambiar estado del envío</h3>

        <form action="<?= BASE_URL ?>pedido/estado" method="post">

            <input type="hidden" name="pedido_id" value="<?= $pedido->id ?>">
            <select name="estado">
                <option value="confirmed" <?= $pedido->estado == "confirmed" ? 'selected' : ''; ?>>Pendiente</option>
                <option value="preparation" <?= $pedido->estado == "preparation" ? 'selected' : ''; ?>>En preparación</option>
                <option value="ready" <?= $pedido->estado == "ready" ? 'selected' : ''; ?>>Preparado para envío</option>
                <option value="sent" <?= $pedido->estado == "sent" ? 'selected' : ''; ?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">

        </form>

    <?php endif; ?>
  
    Provincia: <?= $pedido->provincia ?> <br>
    Localidad: <?= $pedido->localidad ?> <br>
    Dirección: <?= $pedido->direccion ?> <br><br>

    <h3>Detalles del pedido</h3>
    Estado: <?= Utils::showStatus($pedido->estado) ?> <br>
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