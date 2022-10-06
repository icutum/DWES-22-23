<?php
    set_time_limit(0);

    $hash = "$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72";

    $a = 97;
    $z = 122;

    for ($i = $a; $i <= $z; $i++) { 
        for ($j = $a; $j <= $z; $j++) { 
            for ($k = $a; $k <= $z; $k++) { 
                for ($l = $a; $l <= $z; $l++) {
                    $pass = chr($i) . chr($j) . chr($k) . chr($l);

                    if (password_verify($pass, $hash)) {
                        echo "La contraseña es $pass";
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bruteforce</title>
</head>
<body>
    <h2>Bruteforce</h2>
</body>
</html>