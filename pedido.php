<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        // Agregar un pedido
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];

        $stmt = $conn->prepare("INSERT INTO pedidos (producto_id, cantidad) VALUES (?, ?)");
        $stmt->bind_param("ii", $producto_id, $cantidad);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Producto agregado al carrito"]);
        } else {
            echo json_encode(["error" => "Error: " . $stmt->error]);
        }

        $stmt->close();
        break;

    case 'GET':
        // Listar todos los pedidos
        $result = $conn->query("SELECT * FROM pedidos");

        $pedidos = [];
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }

        echo json_encode($pedidos);
        break;

    case 'DELETE':
        // Eliminar un pedido
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id = $_DELETE['id'];

        $stmt = $conn->prepare("DELETE FROM pedidos WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Pedido eliminado"]);
        } else {
            echo json_encode(["error" => "Error: " . $stmt->error]);
        }

        $stmt->close();
        break;

    case 'PUT':
        // Modificar un pedido
        parse_str(file_get_contents("php://input"), $_PUT);
        $id = $_PUT['id'];
        $cantidad = $_PUT['cantidad'];

        $stmt = $conn->prepare("UPDATE pedidos SET cantidad = ? WHERE id = ?");
        $stmt->bind_param("ii", $cantidad, $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Pedido actualizado"]);
        } else {
            echo json_encode(["error" => "Error: " . $stmt->error]);
        }

        $stmt->close();
        break;
}

$conn->close();
?>
