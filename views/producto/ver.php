<?php if (isset($pro)): ?>
    <h1><?= $pro->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if ($pro->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="camiseta"/>
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta default">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="descripcion"><?= $pro->descripcion ?></p>
            <p class="price">$ <?= $pro->precio ?></p>
            <a href="" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>
