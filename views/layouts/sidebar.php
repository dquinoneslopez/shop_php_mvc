<!-- SIDEBAR -->
<aside id="lateral">
    <div id="login" class="block_aside">

        <?php if(!isset($_SESSION['identity'])): ?>

            <h3>Entrar a la web</h3>
            <form action="<?= BASE_URL ?>usuario/login" method="post">
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
            <li>
                <a href="">Mis pedidos</a>
            </li>
            <li>
                <a href="">Gestionar pedidos</a>
            </li>
            <li>
                <a href="">Gestionar categorías</a>
            </li>
            <?php if(isset($_SESSION['identity'])): ?>
            
                <li>
                    <a href="<?= BASE_URL ?>usuario/logout">Cerrar sesión</a>
                </li>
            
            <?php endif; ?>
 
        </ul>  

        
    </div>
</aside>


<!-- CONTENT -->
<div id="central">