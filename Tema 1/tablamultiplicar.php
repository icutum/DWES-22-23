<?php
    $num = 5;
    $hasta = 10;
?>

<html>
    <head>
        <title>Hola Mundo PHP</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <td colspan="2">Multiplica</td>
            </tr>
            <?php for($i = 0; $i <= $hasta; $i++) { ?>
                <tr>
                    <td><?php echo $num . "*" . $i?></td>
                    <td><?php echo $num * $i ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
