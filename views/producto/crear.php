<h1>Crear nuevo producto</h1>

<div class="form-container">
    <form action="<?= BASE_URL ?>producto/save" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio">

        <label for="stock">Stock</label>
        <input type="number" name="stock" min="0">

        <?php $categorias = Utils::showCategories(); ?>
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php while($categoria = $categorias->fetch_object()): ?>
                <option value="<?= $categoria->id; ?>">
                    <?= $categoria->nombre; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" min="0">

        <input type="submit" value="Guardar">
    </form>
</div>
