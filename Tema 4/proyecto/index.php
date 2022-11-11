<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        require("$ruta${archivo}.php");
    });

    $config = Form\StudentManager::singleton();
    
    if (isset($_POST["submit"])) {
        $alumno = new Form\Student($_POST);
        $alumno->validateStudent();

        // Recuento de errores
        if ($alumno->isValid()) {
            // Guardar en el archivo
            $config->saveAlumnos($alumno);

            // Redirigir
            header("Location: index.php?success=true");
        
            // Salir
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
                        <input required class="form__input" type="text" name="name" value="<?= $_POST['name'] ?>" placeholder="Tu nombre">
                    </label>
                    <label class="form__label">
                        Apellidos:
                        <input required class="form__input" type="text" name="surname" value="<?= $_POST['surname'] ?>" placeholder="Tus apellidos">
                    </label>
                    <label class="form__label">
                        Sexo:
                        <div class="form__radio">
                            <?php foreach (Form\Input::getGenders() as $gender) : ?>
                                <label class="form__label">
                                    <input class="form__input form__input--radio" type="radio" name="gender" value="<?= $gender ?>" <?= ($_POST['gender'] == $gender)?'checked':''; ?>> <?= $gender ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </label>
                    <label class="form__label">
                        Fecha de nacimiento:
                        <input required class="form__input" type="date" name="birthdate" value="<?= $_POST['birthdate'] ?>">
                    </label>
                </fieldset>

                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos de la cuenta</legend>
                    <label class="form__label">
                        Usuario:
                        <input required class="form__input" type="text" name="user" value="<?= $_POST['user'] ?>" placeholder="De 3 a 15 caracteres">
                    </label>
                    <label class="form__label">
                        Contraseña:
                        <input required class="form__input" type="password" name="password" value="<?= $_POST['password'] ?>" placeholder="Da igual lo que pongas, la vamos a cambiar y no te vamos a decir nada">
                    </label>
                    <label class="form__label">
                        Correo:
                        <input required class="form__input" type="mail" name="mail" value="<?= $_POST['mail'] ?>" placeholder="Para spammearte">
                    </label>
                    <label class="form__label">
                        Teléfono:
                        <input required class="form__input" type="number" name="phone" min="600000000" max="999999999" value="<?= $_POST['phone'] ?>" placeholder="Para spammearte con más ganas">
                    </label>
                    <label class="form__label">
                        Ciclo:
                        <select class="form__input" name="grade">
                        <?php foreach (Form\Input::getGrades() as $grade) : ?>
                            <option value="<?=$grade?>" <?= ($_POST['grade'] == $grade)?'selected':''; ?>><?=$grade?></option>
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