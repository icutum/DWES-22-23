<?php
    try {
        $mbd = new PDO('mysql:host=localhost;dbname=dwes', "dwes", "dwes");

        // Utilizar la conexión aquí
        $resultado = $mbd->query('SELECT * FROM Ciclistas');

        imprimirTabla($resultado);

        // Ya se ha terminado; se cierra
        $resultado = null;
        $mbd = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    function imprimirTabla($consulta) { ?>
        <table>
            <?php foreach ($consulta as $fila) : ?>
                <tr>
                    <?php foreach ($fila as $clave => $valor) : if (!is_numeric($clave)) : ?>
                        <td><?= $valor ?></td>
                    <?php endif; endforeach; ?>
                </tr>
            <?php endforeach; ?>
       </table>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba BD</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    
</body>
</html>