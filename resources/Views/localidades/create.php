<!DOCTYPE html>
<html lang="es">
<head>
    <title>Transporte Veloz</title>
    <?php require("../resources/Views/head.php") ?>
</head>

<body>
    <?php require("../resources/Views/header.php")?>

    <div class="container my-5 d-flex justify-content-center align-items-center altaProveedor" id="altaProveedor"  style="height: 80vh;">
        <section class="main bg-white p-4 shadow rounded" style="width: 60%;">
        
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="/localidades" class="btn btn-dark">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
                <div class="col-md-12 text-center mb-4">
                    <h3>Localidades (altas)</h3>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form class="form" role="form" action="/localidades" method="post">             
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Nombre">Nombre:</label>
                                <input class="form-control form-control-sm" name="Nombre" id="Nombre" type="text" maxlength="50" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Direccion">Codigo Postal:</label>
                                <input class="form-control form-control-sm" name="CodigoPostal" id="CodigoPostal" type="text" maxlength="10" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="idProvincia">Provincia:</label>
                                <select class="form-control form-control-sm" name="idProvincia" id="idProvincia" required>
                                    <?php
                                    foreach ($provincias as $provincia) {
                                        echo "<option value='" . $provincia['idprovincia'] . "'>" . $provincia['nombre'] . "</option>";
                                    }
                                    ?>
                                </select>                                
                            </div>  
                        </div>            
                        <br>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-custom mr-2">Guardar</button>
                            </div>
                        </div>
                        <br>                
                    </form>
                </div>
            </div>     
            <div class="row">
                <div class="col-md-12"><hr></div>
            </div>
        </section>
    </div>
    <?php require("../resources/Views/footer.php") ?>
</body>

</html>
