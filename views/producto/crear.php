<?php if (isset($edit) && isset($prod) && is_object($prod)): ?>

    <h1>Editar producto <?= $prod->nombre?></h1>
    <?php $url_action= BASE_URL."producto/save&id=".$prod->id; ?>

<?php else: ?>

    <h1>Crear nuevo producto</h1>
    <?php $url_action= BASE_URL."producto/save"; ?>

<?php endif; ?>

<div class="form-container">

    <form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($prod) && is_object($prod) ? $prod->nombre : '';?>">

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" cols="30" rows="10"><?= isset($prod) && is_object($prod) ? $prod->descripcion : '';?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="<?= isset($prod) && is_object($prod) ? $prod->precio : '';?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" min="0" value="<?= isset($prod) && is_object($prod) ? $prod->stock : '';?>">

        <?php $categorias = Utils::showCategories(); ?>
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php while($categoria = $categorias->fetch_object()): ?>
                <option value="<?= $categoria->id; ?>" <?= isset($prod) && is_object($prod) && ($categoria->id == $prod->categoria_id) ? 'selected' : '';?>>
                    <?= $categoria->nombre; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if(isset($prod) && is_object($prod) && !empty($prod->imagen)):?>

            <img src="<?= BASE_URL ?>uploads/images/<?= $prod->imagen ?>" class="thumb">

        <?php endif; ?>
        <input type="file" name="imagen" min="0" value="<?= isset($prod) && is_object($prod) ? $prod->imagen : '';?>">

        <input type="submit" value="Guardar">
    </form>
</div>
