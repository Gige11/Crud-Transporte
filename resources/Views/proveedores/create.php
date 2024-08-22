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
                    <a href="/proveedores" class="btn btn-dark">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
                <div class="col-md-12 text-center mb-4">
                    <h3>Proveedores (altas)</h3>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form class="form" role="form" action="/proveedores" method="post">             
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Nombre">Nombre:</label>
                                <input class="form-control form-control-sm" name="Nombre" id="Nombre" type="text" maxlength="50" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Direccion">Dirección:</label>
                                <input class="form-control form-control-sm" name="Direccion" id="Direccion" type="text" maxlength="255" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="IDLocalidad">Localidad:</label>
                                <select class="form-control form-control-sm" name="IDLocalidad" id="IDLocalidad" required>
                                    <?php
                                    foreach ($localidades as $localidad) {
                                        echo "<option value='" . $localidad['ID'] . "'>" . $localidad['Nombre'] . "</option>";
                                    }
                                    ?>
                                </select>                                
                            </div>  
                            <div class="col-md-6">                  
                                    <label for="TipoIVA">Tipo de IVA</label>
                                    <select class="form-control form-control-sm" name="TipoIVA" id="TipoIVA" required>
                                        <option value="" selected disabled hidden>Selecciona una opción</option>
                                        <option value="Responsable Inscripto">Responsable Inscripto</option>
                                        <option value="Monotributista">Monotributista</option>                           
                                        <option value="Exento">Exento</option>
                                        <option value="Consumidor Final">Consumidor Final</option>
                                        <option value="No Responsable">No Responsable</option>                           
                                    </select>
                            </div>                              
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="DNI">DNI:</label>
                                <input class="form-control form-control-sm" name="DNI" id="DNI" type="text" required>
                            </div>
                            <div class="col-md-6">
                                <label for="CUIT">CUIT:</label>
                                <input class="form-control form-control-sm" name="CUIT" id="CUIT" type="text" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Telefono">Teléfono:</label>
                                <input class="form-control form-control-sm" name="Telefono" id="Telefono" type="text" required>
                            </div>

                            <div class="col-md-6">
                                <label for="Email">Email:</label>
                                <input class="form-control form-control-sm" name="Email" id="Email" type="email" required>
                            </div>
                        </div>  
                        
                        <div class="form-group">
                            <label for="Observaciones">Observaciones:</label><br>
                            <textarea class="form-control form-control-sm" name="Observaciones" id="Observaciones" rows="4" cols="50"></textarea>
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
