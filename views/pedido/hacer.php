<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
    </p>
    <br>
    <h3>Dirección para el envío</h3>
    <form action="<?= base_url ?>pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" id="provincia" name="provincia" required>

        <label for="localidad">Localidad</label>
        <input type="text" id="localidad" name="localidad" required>

        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" required>

        <input type="submit" value="Confirmar">
    </form>

<?php else: ?>
    <h1>Necesitas estar indentificado</h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>
