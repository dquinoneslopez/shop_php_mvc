<h1>Gestion de productos</h1>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto']='completed'): ?>

    <strong class="alert_green">Producto añadido correctamente.</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']='failed'): ?>

    <strong class="alert_red">Error al añadir el producto.</strong>

<?php endif; ?>

<?= Utils::deleteSession('producto'); ?> 

<div>
    <a href="<?= BASE_URL ?>producto/crear" class="button button-small button-category button-gestion">Crear producto</a>
    <a href="<?= BASE_URL ?>producto/modificar" class="button button-small button-yellow button-category button-gestion">Modificar producto</a>
    <a href="<?= BASE_URL ?>producto/eliminar" class="button button-small button-red button-category button-gestion">Eliminar producto</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>   
    <?php while($producto = $productos->fetch_object()): ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->stock ?></td>
        </tr>
    <?php endwhile; ?>
</table>