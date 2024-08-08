<?php
include 'db.php'; // Asegúrate de que db.php esté en el mismo directorio

// === Operaciones CRUD ===
$message = '';

// Crear
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $categoria = $_POST['categoria'];
    $fuente = $_POST['fuente'];
    $published_date = $_POST['published_date'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO report_blog (title, image, categoria, fuente, published_date, sub_title, description) 
            VALUES ('$title', '$image', '$categoria', '$fuente', '$published_date', '$sub_title', '$description')";
    if ($conn->query($sql) === TRUE) {
        $message = 'Nuevo registro creado exitosamente';
    } else {
        $message = 'Error: ' . $sql . '<br>' . $conn->error;
    }
}

// Leer
$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = "SELECT * FROM report_blog WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
$result = $conn->query($sql);

// Paginación
$results_per_page = 10;
$number_of_results = $result->num_rows;
$number_of_pages = ceil($number_of_results / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

$sql = "SELECT * FROM report_blog WHERE title LIKE '%$search%' OR description LIKE '%$search%' LIMIT $this_page_first_result, $results_per_page";
$result = $conn->query($sql);

// Actualizar
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $categoria = $_POST['categoria'];
    $fuente = $_POST['fuente'];
    $published_date = $_POST['published_date'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];

    $sql = "UPDATE report_blog 
            SET title='$title', image='$image', categoria='$categoria', fuente='$fuente', published_date='$published_date', sub_title='$sub_title', description='$description' 
            WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $message = 'Registro actualizado exitosamente';
    } else {
        $message = 'Error actualizando el registro: ' . $conn->error;
    }
}

// Eliminar
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM report_blog WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $message = 'Registro eliminado exitosamente';
    } else {
        $message = 'Error eliminando el registro: ' . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Reportes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .btn-small {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mt-4">CRUD de Reportes</h2><br>

    <?php if (!empty($message)): ?>
        <script>
            Swal.fire({
                title: 'Resultado',
                text: '<?php echo $message; ?>',
                icon: '<?php echo strpos($message, "Error") === false ? "success" : "error"; ?>'
            });
        </script>
    <?php endif; ?>

    <!-- === Formulario de Crear/Actualizar === -->
    <form action="crud.php" method="post" id="crudForm">
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder=" " required>
            <label for="title">Título</label>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="image" name="image" placeholder=" " required>
            <label for="image">Imagen</label>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="Noticia">Noticia</option>
                <option value="Evento">Evento</option>
                <option value="Información">Información</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fuente">Fuente:</label>
            <select class="form-control" id="fuente" name="fuente" required>
                <option value="Junta Directiva">Junta Directiva</option>
                <option value="Administrador">Administrador</option>
                <option value="Dpto Sistemas">Dpto Sistemas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="published_date">Fecha de Publicación:</label>
            <input type="date" class="form-control" id="published_date" name="published_date" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder=" " required>
            <label for="sub_title">Subtítulo</label>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="description" name="description" rows="3" placeholder=" " required></textarea>
            <label for="description">Descripción</label>
        </div>
        <button type="submit" name="create" class="btn btn-primary">Guardar</button>
        <button type="submit" name="update" class="btn btn-warning" style="display:none;">Actualizar</button>
    </form>

    <!-- === Sección de Búsqueda === -->
    <form action="crud.php" method="post" class="mt-4 mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar..." name="search">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <!-- === Tabla de Lectura === -->
    <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th>Categoría</th>
            <th>Fuente</th>
            <th>Fecha de Publicación</th>
            <th>Subtítulo</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>
                    <td><?php echo $row['fuente']; ?></td>
                    <td><?php echo $row['published_date']; ?></td>
                    <td><?php echo $row['sub_title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <button class="btn btn-info btn-small" onclick="editReport(<?php echo $row['id']; ?>, '<?php echo $row['title']; ?>', '<?php echo $row['image']; ?>', '<?php echo $row['categoria']; ?>', '<?php echo $row['fuente']; ?>', '<?php echo $row['published_date']; ?>', '<?php echo $row['sub_title']; ?>', '<?php echo $row['description']; ?>')">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        <form action="crud.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-small">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">No hay registros</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- === Paginación === -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>
                <li class="page-item <?php if (isset($_GET['page']) && $page == $_GET['page']) echo 'active'; ?>">
                    <a class="page-link" href="crud.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function editReport(id, title, image, categoria, fuente, published_date, sub_title, description) {
        document.getElementById('id').value = id;
        document.getElementById('title').value = title;
        document.getElementById('image').value = image;
        document.getElementById('categoria').value = categoria;
        document.getElementById('fuente').value = fuente;
        document.getElementById('published_date').value = published_date;
        document.getElementById('sub_title').value = sub_title;
        document.getElementById('description').value = description;

        // Mostrar el botón de actualizar y ocultar el botón de guardar
        document.querySelector('button[name="create"]').style.display = 'none';
        document.querySelector('button[name="update"]').style.display = 'block';
    }

    document.getElementById('crudForm').addEventListener('submit', function(event) {
        const formAction = event.submitter.name;
        if (formAction === 'update') {
            event.preventDefault(); // Evitar el envío del formulario
            // Enviar el formulario de manera programática
            const formData = new FormData(this);
            formData.append('update', true);

            fetch('crud.php', {
                method: 'POST',
                body: formData
            }).then(response => response.text()).then(data => {
                Swal.fire('Exito', 'Registro actualizado exitosamente', 'success')
                .then(() => {
                    window.location = 'crud.php';
                });
            }).catch(error => {
                Swal.fire('Error', 'Error actualizando el registro', 'error');
            });
        }
    });
</script>
</body>
</html>
