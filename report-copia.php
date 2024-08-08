<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título del Reportaje</title>
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

        .date-format {
            border: none;
            background: none;
            padding: 0;
            font-size: 1rem;
            color: #6c757d;
            margin-left: 5px;
        }

        .date-source {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 5px;
        }

        .btn-back {
            background-color: #007bff;
            color: white;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .date-source {
                flex-direction: row;
                align-items: flex-start;
            }
            .date-source p,
            .date-source span {
                margin-left: 0;
                margin-right: 0;
            }
        }

        @media (min-width: 769px) {
            .date-source {
                flex-direction: row;
                align-items: center;
            }
        }

        /* Eliminar márgenes innecesarios */
        .report h1,
        .report img,
        .report .date-source,
        .report small,
        .report h5,
        .report p {
            margin-top: 0;
            margin-bottom: 5px;
        }

        /* Alinear elementos a la izquierda y ajustar tamaño del contenedor */
        .content-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .col-12.position-relative {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .report img {
            align-self: center;
        }

        /* Estilos para el texto de marca de agua */
        .watermark {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.8rem; /* Ajuste del tamaño de fuente */
            color: #999;
            opacity: 0.6;
        }

        /* Configuración de la separación */
        .watermark-separation {
            margin-top: 15px; /* Separación de 15px del botón de atrás */
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="report">
            <div class="row justify-content-center">
                <div class="col-12 position-relative">
                    <div class="content-container">
                        <h1>Elecciones en Venezuela</h1>
                        <img src="assets/img/reportaje/mc.png" class="img-fluid rounded mt-1" alt="Reportaje">
                        <div class="date-source">
                            <p>FUENTE (VES) — Venezolanos en Sajonia...</p>
                        </div>
                        <small class="text-muted">Publicado • 28 Jul 2024</small>
                        <h5>Mañana comienza el cambio en Venezuela con la nueva presidente de Venezuela</h5>
                        <p class="report-description">=lorem()  Este curso de acuarela es una puerta de entrada...</p>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-back" onclick="history.back()">Ir Atrás</button>
                </div>
                <div class="col-12 watermark-separation">
                    <p class="watermark">Desarrollado por Daniel Lugo</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
