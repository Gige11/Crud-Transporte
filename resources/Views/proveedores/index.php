<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporte Veloz</title>
    <?php require("../resources/Views/head.php") ?>   
    <script src="..\..\js\buscador.js"></script>
</head>

<body>   
    <?php require("../resources/Views/header.php") ?>

    <div class="container-fluid p-4">       
        <br>
        <div class="card shadow mb-4">              
            <div class="card-header py-3 d-flex justify-content-between">
                <div class="col-lg-6">
                    <h4 class="m-0 font-weight-bold text-secundary">Proveedores</h4>
                    <br>
                    <a href="/proveedores/alta" class="btn btn-nuevo">Nuevo Proveedor</a>
                </div>
                <div class="col-lg-2 mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar Proveedor">
                </div>
            </div>                      
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead id="tableHead">                          
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Localidad</th>
                                <th>Tipo de Iva</th>
                                <th>DNI</th>
                                <th>CUIT</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Observaciones</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registros['data'] as $proveedor): ?>       
                                <tr>
                                    <td><strong><?= $proveedor['ID'] ?></strong></td>
                                    <td><?= $proveedor['Nombre'] ?></td>
                                    <td><?= $proveedor['Direccion'] ?></td>
                                    <td>
                                        <?php foreach ($localidades as $localidad) {
                                            if ($proveedor['IDLocalidad'] === $localidad['ID']) {
                                                echo $localidad['Nombre'];
                                            }
                                        } ?>
                                    </td>
                                    <td><?= $proveedor['TipoIVA'] ?></td>
                                    <td><?= $proveedor['DNI'] ?></td>
                                    <td><?= $proveedor['CUIT'] ?></td>
                                    <td><?= $proveedor['Telefono'] ?></td>
                                    <td><?= $proveedor['Email'] ?></td>
                                    <td><?= $proveedor['Observaciones'] ?></td>
                                    <td align='center'>
                                        <a href="/proveedores/<?= $proveedor['ID'] ?>/modificar">
                                            <i class='bi bi-pencil-fill icono-editar' title='Editar registro'></i>
                                        </a>
                                    </td>
                                    <td align='center'>
                                        <form action="/proveedores/<?= $proveedor['ID'] ?>/baja" method="post" onSubmit="return confirma_borrar()">
                                            <button type="submit" style="background:none;border:none;">
                                                <i class='bi bi-trash-fill icono-borrar' title='Borrar registro'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="paginacion">
            <?php require("../resources/Views/assets/pagination.php") ?>
        </div>           
    </div>

    <script>
        function confirma_borrar() {
            return confirm("¿Estás seguro de que quieres eliminar este proveedor?");
        }
    </script>
    
    <?php require("../resources/Views/footer.php") ?>                               
</body>

</html>
