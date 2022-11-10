<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        require("$ruta${archivo}.php");
    });

    $config = Form\StudentManager::singleton();

    // Valores por defecto
    $name = "";
    $surname = "";
    $user = "";
    $password = "";
    $mail = "";
    $phone = "";
    
    if (isset($_POST["submit"])) {
        $name = Form\Input::clearName($_POST["name"]);
        $surname = Form\Input::clearSurname($_POST["surname"]);
        $user = Form\Input::clearUser($_POST["user"]);
        $password = Form\Input::clearPassword($_POST["password"]);
        $mail = Form\Input::clearMail($_POST["mail"]);
        $phone = Form\Input::clearPhone($_POST["phone"]);
        $gender = Form\Input::clearRadio($_POST["gender"]);
        $birthdate = Form\Input::clearDate($_POST["birthdate"]);
        $grade = Form\Input::clearSelect($_POST["grade"]);

        // Recuento de errores
        if (count(Form\Input::getErrors()) == 0) {
            // Guardar
            $alumno = new Form\Student($name, $surname, $user, password_hash($password, PASSWORD_DEFAULT), $mail, $phone, $gender, $birthdate, $grade);
            $alumno->saveAlumnos($alumno);

            // Redirigir
            header("Location: index.php?success=true");
        
            // Salir
            exit();
        }
    }
    echo "POST: " . print_r($_POST) . "<br>";
    print_r(Form\Input::getErrors());
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tronco</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@500&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php include_once("header.php"); ?>
    <main class="main">
        <?php if (count(Form\Input::getErrors()) > 0) :
            foreach (Form\Input::getErrors() as $error) : ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach;
        elseif ($_GET["success"]) : ?>
            <p class="success">Se ha creado el alumno</p>
        <?php endif; ?>

        <form class="form" action="index.php" method="post">
            <h2 class="form__title">Registrar alumno (pobre de él):</h2>
            <div class="form__flex">
                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos personales</legend>
                    <label class="form__label">
                        Nombre:
                        <input required class="form__input" type="text" name="name" value="<?= $name ?>" placeholder="Tu nombre">
                    </label>
                    <label class="form__label">
                        Apellidos:
                        <input required class="form__input" type="text" name="surname" value="<?= $surname ?>" placeholder="Tus apellidos">
                    </label>
                    <label class="form__label">
                        Sexo:
                        <div class="form__radio">
                            <?php foreach (Form\Input::getGenders() as $gender) : ?>
                                <label class="form__label">
                                    <input class="form__input form__input--radio" type="radio" name="gender" value="<?= $gender ?>"> <?= $gender ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </label>
                    <label class="form__label">
                        Fecha de nacimiento:
                        <input required class="form__input" type="date" name="birthdate" value="<?= $birthdate ?>">
                    </label>
                </fieldset>

                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos de la cuenta</legend>
                    <label class="form__label">
                        Usuario:
                        <input required class="form__input" type="text" name="user" value="<?= $user ?>" placeholder="De 3 a 15 caracteres">
                    </label>
                    <label class="form__label">
                        Contraseña:
                        <input required class="form__input" type="password" name="password" value="<?= $password ?>" placeholder="Da igual lo que pongas, la vamos a cambiar y no te vamos a decir nada">
                    </label>
                    <label class="form__label">
                        Correo:
                        <input required class="form__input" type="mail" name="mail" value="<?= $mail ?>" placeholder="Para spammearte">
                    </label>
                    <label class="form__label">
                        Teléfono:
                        <input required class="form__input" type="number" name="phone" min="600000000" max="999999999" value="<?= $phone ?>" placeholder="Para spammearte con más ganas">
                    </label>
                    <label class="form__label">
                        Ciclo:
                        <select class="form__input" name="grade">
                        <?php foreach (Form\Input::getGrades() as $grade) : ?>
                            <option value="<?=$grade?>"><?=$grade?></option>
                        <?php endforeach; ?>
                        </select>
                    </label>
                </fieldset>
            </div>
            
            <input class="form__submit" type="submit" value="Enviar" name="submit">
            <a class="form__submit" href="list.php">Ver alumnos</a>
        </form>
    </main>
</body>
</html>