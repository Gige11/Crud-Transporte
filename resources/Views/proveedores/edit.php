<!DOCTYPE html>
<html lang="es">

<head>
    <title>Transporte Veloz</title>
    <?php require("../resources/Views/head.php") ?>
</head>

<body>
    <?php require("../resources/Views/header.php") ?>

    <div class="container my-5 d-flex justify-content-center align-items-center altaProveedor" id="altaProveedor" style="height: 80vh;">
        <section class="main bg-white p-4 shadow rounded" style="width: 60%;">

            <div class="form-group row">
                <div class="col-md-6">
                    <a href="/proveedores" class="btn btn-dark">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
                <div class="col-md-12 text-center mb-4">
                    <h3>Proveedores (edición)</h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form class="form" role="form" action="/proveedores/<?= $proveedores['ID'] ?>" method="post">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="IDProveedor">ID:</label>
                                <input class="form-control" name="ID" id="ID" type="text" value="<?= $proveedores["ID"] ?>" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="Nombre">Nombre:</label>
                                <input class="form-control" name="Nombre" id="Nombre" type="text" maxlength="50" value="<?= $proveedores["Nombre"] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Direccion">Dirección:</label>
                                <input class="form-control" name="Direccion" id="Direccion" type="text" maxlength="255" value="<?= $proveedores["Direccion"] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="IDLocalidad">Localidad:</label>
                                <select class="form-control form-control-sm" name="IDLocalidad" id="IDLocalidad" required>
                                    <?php foreach ($localidades ?? [] as $localidad) : ?>
                                        <option value="<?= $localidad['ID'] ?>" <?= ($localidad['ID'] == $proveedores['IDLocalidad']) ? 'selected' : '' ?>><?= $localidad['Nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="TipoIVA">Tipo de IVA:</label>
                                <input class="form-control" name="TipoIVA" id="TipoIVA" type="text" value="<?= $proveedores['TipoIVA'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="DNI">DNI:</label>
                                <input class="form-control" name="DNI" id="DNI" type="text" value="<?= $proveedores['DNI'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="CUIT">CUIT:</label>
                                <input class="form-control" name="CUIT" id="CUIT" type="text" value="<?= $proveedores['CUIT'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="Telefono">Teléfono:</label>
                                <input class="form-control" name="Telefono" id="Telefono" type="text" value="<?= $proveedores['Telefono'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Email">Email:</label>
                                <input class="form-control" name="Email" id="Email" type="email" value="<?= $proveedores['Email'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Observaciones">Observaciones:</label><br>
                            <textarea class="form-control" name="Observaciones" id="Observaciones" rows="4" cols="50"><?= $proveedores['Observaciones'] ?></textarea>
                        </div>
                        <br>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-custom">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        </section>
    </div>
    <?php require("../resources/Views/footer.php") ?>
</body>

</html>
