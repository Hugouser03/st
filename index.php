<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

// Obtener registros
$sql = "SELECT id, correo FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda deportiva</title>
  <link rel="stylesheet" href="styles1.css">
</head>
<body>
  <header class="header">
    <div class="menu container">
      <a href="#" class="logo">Slick</a>
      <input type="checkbox" id="menu">
      <label for="menu">
        <img src="images/menu.png" class="menu-icono" alt="">
      </label>
      <nav class="navbar">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="personalizar.html">Personalización</a></li>
          <li><a href="carrito.html">Productos</a></li>
          <li><a href="login.php">Iniciar sesion</a></li>
          <li><a href="gestionar_proveedor.php">Registro Marcas</a></li>

        </ul>
      </nav>
    </div>
  
    <div class="header-content container">
      <h1>Slicksters</h1>
      <p> 
        Bienvenido a nuestra tienda deportiva,
        gracias por tener en cuenta nuestra tienda
        al momento de elegir opciones.
      </p>
       <a href="personalizar.html" class="btn-1">Informacion</a>
    </div>
  </header>

  <section class="coffee">
    <img class="coffee-img" src="salepng" alt="">
    <div class="coffee-content container">
        <h2>Elige tus marcas favoritas</h2>
          <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Id voluptatem modi dicta, 
          dolores ab corporis hic. Dignissimos 
          eveniet esse dolor vero architecto. Temporibus veritatis fure 
          eum at quae obcaecati explicabo?
        </p>
        <div class="coffee-group">
          <div class="coffee-1">
            <a href="Adidas.html"><img src="adidas.jpg" alt=""></a>
            <h3>Adidas</h3>
            <p>
              Contamos con muchas ofertas en esta marca,
              como también descuentos.
            </p>
          </div>
          <div class="coffee-1">
            <a href="Puma.html"> <img src="puma.jpg" alt=""></a>
            <h3>Puma</h3>
            <p>
              Contamos con muchas ofertas en esta marca,
              como también descuentos.
            </p>
          </div>
          <div class="coffee-1">
            <a href="Nike.html"><img src="nike.png" alt=""></a>
            <h3>Nike</h3>
             <p>
              Contamos con muchas ofertas en esta marca,
              como también descuentos.
            </p>
          </div>
        </div>
          <a href="#" class="btn-1">Información</a>
     </div>
  </section>

  <main class="services">
    <div class="services-content container">
        <h2>Nuestros servicios</h2>
        <div class="services-group">
            <div class="services-1">
                <img src="per.jpg" alt="">
                <h3>Personalización</h3>
            </div>
            <div class="services-1">
                <img src="envio.png" alt="">
                <h3>Envío a domicilio</h3>
            </div>
            <div class="services-1">
                <img src="aten.png" alt="">
                <h3>Atención al cliente </h3>
            </div>
        </div>
        <p>
          Slicksters tu tienda deportiva de confianza desde 2024. 
          Ofrecemos una amplia selección de productos de alta calidad, 
          junto con un servicio personalizado para ayudarte a alcanzar 
          tus metas deportivas. ¡Visítanos y descubre por qué somos 
          la elección de los atletas!.
        </p>
        <a href="#" class="btn-1">Información</a>
    </div>
</main>

<section class="general">
  <div class="general-1">
      <h2>Historia</h2>
      <p>
        En Slicksters, somos apasionados por brindarte la mejor
         experiencia en deportes. Desde [Año de Fundación], hemos 
         estado equipando a atletas de todos los niveles con 
         el equipo deportivo más avanzado. Nuestro objetivo es que 
         te sientas como un profesional cada vez que entras a nuestra tienda.
      </p>
      <a href="#" class="btn-1">Información</a>
  </div>
  <div class="general-2"></div>
</section>

<section class="general">
  <div class="general-3"></div>
  <div class="general-1">
      <h2>Misión</h2>
      <p>
        Fomentar una comunidad activa y saludable a través de la promoción del 
        deporte y el bienestar físico, ofreciendo productos y servicios que 
        satisfagan las necesidades de nuestros clientes.
      </p>
      <a href="#" class="btn-1">Información</a>
  </div>
</section>

<section class="blog-container">
  <h2>Nuestros valores</h2>
  <div class="blog-content">
    <div class="blog-1">
      <img src="ac.jpg" alt="">
      <h3>Compromiso</h3>
      <p>
        Nos dedicamos a ofrecer la mejor experiencia
         de servicio en cada etapa del proceso.
      </p>
    </div>
    <div class="blog-1">
      <img src="res.jpg" alt="">
      <h3>Innovación</h>
      <p>
        Estamos en constante evolución para 
        satisfacer las necesidades de nuestros clientes.
      </p>
    </div>
    <div class="blog-1">
      <img src="inno.jpeg" alt="">
      <h3>Calidad</h3>
      <p>
        Ofrecemos productos y servicios que 
        cumplen con los más altos estándares.
      </p>
    </div>
  </div>
  <a href="#" class="btn-1">Información</a>
</section>

<section>
    <h2>Gestión de Usuarios</h2>
    <a href="create.php">Agregar Nuevo Usuario</a> |
    <a href="logout.php">Cerrar Sesión</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $row["id"] . "'>Editar</a> | ";
                    echo "<a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\")'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<footer>
  <div class="footer-container">
      <div class="footer-section">
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="nosotros.html">Historia</a></li>
                <li><a href="#">Aviso de Privacidad</a></li>
                <li><a href="#">Términos y Condiciones</a></li>
                <li><a href="Carrito.html">Promociones</a></li>
            </ul>
      </div>
      <div class="footer-section">
          <h3>Atención al Cliente</h3>
          <ul>
              <li><a href="Soporte.html">Preguntas Frecuentes</a></li>
              <li><a href="Terminos.html">Cambios y Devoluciones</a></li>
              <li><a href="Terminos.html">Condiciones de Entrega</a></li>
              <li><a href="Terminos.html">Condiciones de Entrega y Devolución Marketplace</a></li>
          </ul>
      </div>
      <div class="footer-section">
          <h3>Redes sociales</h3>
          <ul class="social-icons">
              <li><a href="#"><img src="instagram.jpg" alt="Instagram"></a></li>
              <li><a href="#"><img src="face.jpg" alt="Facebook"></a></li>
              <li><a href="#"><img src="x.jpg" alt="Twitter"></a></li>
              <li><a href="#"><img src="youtube.png" alt="YouTube"></a></li>
              <li><a href="#"><img src="tik.jpg" alt="TikTok"></a></li>
          </ul>
      </div>
  </div>
</footer>

<?php $conn->close(); ?>
</body>
</html>
