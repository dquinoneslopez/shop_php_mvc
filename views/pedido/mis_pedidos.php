<?php if(isset($gestion)): ?>

    <h1>Gestionar pedidos</h1>

<?php else: ?>

    <h1>Mis pedidos</h1>

<?php endif; ?>



<table class="table">

    <thead>
        <th>Nº de pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </thead>

    <tbody>
    
        <?php while($pedido = $pedidos->fetch_object()): ?>

            <tr>
                <td>
                   <a href="<?= BASE_URL ?>pedido/detalle&id=<?= $pedido->id ?>"><?= $pedido->id ?></a>
                </td>
                <td>
                    <?= $pedido->coste ?>
                </td>
                <td>
                    <?= $pedido->fecha ?>
                </td>
                <td>
                    <?= Utils::showStatus($pedido->estado) ?>
                </td>
            </tr>            

        <?php endwhile; ?>

    </tbody>

</table>

