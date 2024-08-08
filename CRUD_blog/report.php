<?php
// === Configuración de la base de datos ===
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

// === Obtener datos del reporte específico ===
$id = $_GET['id'];
$sql = "SELECT * FROM report_blog WHERE id = $id";
$result = $conn->query($sql);
$report = $result->fetch_assoc();

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
</head>
<body>
    <div class="container mt-4">
        <button class="btn btn-danger mb-3" onclick="window.close();">X</button>
        <div class="report">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo htmlspecialchars($report['title']); ?></h1>
                    <small class="text-muted">Publicado el • <?php echo htmlspecialchars($report['published_date']); ?></small>
                    <img src="<?php echo htmlspecialchars($report['image']); ?>" class="img-fluid rounded mt-3" alt="Reportaje">
                </div>
                <div class="col-12 mt-3">
                    <p>FUENTE (<?php echo htmlspecialchars($report['categoria']); ?>) — <?php echo htmlspecialchars($report['fuente']); ?></p>
                    <h5><?php echo htmlspecialchars($report['sub_title']); ?></h5>
                    <p><?php echo htmlspecialchars($report['description']); ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
