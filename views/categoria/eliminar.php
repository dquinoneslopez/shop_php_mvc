<h1>Eliminar categoría</h1>

<?php if(isset($_SESSION['delete_category']) && $_SESSION['delete_category'] === 'failed'): ?>

    <strong class="alert_red">Error al eliminar la categoría.</strong>

<?php endif ?>

<?php Utils::deleteSession('delete_category'); ?>

<form action="<?= BASE_URL ?>categoria/delete" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required>
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'],'nombre') : ''; ?>

    <input type="submit" value="Eliminar">
    
    <?php Utils::deleteErrors(); ?>
</form>

