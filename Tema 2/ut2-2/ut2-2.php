<?php
    include("generarPDF.php");

    $nombre = $_GET['nombre'];
    $empresa = $_GET['empresa'];
    $representante = $_GET['representante'];
    $fecha = $_GET['fecha'];
    
    if ($_GET['nombre'] != "" && $_GET['empresa'] && $_GET['representante'] && $_GET['fecha']) {
        generarPDF($nombre, $empresa, $representante, $fecha);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de PDF</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <h1>Generar carta de motivación</h1>
    <form action="ut2-2.php" method="GET">
        <label for="nombre">
            Nombre:
            <input type="text" name="nombre" value="<?= $nombre ?>">
        </label>
        <label for="empresa">
            Empresa:
            <input type="text" name="empresa" value="<?= $empresa ?>">
        </label>
        <label for="representante">
            Representante:
            <input type="text" name="representante" value="<?= $representante ?>">
        </label>
        <label for="fecha">
            Fecha:
            <input type="date" name="fecha" value="<?= $fecha ?>">
        </label>
        <input type="submit" value="Generar PDF">
    </form>
</body>
</html>