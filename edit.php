<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'] ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : '';

        if ($contrasena) {
            $stmt = $conn->prepare("UPDATE usuarios SET correo = ?, contrasena = ? WHERE id = ?");
            $stmt->bind_param("ssi", $correo, $contrasena, $id);
        } else {
            $stmt = $conn->prepare("UPDATE usuarios SET correo = ? WHERE id = ?");
            $stmt->bind_param("si", $correo, $id);
        }

        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $stmt = $conn->prepare("SELECT correo, contrasena FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($correo, $contrasena);
        $stmt->fetch();
        $stmt->close();
    }
} else {
    echo "ID no especificado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="edit.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
        <label for="contrasena">Contraseña (dejar en blanco para no cambiar):</label>
        <input type="password" id="contrasena" name="contrasena" value="">
        <button type="submit">Actualizar Usuario</button>
    </form>
    <a href="index.php">Volver a la lista</a>
</body>
</html>

<?php $conn->close(); ?>
