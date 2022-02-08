<?= $cabecera ?>
<br>
Listado de productos
<br>
<a class="btn btn-success" href="<?= base_url('crear')?>">Crear Producto</a>
<br>
<br>
        <table class="table table-light">
            <thead class="thead-light">
                
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Producto</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($productos as $producto): ?>
                <tr>
                    <td><?=$producto['id']?></td>
                    <td><?=$producto['marca']?></td>
                    <td><?=$producto['producto']?></td>
                    <td><?=$producto['modelo']?></td>
                    <td><?=$producto['noserie']?></td>
                    <td>
                        <img class="img-thumbnail" src="<?= base_url()
                        ?>/uploads/<?=$producto['imagen'];?>"< width="100" alt="">
                    </td>
                    
                    <td>
                    <a href="<?=base_url('editar/'.$producto['id']); ?>" class="btn btn-info" type="button">Editar</a>
                                        
                    <a href="<?=base_url('borrar/'.$producto['id']); ?>" class="btn btn-danger" type="button">Borrar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pie ?>
