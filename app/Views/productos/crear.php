<?= $cabecera ?>
Formulario de creacion de producto


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de productos</h5>
        <p class="card-text">
        <form method="post" action="guardar" enctype="multipart/form-data">

<div class="form-group">
    <label for="marca">Marca</label>
    <input id="marca" value="<?=old('marca') ?>" class="form-control" type="text" name="marca">
</div>

<div class="form-group">
    <label for="producto">Producto</label>
    <input id="producto" value="<?=old('producto') ?>" class="form-control" type="text" name="producto">
</div>

<div class="form-group">
    <label for="modelo">Modelo</label>
    <input id="marcmodeloa" value="<?=old('modelo') ?>" class="form-control" type="text" name="modelo">
</div>

<div class="form-group">
    <label for="noserie">Serie</label>
    <input id="noserie" value="<?=old('seire') ?>" class="form-control" type="text" name="noserie">
</div>

<div class="form-group">
    <label for="imagen">Imagen</label>
    <input id="imagen" class="form-control" type="file" name="imagen">
</div>
<br>
<button class="btn btn-success" type="submit">Guardar</button>
<a href="<?= base_url('/productos'); ?>" class="btn btn-info"> Cancelar</a>

    
</form>
        </p>
    </div>
</div>




<?= $pie ?>