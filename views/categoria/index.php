<h1>Gestionar categorías</h1>

<?php if (isset($_SESSION['create_category']) && $_SESSION['create_category'] === 'complete'): ?>
        
    <strong class="alert_green">Categoría creada correctamente.</strong>    

<?php 

    endif;
    Utils::deleteSession('create_category');

    if (isset($_SESSION['update_category']) && $_SESSION['update_category'] === 'complete'):
?>

    <strong class="alert_green">Categoría modificada correctamente.</strong>    

<?php 

    endif;
    Utils::deleteSession('update_category');

    if (isset($_SESSION['delete_category']) && $_SESSION['delete_category'] === 'complete'):
?>

    <strong class="alert_green">Categoría eliminada correctamente.</strong>    

<?php 

    endif;
    Utils::deleteSession('delete_category');

?>

<div>
    <a href="<?= BASE_URL ?>categoria/crear" class="button button-small button-category button-gestion">Crear categoría</a>
    <a href="<?= BASE_URL ?>categoria/modificar" class="button button-small button-yellow button-category button-gestion">Modificar categoría</a>
    <a href="<?= BASE_URL ?>categoria/eliminar" class="button button-small button-red button-category button-gestion">Eliminar categoría</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>   
    <?php while($categoria = $categorias->fetch_object()): ?>
        <tr>
            <td><?= $categoria->id ?></td>
            <td><?= $categoria->nombre ?></td>
        </tr>
    <?php endwhile; ?>
</table>