<?php
    $num = 0;
    $contador = 0;
    $filas = 10;
    $columnas = 10;
?>

<html>
    <head>
        <title>Números primos</title>
        <style>
            table {
                border-collapse: collapse;
            }

            tr, td {
                border: 1px solid black;
                text-align: center;
            }

            .primo {
                background-color: red;
                color: white;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <table>
            <?php for($i = 0; $i < $filas; $i++) { ?>
                <tr>
                    <?php
                        for($j = 0; $j < $columnas; $j++) {
                            for($k = 1; $k <= $num; $k++) {
                                if ($num > 1 && $num % $k == 0) $contador++;
                            }
                            
                            if ($contador == 2) {
                                echo "<td class='primo'>".$num."</td>";
                            } else {
                                echo "<td>".$num."</td>";
                            }

                            $contador = 0;
                            $num++;
                        }
                    ?>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>