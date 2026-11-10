<?php
include "conexion.php";

$mensaje = "";
$tipo = "";

if (isset($_POST["guardar"])) {

    $autor  = mysqli_real_escape_string($conexion, $_POST["autor"]);
    $titulo = mysqli_real_escape_string($conexion, $_POST["titulo"]);
    $fecha  = mysqli_real_escape_string($conexion, $_POST["fecha_publicacion"]);

    if ($_FILES["portada"]["error"] == 0) {

        $imagen = file_get_contents($_FILES["portada"]["tmp_name"]);
        $imagen = mysqli_real_escape_string($conexion, $imagen);

        $sql = "INSERT INTO libros (autor, titulo, fecha_publicacion, portada)
                VALUES ('$autor', '$titulo', '$fecha', '$imagen')";

        if (mysqli_query($conexion, $sql)) {
            $mensaje = "El libro se registró correctamente.";
            $tipo = "success";
        } else {
            $mensaje = "Error al registrar: " . mysqli_error($conexion);
            $tipo = "danger";
        }

    } else {
        $mensaje = "Hubo un problema con la imagen. Verifica que pese menos de 2 MB.";
        $tipo = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Librería - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Librería</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="registro.php">Registro</a></li>
                    <li class="nav-item"><a class="nav-link" href="consulta.php">Consulta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Registrar libro</h4>
                    </div>
                    <div class="card-body">

                        <?php if ($mensaje != "") { ?>
                            <div class="alert alert-<?php echo $tipo; ?>">
                                <?php echo $mensaje; ?>
                            </div>
                        <?php } ?>

                        <form action="registro.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="autor" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" maxlength="100" required>
                            </div>

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="150" required>
                            </div>

                            <div class="mb-3">
                                <label for="fecha_publicacion" class="form-label">Fecha de publicación</label>
                                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
                            </div>

                            <div class="mb-3">
                                <label for="portada" class="form-label">Imagen de portada</label>
                                <input type="file" class="form-control" id="portada" name="portada" accept="image/*" required>
                                <div class="form-text">Formatos JPG o PNG, menos de 2 MB.</div>
                            </div>

                            <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                            <a href="consulta.php" class="btn btn-outline-secondary">Ver libros</a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>