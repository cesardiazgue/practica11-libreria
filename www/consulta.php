<?php
include "conexion.php";

$sql = "SELECT * FROM libros ORDER BY id";
$resultado = mysqli_query($conexion, $sql);
$total = mysqli_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Librería - Consulta</title>
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
                    <li class="nav-item"><a class="nav-link" href="registro.php">Registro</a></li>
                    <li class="nav-item"><a class="nav-link active" href="consulta.php">Consulta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Libros registrados <span class="badge bg-secondary"><?php echo $total; ?></span></h2>
            <a href="registro.php" class="btn btn-primary">+ Registrar libro</a>
        </div>

        <?php if ($total == 0) { ?>

            <div class="alert alert-info">Aún no hay libros registrados.</div>

        <?php } else { ?>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Portada</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Fecha de publicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($resultado)) {
                            $info = getimagesizefromstring($fila["portada"]);
                            $imagen = base64_encode($fila["portada"]);
                        ?>
                            <tr>
                                <td><?php echo $fila["id"]; ?></td>
                                <td>
                                    <img src="data:<?php echo $info["mime"]; ?>;base64,<?php echo $imagen; ?>"
                                         class="img-thumbnail" width="80" alt="Portada">
                                </td>
                                <td><?php echo htmlspecialchars($fila["titulo"]); ?></td>
                                <td><?php echo htmlspecialchars($fila["autor"]); ?></td>
                                <td><?php echo date("d/m/Y", strtotime($fila["fecha_publicacion"])); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        <?php } ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conexion); ?>