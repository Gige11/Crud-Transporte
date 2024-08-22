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
                    <h4 class="m-0 font-weight-bold text-secundary">Localidades</h4>
                    <br>
                    <a href="/localidades/alta" class="btn btn-nuevo">Nueva Localidad</a>
                </div>
                <div class="col-lg-3 mb-3">
                    <form action = "/localidades" class ="flex" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Buscar Localidad">
                            <button class="btn btn btn-dark" type="submit" id="search">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>                      
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead id="tableHead">                          
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Nombre</th>
                                <th>Codigo Postal</th>
                                <th>Provincia</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registros['data'] as $localidad): ?>       
                                <tr>
                                    <td>
                                        <strong>
                                            <?= $localidad['ID'] ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <?= $localidad['Nombre'] ?>
                                    </td>
                                    <td>
                                        <?= $localidad['CodigoPostal'] ?>
                                    </td>
                                    <td>
                                        <?php foreach ($provincias as $provincia) {
                                            if ($localidad['idProvincia'] === $provincia['idprovincia']) {
                                                echo $provincia['nombre'];
                                            }
                                        } ?>
                                    </td>
                                    <td align='center'>
                                        <a href="/localidades/<?= $localidad['ID'] ?>/modificar">
                                            <i class='bi bi-pencil-fill icono-editar' title='Editar registro'></i>
                                        </a>
                                    </td>
                                    <td align='center'>
                                        <form action="/localidades/<?= $localidad['ID'] ?>/baja" method="post" onSubmit="return confirma_borrar()">
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
            return confirm("¿Estás seguro de que quieres eliminar esta localidad?");
        }
    </script>
    
    <?php require("../resources/Views/footer.php") ?>                               
</body>
</html>
