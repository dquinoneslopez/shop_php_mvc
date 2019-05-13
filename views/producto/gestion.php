<h1>Gestion de productos</h1>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto']='completed'): ?>

    <strong class="alert_green">Producto añadido correctamente.</strong>

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto']='failed'): ?>

    <strong class="alert_red">Error al añadir el producto.</strong>

<?php endif; ?>

<?= Utils::deleteSession('producto'); ?> 

<?php if(isset($_SESSION['delete']) && $_SESSION['delete']='completed'): ?>

    <strong class="alert_green">Producto eliminado correctamente.</strong>

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete']='failed'): ?>

    <strong class="alert_red">Error al eliminar el producto.</strong>

<?php endif; ?>

<?= Utils::deleteSession('delete'); ?> 

<a href="<?= BASE_URL ?>producto/crear" class="button button-small button-gestion">Crear producto</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>   
    <?php while($producto = $productos->fetch_object()): ?>
        <tr>
            <td><?= $producto->id ?></td>
            <td><?= $producto->nombre ?></td>
            <td><?= $producto->precio ?></td>
            <td><?= $producto->stock ?></td>
            <td>
            <a href="<?= BASE_URL ?>producto/editar&id=<?=$producto->id?>" class="button button-gestion button-yellow">Editar</a>
                <a href="<?= BASE_URL ?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>