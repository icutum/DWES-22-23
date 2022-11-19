<?php
    try {
        $dsn = 'mysql:host=localhost;dbname=dwes';
        $user = $passwd = "dwes";

        $mbd = new PDO($dsn, $user, $passwd);

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

    function imprimirTabla($consulta) { 
        $tabla = $consulta->fetchAll(); 
        /**
         * fetchAll devuelve un array con todas las filas del objeto,
         * ya que, al iterar una vez por el objeto PDOStatement,
         * no permite iterar de nuevo (lo cual no tiene mucho sentido)
         */
        ?>
        <table>
            <tr>
                <?php foreach ($tabla[0] as $clave => $valor) : if (!is_numeric($clave)) : ?>
                    <th><?= $clave ?></th>
                <?php endif; endforeach; ?>
            </tr>
            <?php foreach ($tabla as $fila) : ?>
                <tr>
                    <?php foreach ($fila as $clave => $valor) : if (!is_numeric($clave)) : ?>
                        <td><?= $valor ?></td>
                    <?php endif; endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><?= $consulta->rowCount(); ?> filas afectadas.</p>
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
        body {
            font-family: arial;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 5px;
        }

        tr:first-child {
            background-color: #333;
            color: white;
        }

        tr:nth-child(2n + 3) {
            background-color: #eee;
        }

        td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<body>
    
</body>
</html>