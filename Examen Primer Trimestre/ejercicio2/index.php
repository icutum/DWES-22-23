<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    const ALUMNO_1 = "Mario";
    const ALUMNO_2 = "Jason";
    const ALUMNO_3 = "Dani";

    const FECHA_1 = "30/11/22";
    const FECHA_2 = "01/12/22";
    const FECHA_3 = "02/12/22";

    $examenFacil = new Exam\ExamenFacil();
    $examenChungo = new Exam\ExamenChungo();
    $examenHP = new Exam\ExamenHP();

    $examenFacil->intentar(ALUMNO_1);
    $examenChungo->intentar(ALUMNO_2);
    $examenHP->intentar(ALUMNO_3);

    $examenFacil->setFecha(FECHA_1);
    $examenChungo->setFecha(FECHA_2);
    $examenHP->setFecha(FECHA_3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        Examen fácil: La nota de <b><?= $examenFacil->getNombre() ?></b> es <b><?= $examenFacil->obtenerNota(); ?></b>
        |
        La fecha del examen es: <b><?= $examenFacil->getFecha() ?></b>
    </p>
    <p>
        Examen Chungo: La nota de <b><?= $examenChungo->getNombre() ?></b> es <b><?= $examenChungo->obtenerNota(); ?></b>
        |
        La fecha del examen es: <b><?= $examenChungo->getFecha() ?></b>
    </p>
    <p>
        Examen HP: La nota de <b><?= $examenHP->getNombre() ?></b> es <b><?= $examenHP->obtenerNota(); ?></b>
        |
        La fecha del examen es: <b><?= $examenHP->getFecha() ?></b>
    </p>
</body>
</html>