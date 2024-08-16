<!DOCTYPE html>
<html>
<head>
    <title>Registro de Cliente</title>
    <script>
        function limpiarFormulario() {
            document.getElementById("formularioCliente").reset();
        }
    </script>
</head>
<body>
    <h2>Formulario de Registro de Cliente</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cliente";


        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $id_cliente = $_POST["id_cliente"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];
        $direccion = $_POST["direccion"];
        $correo_electronico = $_POST["correo_electronico"];

        $sql = "INSERT INTO cliente (id_Cliente, nombre, apellido, edad, sexo, direccion, Correo_Electronico)
                VALUES ('$id_cliente', '$nombre', '$apellido', '$edad', '$sexo', '$direccion', '$correo_electronico')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado con éxito";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <form id="formularioCliente" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="id_cliente">ID Cliente:</label><br>
        <input type="text" id="id_cliente" name="id_cliente"><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad"><br><br>

        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion"><br><br>

        <label for="correo_electronico">Correo Electrónico:</label><br>
        <input type="email" id="correo_electronico" name="correo_electronico"><br><br>

        <input type="submit" name="guardar" value="Guardar">
        <button type="button" onclick="limpiarFormulario()">Limpiar</button>
    </form>
</body>
</html>

