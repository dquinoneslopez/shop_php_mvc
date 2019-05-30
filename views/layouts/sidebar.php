<!-- SIDEBAR -->
<aside id="lateral">

    <?php if(isset($_SESSION['identity'])): ?>

        <div id="carrito" class="block_aside">
        
            <h3>Mi carrito</h3>
            <ul>
                <?php $stats =  Utils::statsCarrito(); ?>
                <li><a href="<?=BASE_URL?>carrito/index">Productos(<?= $stats['count'] ?>)</a></li>
                <li><a href="<?=BASE_URL?>carrito/index">Total: <?= $stats['total'] ?></a></li>
                <li><a href="<?=BASE_URL?>carrito/index">Ver el carrito</a></li>
            </ul>

        </div>

    <?php endif; ?>

    <div id="login" class="block_aside">

        <?php if(!isset($_SESSION['identity'])): ?>

            <h3>Entrar a la web</h3>

            <?php if(isset($_SESSION['login']) && !$_SESSION['login']): ?>

                <strong class="alert_red">Login fallido.</strong>

                <?php Utils::deleteSession('login'); ?>
                
            <?php endif ?>

            <form action="<?=BASE_URL?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Entrar">
            </form>

        <?php else: ?>

            <h3><?= $_SESSION['identity']->nombre.' '.$_SESSION['identity']->apellidos ?></h3>

        <?php endif; ?>

        <ul>

            <?php if(isset($_SESSION['admin'])): ?>
                <li>
                    <a href="<?=BASE_URL?>categoria/index">Gestionar categorías</a>
                </li>
                <li>
                    <a href="<?=BASE_URL?>producto/gestion">Gestionar productos</a>
                </li>
                <li>
                    <a href="<?=BASE_URL?>pedido/gestion">Gestionar pedidos</a>
                </li>

            <?php endif; ?>

            <?php if(isset($_SESSION['identity'])): ?>
                <li>
                    <a href="<?= BASE_URL ?>pedido/mis_pedidos">Mis pedidos</a>
                </li>
                <li>
                    <a href="<?=BASE_URL?>usuario/logout">Cerrar sesión</a>
                </li>
            
            <?php else: ?>

                <li>
                    <a href="<?=BASE_URL?>usuario/registro">Registrarse</a>
                </li>
            
            <?php endif; ?>
 
        </ul>  

        
    </div>
</aside>


<!-- CONTENT -->
<div id="central">