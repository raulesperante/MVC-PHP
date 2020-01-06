<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>

    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido ha sido guardado con éxito</p>
    <p>Una vez que realices la transferencia bancaria con el coste
    del pedido, será procesado y enviado.</p>

<?php else: ?>
    <p>Tu pedido no ha podido procesarce</p>
<?php endif; ?>
