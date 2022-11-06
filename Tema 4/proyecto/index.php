<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tronco</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@500&display=swap" rel="stylesheet"> 
</head>
<body>
    <header class="header">
        <img class="header__logo" src="./img/tronco.png" alt="Tronco">
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item"><a class="header__nav-link" href="">Pedro Sánchez</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="">dame la</a></li>
                <li class="header__nav-item"><a class="header__nav-link" href="">puta beca</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <form class="form" action="" method="post">
            <h2 class="form__title">Registrar alumno (pobre de él):</h2>
            <div class="form__flex">
                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos personales</legend>
                    <label class="form__label">
                        Nombre:
                        <input class="form__input" type="text" name="name" value="" placeholder="El nombre que te pusieron los engendros de tus padres">
                    </label>
                    <label class="form__label">
                        Apellidos:
                        <input class="form__input" type="text" name="surname" value="" placeholder="El primer apellido de cada uno de tus putos padres">
                    </label>
                    <label class="form__label">
                        Sexo:
                        <div class="form__radio">
                            <label class="form__label">
                                <input class="form__input form__input--radio" type="radio" name="gender" value="H"> Hombre
                            </label>
                            <label class="form__label">
                                <input class="form__input form__input--radio" type="radio" name="gender" value="M"> Mujer
                            </label>
                            <label class="form__label">
                                <input class="form__input form__input--radio" type="radio" name="gender" value="O" checked> Todos los días 
                            </label>
                        </div>
                    </label>
                    <label class="form__label">
                        Fecha de nacimiento:
                        <input class="form__input" type="date" name="birthdate">
                    </label>
                </fieldset>

                <fieldset class="form__fieldset">
                    <legend class="form__fieldset-title">Datos de la cuenta</legend>
                    <label class="form__label">
                        Usuario:
                        <input class="form__input" type="text" name="user" value="" placeholder="El nombre de mierda con el que te van a identificar">
                    </label>
                    <label class="form__label">
                        Contraseña:
                        <input class="form__input" type="password" name="password" value="" placeholder="La contraseña de mierda que le vas a poner a la cuenta">
                    </label>
                    <label class="form__label">
                        Correo:
                        <input class="form__input" type="mail" name="mail" value="" placeholder="Tu puta dirección para saber a quién mandar spam">
                    </label>
                    <label class="form__label">
                        Teléfono:
                        <input class="form__input" type="number" name="telephone" min="600000000" max="999999999" value="" placeholder="Tu puto número para saber a quién llamar a la hora que más te joda">
                    </label>
                </fieldset>
            </div>
            
            <input class="form__submit" type="submit" value="Enviar" name="submit">
        </form>
    </main>
</body>
</html>