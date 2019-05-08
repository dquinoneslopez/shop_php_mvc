<h1>Crear nueva categoría</h1>

<?php if(isset($_SESSION['create_category']) && $_SESSION['create_category'] === 'failed'): ?>

    <strong class="alert_red">Error al crear la categoría.</strong>

<?php endif ?>

<?php Utils::deleteSession('create_category'); ?>

<form action="<?= BASE_URL ?>categoria/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'],'nombre') : ''; ?>

    <input type="submit" value="Guardar">
    
    <?php Utils::deleteErrors(); ?>
</form>

