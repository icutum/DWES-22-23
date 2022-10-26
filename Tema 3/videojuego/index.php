<?php
    // Require
        foreach (glob("./interfaces/*.php") as $interfaz) {
            require($interfaz);
        }

        foreach (glob("./rasgos/*.php") as $rasgo) {
            require($rasgo);
        }

        foreach (glob("./clases/*.php") as $clase) {
            require($clase);
        }
        
    //
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuego</title>
</head>
<body>
    
</body>
</html>