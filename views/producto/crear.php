<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar producto <?=$pro->nombre?></h1>
<?php    $url_action = base_url . 'producto/edit&id='.$pro->id; ?>
<?php else: ?>
    <h1>Crear nuevos productos</h1>
<?php    $url_action = base_url . 'producto/save'; ?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data"/>

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>">

<label for="descripcion">Descripcion</label>
<textarea name="descripcion" id="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

<label for="precio">Precio</label>
<input type="text" name="precio" id="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>">

<?php $stock = isset($pro) && is_object($pro) ? $pro->stock : 0;?>
<label for="stock">Stock</label>
<input type="number" name="stock" id="stock" value="<?=$stock?>">

<label for="categoria">Categoria</label>
<?php $categorias = Utils::showCategorias(); ?>
<select name="categoria" id="categoria">
    <?php while ($cat = $categorias->fetch_object()): ?>
        <option value="<?= $cat->id ?>"  <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected':'';?>>
            <?= $cat->nombre ?>
        </option>
    <?php endwhile; ?>
</select>

<label for="imagen">Imagen</label>
<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
<img src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" />
<?php endif; ?>
<input type="file" name="imagen" id="imagen">

<input type="submit" value="Guardar">

</form>
