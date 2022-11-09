<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        require("$ruta${archivo}.php");
    });

    $config = Classes\StudentManager::singleton();
    $errors = [];

    // Valores por defecto
    $name = "";
    $surname = "";
    $user = "";
    $password = "";
    $mail = "";
    $phone = "";

    $genders = ["Hombre", "Mujer", "Otro"];
    $grades = ["SMR", "DAW", "DAM", "ASIR"];
    
    $sysdate = new DateTime('now');
    $sysdate->format('Y-m-d');
    const MIN_EDAD = 16;
    
    // print_r($_POST);
    if (isset($_POST["submit"])) {
        // Controlar errores con el hadouken de if/else

        if (!empty($_POST["name"])) {
            $name = Classes\ClearInputData::cleanData($_POST["name"]);

            if (!isset($name)) {
                $errors["name"] = ["El nombre tiene que tener de 2 a 25 caracteres"];
            }
        } else {
            $errors["name"] = ["El nombre no puede estar vacío"];
        }

        if (!empty($_POST["surname"])) {
            $surname = Classes\ClearInputData::cleanData($_POST["surname"]);

            if (!isset($surname)) {
                $errors["surname"] = ["Los apellidos tienen que tener de 2 a 25 caracteres"];
            }
        } else {
            $errors["surname"] = ["Los apellidos no pueden estar vacío"];
        }

        if (!empty($_POST["gender"])) {
            $gender = $_POST["gender"];

            if (!in_array($gender, $genders)) {
                $errors["gender"] = ["Sexo inválido"];
            }
        } else {
            $errors["gender"] = ["Falta sexo"];
        }

        if (!empty($_POST["birthdate"])) {
            $birthdate = $_POST["birthdate"];

            $diff = $sysdate->diff(new DateTime($birthdate));
            if ($birthdate > $sysdate || $diff->y < MIN_EDAD) {
                $errors["birthdate"] = ["Fecha inválida"];
            } 
        } else {
            $errors["birthdate"] = ["El cumpleaños no puede estar vacío"];
        }

        if (!empty($_POST["user"])) {
            $user = Classes\ClearInputData::cleanData($_POST["user"], Classes\ClearInputData::USER);

            if (!isset($user)) {
                $errors["user"] = ["El usuario tiene que tener de 3 a 15 caracteres"];
            }
        } else {
            $errors["user"] = ["El usuario no puede estar vacío"];
        }

        if (!empty($_POST["password"])) {
            $password = Classes\ClearInputData::cleanData($_POST["password"], Classes\ClearInputData::PASSWORD);

            if (!isset($password)) {
                $errors["password"] = ["La contraseña tiene que tener 8 caracteres mínimo"];
            }
        } else {
            $errors["password"] = ["La contraseña no puede estar vacía"];
        }

        if (!empty($_POST["mail"])) {
            $mail = Classes\ClearInputData::cleanData($_POST["mail"], Classes\ClearInputData::MAIL);
            
            if (!isset($mail)) {
                $errors["mail"] = ["El correo no coincide con el regex"];
            }
        } else {
            $errors["mail"] = ["El correo no puede estar vacío"];
        }

        if (!empty($_POST["phone"])) {
            $phone = Classes\ClearInputData::cleanData($_POST["phone"], Classes\ClearInputData::PHONE);

            if (!isset($phone)) {
                $errors["phone"] = ["No coincide"];
            }
        } else {
            $errors["phone"] = ["El teléfono no puede estar vacío"];
        }

        if (!empty($_POST["grade"])) {
            $grade = $_POST["grade"];

            if (!in_array($grade, $grades)) {
                $errors["grade"] = ["Ciclo inválido"];
            } 
        } else {
            $errors["grade"] = ["El ciclo no puede estar vacío"];
        }

        if (count($errors) == 0) {
            // Guardar
            $alumno = new Classes\Student($name, $surname, $user, $password, $mail, $phone, $gender, $birthdate, $grade);

            $alumno->saveAlumnos($alumno);
            header("Location: index.php");
            
            exit();
        }
        print_r($errors);
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
    <header class="header">
        <img class="header__logo" src="./img/tronco.png" alt="Tronco">
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item"><a class="header__nav-link" href="">Pedro Sánchez</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="">dame la</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="">puta beca</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <form class="form" action="index.php" method="post">
            <h2 class="form__title">Registrar alumno (pobre de él):</h2>
            <div class="form__flex">
                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos personales</legend>
                    <label class="form__label">
                        Nombre:
                        <input required class="form__input" type="text" name="name" value="<?= $name ?>" placeholder="El nombre que te pusieron los engendros de tus padres">
                    </label>
                    <label class="form__label">
                        Apellidos:
                        <input required class="form__input" type="text" name="surname" value="<?= $surname ?>" placeholder="El primer apellido de cada uno de tus putos padres">
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
                        <input required class="form__input" type="text" name="user" value="<?= $user ?>" placeholder="El nombre de mierda con el que te van a identificar">
                    </label>
                    <label class="form__label">
                        Contraseña:
                        <input required class="form__input" type="password" name="password" value="<?= $password ?>" placeholder="Da igual lo que pongas, la vamos a cambiar y no te vamos a decir nada">
                    </label>
                    <label class="form__label">
                        Correo:
                        <input required class="form__input" type="mail" name="mail" value="<?= $mail ?>" placeholder="Tu puta dirección para saber a quién mandar spam">
                    </label>
                    <label class="form__label">
                        Teléfono:
                        <input required class="form__input" type="number" name="phone" min="600000000" max="999999999" value="<?= $phone ?>" placeholder="Tu puto número para saber a quién llamar a la hora que más te joda">
                    </label>
                    <label class="form__label">
                        Curso:
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