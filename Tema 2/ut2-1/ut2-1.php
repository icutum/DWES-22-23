<?php
    include("palindromo.php");

    if (isset($_GET['texto'])) {
        $str = $_GET['texto'];
        $envio = true;

        $palabra = str_replace(" ", "", strtolower($str));
        
        $palindromo = esPalindromo($palabra);
        $numVocales = contarVocales($palabra);
        $numConsonantes = contarConsonantes($palabra);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector de palíndromos</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="wrapper">
        <h1>Palíndromos</h1>
        <div class="card">
            <form action="ut2-1.php" method="GET">
                <label for="texto">Introduce una cadena:</label>
                <input type="text" name="texto" value="<?= $str ?>" class="txt" placeholder="Ejemplo: radar">
                <input type="submit" value="Enviar" class="btn btn--submit">
            </form>
        </div>
        <?php if ($envio) { ?>
            <div class="card">
                <p>Resultado:</p>
                <ul class="card__list">
                    <li class="list__item">Nº de vocales: <?= $numVocales ?></li>
                    <li class="list__item">Nº de consonantes: <?= $numConsonantes?></li>
                    <li class="list__item">
                        Palíndromo: 
                        <span class="<?= $palindromo ? "green" : "red" ?>">
                            <?= $palindromo ? "sí" : "no"; ?>
                        </span>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</body>
</html>