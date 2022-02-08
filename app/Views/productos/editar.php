<?= $cabecera ?>



<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos de productos</h5>
        <p class="card-text">
        <form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?=$producto['id']?>">

<div class="form-group">
    <label for="marca">Marca</label>
    <input id="marca" value="<?=$producto['marca']?>" class="form-control" type="text" name="marca">
</div>

<div class="form-group">
    <label for="producto">Producto</label>
    <input id="producto" value="<?=$producto['producto']?>" class="form-control" type="text" name="producto">
</div>

<div class="form-group">
    <label for="modelo">Modelo</label>
    <input id="modelo" value="<?=$producto['modelo']?>" class="form-control" type="text" name="modelo">
</div>

<div class="form-group">
    <label for="noserie">Serie</label>
    <input id="noserie" value="<?=$producto['noserie']?>" class="form-control" type="text" name="noserie">
</div>


<div class="form-group">
<label for="imagen">Imagen</label>
    
    <input id="my-input" class="form-control-file" type="file" name="imagen">
    <br>
    <img class="img-thumbnail" src="<?= base_url()
    ?>/uploads/<?=$producto['imagen'];?>"< width="100" alt="">
</div>

<br>
<button class="btn btn-success" type="submit">Actualizar</button>
<a href="<?= base_url('/productos'); ?>" class="btn btn-info"> Cancelar</a>
    
</form>
        </p>
    </div>
</div>




<?= $pie ?>