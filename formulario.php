<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SonidoEstival2023</title>
  <link rel="icon" href="favicon.png" type="image/png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abel&family=Bungee+Outline&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
  <div>
    <div class="row">
      <div class="festival-image col-sm-8 col-md-6 text-white p-4 py-md-5">
        <div class="background-square text-center py-3 px-2">
          <h1 class="text-uppercase title-font--outline mb-3">
            Sonido<span class="title-font">Estival</span>2023
          </h1>

          <p>
            ¡Celebra este verano con el festival de música más emocionante!
            Únete a nosotros en un evento vibrante diseñado para todas las
            edades.
          </p>

          <p>
            Para poder asegurar tu lugar en este increíble festival,
            necesitamos tus datos de contacto. Cada invitación cuenta con un
            código único y será enviada por correo electrónico.
          </p>

          <p>
            No esperes más, inscríbete ahora y sé parte de esta experiencia
            musical inolvidable.
          </p>
        </div>
      </div>

      <div class="col-sm-4 col-md-6 d-flex flex-column justify-content-center align-items-center py-5 p-md-0">
        <form id="form" method="POST" action="" class="row g-3 needs-validation w-75" novalidate>
          <div class="mb-2">
            <label for="nombre" class="form-label">Nombre <span class="text-small"><em>(requerido)</em></span></label>
            <input id="nombre" name="nombre" type="text" class="form-control p-2" autocomplete="on" required />
            <p class="invalid-feedback">Nombre no válido</p>
          </div>
          <div class="mb-2">
            <label for="apellido" class="form-label">Apellido <span
                class="text-small"><em>(requerido)</em></span></label>
            <input id="apellido" name="apellido" type="text" class="form-control p-2" autocomplete="on" required />
            <p class="invalid-feedback">Apellido/s no válido/s</p>
          </div>
          <div class="mb-2">
            <label for="email" class="form-label">Email <span class="text-small"><em>(requerido)</em></span></label>
            <input id="email" name="email" type="email" class="form-control p-2" autocomplete="on" required />
            <p class="invalid-feedback">Email no válido</p>
          </div>
          <div class="d-flex flex-row justify-content-end">
            <button id="botonEnviar" class="btn btn-secondary py-2 w-25 d-flex justify-content-center disabled"
              aria-disabled="true" role="button" type="submit">
              <span id="spinner" class="spinner-border text-light d-none"></span>
              <span id="botonTexto">Enviar</span>
            </button>
          </div>
          <?php
          if ($_POST) {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];

            // conexión con PDO
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "practica_php";

            // crear conexión
            $conn = new mysqli($hostname, $username, $password, $database);

            // revisar conexión
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `USUARIO` (`NOMBRE`, `APELLIDO`, `EMAIL`)
                    VALUES ('$nombre', '$apellido', '$email')";

            if ($conn->query($sql) === TRUE) {
              echo "<span style='color:#308446;'>¡Datos enviados correctamente!</span>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
          }
          ?>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
