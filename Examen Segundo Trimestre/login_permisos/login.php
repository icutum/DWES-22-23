<?php

require_once("./init.php");
require_once("./redirigir-index.php");

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET["redireccion"])) {
    $redirect = $_GET["redireccion"];

} else if (isset($_POST["redireccion"])) {
    $redirect = $_POST["redireccion"];

} else {
    $redirect = REDIRIGIR_POR_DEFECTO;
}

if (isset($_POST['submit'])) {
    $nombre = clean_input($_POST["login"]);
    $db->ejecuta("SELECT * FROM usuarios WHERE nombre = ?", $nombre);
    $usuario = $db->obtenElDato();

    $contra = clean_input($_POST["password"]);
    if (password_verify($contra, $usuario["secreto"])) {
        session_start();

        $_SESSION["user"] = $usuario["nombre"];

        header("Location: $redirect");

        exit;

    } else {
        if (empty($nombre) || empty($contra)) {
            $errorList[] = "Debes rellenar ambos campos";

        } else {
            $errorList[] = "Correo o contraseña incorrecto";
        }
    }
}

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<?php include('menu.php')?>
<form action="login.php" method="post" class="login">
    <p>
      <label for="login">Nombre:</label>
      <input type="text" name="login" id="login" value="<?= $nombre ?>">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p>
        <div class="error">
        <?php foreach($errorList as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach ?>
        </div>
    </p>

    <!-- Hidden en caso de que se pierda el get del redirect -->
    <input type="hidden" value="<?= $redirect ?>" name="redireccion">

    <p class="login-submit">
        <label for="submit">&nbsp;</label>
        <button type="submit" name="submit" class="login-button">Login</button>
    </p>
</form>
</body>
</html>