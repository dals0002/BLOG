<?php
// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    die("ID no definido.");
}

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evento_registro";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del reporte específico
$sql = "SELECT * FROM report_blog WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $report = $result->fetch_assoc();
} else {
    die("No se encontró el reporte.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($report['title']); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .report small,
        .report p {
            margin-bottom: 0;
        }

        .report p {
            margin-top: 5px;
        }

        .report h5 {
            color: #007bff;
            margin-top: 20px;
        }

        .report-description::first-letter {
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <button class="btn btn-danger mb-3" onclick="window.close();">X</button>
        <div class="report">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo htmlspecialchars($report['title']); ?></h1>
                    <input type="date" class="form-control mb-2" value="<?php echo date('Y-m-d'); ?>" disabled>
                    <img src="<?php echo htmlspecialchars($report['image']); ?>" class="img-fluid rounded mt-3" alt="Reportaje">
                    <small class="text-muted d-block mt-2">Publicado hace • <?php echo htmlspecialchars($report['time']); ?></small>
                    <p class="mt-2">FUENTE (VES) — Venezolanos en Sajonia...</p>
                </div>
                <div class="col-12 mt-3">
                    <h5>Mañana se comienza el cambio en Venezuela con la nueva presidente de Venezuela</h5>
                    <p class="report-description"><?php echo htmlspecialchars($report['description']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
