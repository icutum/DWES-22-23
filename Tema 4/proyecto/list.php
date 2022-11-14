<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace('\\', '/', $class);
        require("$path${file}.php");
    });

    session_start();

    $keys = $_SESSION["keys"];

    $config = Form\StudentManager::singleton();
    $students = $config->fetchStudents();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tronco | Student list</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="list-wrapper">
        <?php if (!empty($students)) : ?>
            <table class="student-list">
                <caption class="student-list__caption">Lista de alumnos</caption>
                <tr class="student-list__row">
                    <?php foreach ($keys as $key) : // Si la clave es la contraseña, no la muestres
                        if ($key != $_SESSION["keys"][5]) : ?>
                            <th class="student-list__heading"><?= ucfirst($key) ?></th>
                        <?php endif;
                    endforeach; ?>
                </tr>
                <?php foreach ($students as $student) : ?>
                    <tr class="student-list__row">
                        <td class="student-list__column"><?= $student->getName() ?></td>
                        <td class="student-list__column"><?= $student->getSurname() ?></td>
                        <td class="student-list__column"><?= $student->getGender() ?></td>
                        <td class="student-list__column"><?= $student->getBirthdate() ?></td>
                        <td class="student-list__column"><?= $student->getUser() ?></td>
                        <td class="student-list__column"><?= $student->getMail() ?></td>
                        <td class="student-list__column"><?= $student->getPhone() ?></td>
                        <td class="student-list__column"><?= $student->getGrade() ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <h2 class="student-list__caption">¿No hay alumnos, por qué no creas uno?</h2>
        <?php endif; ?>

        <a class="form__submit" href="index.php">Volver</a>
    </div>
</body>
</html>