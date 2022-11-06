<?php
    spl_autoload_register(function($clase) {
        $ruta = "./";
        $archivo = str_replace('\\', '/', $clase);
        echo "$ruta${archivo}.php | Acuérdate de eliminar esto cuando terminemos de debuggear equisde" . "<br>";
        require("$ruta${archivo}.php");
    });

    $config = Classes\StudentManager::singleton();
    $config->fetchStudents();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
</head>
<body>
    <table>
        <?php foreach ($config->fetchStudents() as $student) : ?>
            <tr>
                <?php foreach ($student as $data) : ?>
                    
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>