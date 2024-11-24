<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios Personalizados</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="header">
    <h1>¡Bienvenido a Servicios Digitales!</h1>
    <p>Elige entre nuestras opciones y lleva tus ideas al siguiente nivel.</p>
  </header>
  <main class="main-container">
    <section class="option" id="web">
      <h2 class="option-title">🎨 Diseño Web</h2>
      <p class="option-description">Crea una página profesional y atractiva.</p>
      <p class="option-price">Precio: <strong>10 euros</strong></p>
      <form action="procesar.php" method="POST">
        <input type="hidden" name="item" value="Web">
        <input type="hidden" name="price" value="10">
        <button type="submit" class="buy-btn">Comprar</button>
      </form>
    </section>

    <section class="option" id="bot">
      <h2 class="option-title">🤖 Bot Personalizado</h2>
      <p class="option-description">Automatiza tareas o crea un asistente virtual.</p>
      <p class="option-price">Precio: <strong>1 euro por persona</strong></p>
      <form action="procesar.php" method="POST">
        <label for="numPersonas">Personas:</label>
        <input type="number" id="numPersonas" name="numPersonas" min="1" value="1">
        <input type="hidden" name="item" value="Bot">
        <button type="submit" class="buy-btn">Calcular y Comprar</button>
      </form>
    </section>

    <section class="option" id="juego">
      <h2 class="option-title">🎮 Desarrollo de Juegos</h2>
      <p class="option-description">Crea un juego a medida con tus ideas.</p>
      <p class="option-price">Precio: <strong>20 euros</strong></p>
      <form action="procesar.php" method="POST">
        <label for="gamePrice">Monto:</label>
        <input type="number" id="gamePrice" name="gamePrice" min="20" value="20">
        <input type="hidden" name="item" value="Juego">
        <button type="submit" class="buy-btn">Comprar</button>
      </form>
    </section>
  </main>
  <footer class="footer">
    <p>Para cualquier consulta, contáctanos en:</p>
    <ul>
      <li>Email: <a href="mailto:legajo.manuall@gmail.com">legajo.manuall@gmail.com</a></li>
      <li>Bizum: 613080436</li>
    </ul>
  </footer>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    $price = 0;

    if ($item === 'Web') {
        $price = 10;
    } elseif ($item === 'Bot') {
        $numPersonas = intval($_POST['numPersonas']);
        $price = $numPersonas * 1;
    } elseif ($item === 'Juego') {
        $price = intval($_POST['gamePrice']);
    }

    if ($price > 0) {
        echo "<h1>Gracias por tu compra</h1>";
        echo "<p>Has seleccionado: <strong>$item</strong></p>";
        echo "<p>Total a pagar: <strong>$price euros</strong></p>";
        echo "<p>Opciones de pago:</p>";
        echo "<ul>
                <li><a href='https://es.wallapop.com/' target='_blank'>Wallapop: Programaciones (legajo.manuall@gmail.com)</a></li>
                <li>Email: <a href='mailto:legajo.manuall@gmail.com'>legajo.manuall@gmail.com</a></li>
                <li>Bizum: 613080436</li>
              </ul>";
    } else {
        echo "<p>Error: Por favor selecciona una cantidad válida.</p>";
    }
}
?>
