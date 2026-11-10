<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Librería - Inicio</title>
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="registro.php">Registro</a></li>
                    <li class="nav-item"><a class="nav-link" href="consulta.php">Consulta</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mt-5">

        <div class="p-5 bg-light rounded-3 text-center">
            <h1 class="display-5 fw-bold">Bienvenido a la Librería</h1>
            <p class="lead">Sistema para registrar y consultar los libros de nuestra librería.</p>
        </div>

        <div class="row mt-4 g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registrar libro</h5>
                        <p class="card-text">Agrega un libro nuevo con su autor, título, fecha de publicación y portada.</p>
                        <a href="registro.php" class="btn btn-primary">Ir a Registro</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Consultar libros</h5>
                        <p class="card-text">Revisa todos los libros registrados en la base de datos.</p>
                        <a href="consulta.php" class="btn btn-success">Ir a Consulta</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>