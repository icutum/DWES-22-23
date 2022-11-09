<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        require("$ruta${archivo}.php");
    });

    $config = Classes\StudentManager::singleton();

    $fields = ["Nombre", "Apellidos", "Sexo", "Cumpleaños", "Usuario", "Correo", "Teléfono", "Ciclo"];

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
                    <?php foreach ($fields as $field) : ?>
                        <th class="student-list__heading"><?= $field ?></th>
                    <?php endforeach; ?>
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
            <h2>¿No hay alumnos, por qué no creas uno?</h2>
        <?php endif; ?>
        
        <a class="form__submit" href="index.php">Volver</a>
    </div>
</body>
</html>