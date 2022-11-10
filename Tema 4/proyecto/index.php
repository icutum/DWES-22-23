<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        require("$ruta${archivo}.php");
    });

    $config = Classes\StudentManager::singleton();
    $errors = [];

    // Valores por defecto
    const MIN_EDAD = 16;

    $name = "";
    $surname = "";
    $user = "";
    $password = "";
    $mail = "";
    $phone = "";

    $genders = ["Hombre", "Mujer", "Todos los días"];
    $grades = ["SMR", "DAW", "DAM", "ASIR"];
    
    $sysdate = new DateTime('now');
    $sysdate->format('Y-m-d');
    
    // print_r($_POST);
    if (isset($_POST["submit"])) {
        // Controlar errores con el hadouken de if/else

        // Nombre
        if (!empty($_POST["name"])) {
            $name = Classes\ClearInputData::cleanData($_POST["name"]);

            if (!isset($name)) {
                $errors["name"] = "El nombre tiene que tener de 2 a 25 caracteres";
            }
        } else {
            $errors["name"] = "El nombre no puede estar vacío";
        }

        // Apellidos
        if (!empty($_POST["surname"])) {
            $surname = Classes\ClearInputData::cleanData($_POST["surname"]);

            if (!isset($surname)) {
                $errors["surname"] = "Los apellidos tienen que tener de 2 a 25 caracteres";
            }
        } else {
            $errors["surname"] = "Los apellidos no pueden estar vacíos";
        }

        // Sexo
        if (!empty($_POST["gender"])) {
            $gender = $_POST["gender"];
            
            if (!in_array($gender, $genders)) {
                $errors["gender"] = "Sexo inválido";
            }
        } else {
            $errors["gender"] = "No se ha especificado ningún sexo";
        }

        // Cumpleaños
        if (!empty($_POST["birthdate"])) {
            $birthdate = $_POST["birthdate"];

            $diff = $sysdate->diff(new DateTime($birthdate));
            if ($birthdate > $sysdate || $diff->y < MIN_EDAD) {
                $errors["birthdate"] = "El alumno tiene que ser mayor de " . MIN_EDAD . " años";
            } 
        } else {
            $errors["birthdate"] = "El cumpleaños no puede estar vacío";
        }

        // Usuario
        if (!empty($_POST["user"])) {
            $user = Classes\ClearInputData::cleanData($_POST["user"], Classes\ClearInputData::USER);

            if (!isset($user)) {
                $errors["user"] = "El usuario tiene que tener de 3 a 15 caracteres";
            }
        } else {
            $errors["user"] = "El usuario no puede estar vacío";
        }

        // Contraseña
        if (!empty($_POST["password"])) {
            $password = Classes\ClearInputData::cleanData($_POST["password"], Classes\ClearInputData::PASSWORD);

            if (!isset($password)) {
                $errors["password"] = "La contraseña tiene que tener como mínimo 8 caracteres y máximo 64";
            }
        } else {
            $errors["password"] = "La contraseña no puede estar vacía";
        }

        // Correo
        if (!empty($_POST["mail"])) {
            $mail = Classes\ClearInputData::cleanData($_POST["mail"], Classes\ClearInputData::MAIL);
            
            if (!isset($mail)) {
                $errors["mail"] = "El correo introducido no es un correo válido";
            }
        } else {
            $errors["mail"] = "El correo no puede estar vacío";
        }

        // Teléfono
        if (!empty($_POST["phone"])) {
            $phone = Classes\ClearInputData::cleanData($_POST["phone"], Classes\ClearInputData::PHONE);

            if (!isset($phone)) {
                $errors["phone"] = "No es un teléfono válido";
            }
        } else {
            $errors["phone"] = "El teléfono no puede estar vacío";
        }

        // Ciclo
        if (!empty($_POST["grade"])) {
            $grade = $_POST["grade"];

            if (!in_array($grade, $grades)) {
                $errors["grade"] = "Ciclo inválido";
            } 
        } else {
            $errors["grade"] = "El ciclo no puede estar vacío";
        }

        // Recuento de errores
        if (count($errors) == 0) {
            // Guardar
            $alumno = new Classes\Student($name, $surname, $user, password_hash($password, PASSWORD_DEFAULT), $mail, $phone, $gender, $birthdate, $grade);

            $alumno->saveAlumnos($alumno);
            header("Location: index.php");
            
            exit();
        }
    }
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
        <?php if (count($errors) > 0) :
            foreach ($errors as $error) : ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach;
        else : ?>
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
                            <?php foreach ($genders as $gender) : ?>
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
                        <?php foreach ($grades as $grade) : ?>
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