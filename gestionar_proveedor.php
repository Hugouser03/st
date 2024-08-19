<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "deportes";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Agregar o modificar proveedor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    if ($id) {
        // Modificar proveedor
        $sql = "UPDATE proveedores SET nombre='$nombre', marca='$marca', contacto='$contacto', telefono='$telefono', email='$email' WHERE id=$id";
    } else {
        // Agregar nuevo proveedor
        $sql = "INSERT INTO proveedores (nombre, marca, contacto, telefono, email) VALUES ('$nombre', '$marca', '$contacto', '$telefono', '$email')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Eliminar proveedor
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM proveedores WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Obtener proveedores para mostrar en la tabla
$sql = "SELECT * FROM proveedores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Proveedores</title>
</head>
<body>
    <li><a href="index.php">Inicio</a></li>
    <h1>Registro de Proveedores de Marcas Deportivas</h1>

    <form action="gestionar_proveedor.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        
        <label for="nombre">Nombre del Proveedor:</label>
        <input type="text" name="nombre" required value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>"><br>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" required value="<?php echo isset($_GET['marca']) ? $_GET['marca'] : ''; ?>"><br>

        <label for="contacto">Nombre del Contacto:</label>
        <input type="text" name="contacto" required value="<?php echo isset($_GET['contacto']) ? $_GET['contacto'] : ''; ?>"><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ''; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>"><br>

        <button type="submit"><?php echo isset($_GET['edit']) ? 'Modificar' : 'Agregar'; ?> Proveedor</button>
    </form>

    <h2>Lista de Proveedores</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Contacto</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['marca']; ?></td>
                    <td><?php echo $row['contacto']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="gestionar_proveedor.php?edit=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre']; ?>&marca=<?php echo $row['marca']; ?>&contacto=<?php echo $row['contacto']; ?>&telefono=<?php echo $row['telefono']; ?>&email=<?php echo $row['email']; ?>">Editar</a>
                        <a href="gestionar_proveedor.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay proveedores registrados.</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
