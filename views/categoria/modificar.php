<h1>Modificar categoría</h1>

<?php if(isset($_SESSION['update_category']) && $_SESSION['update_category'] === 'failed'): ?>

    <strong class="alert_red">Error al modificar la categoría.</strong>

<?php endif ?>

<?php Utils::deleteSession('update_category'); ?>

<form action="<?= BASE_URL ?>categoria/update" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'],'nombre') : ''; ?>

    <label for="nuevo_nombre">Nuevo nombre</label>
    <input type="text" name="nuevo_nombre" required>
    <?php echo isset($_SESSION['errores_nueva']) ? Utils::showError($_SESSION['errores_nueva'],'nombre_nuevo') : ''; ?>

    <input type="submit" value="Modificar">
    
    <?php Utils::deleteErrors(); ?>
</form>

