<?php
    interface input {
        /**
         * @param mixed $data El dato a limpiar
         * @return mixed Devuelve el dato si coincide con la expresión regular, de caso contrario devuelve null
         */
        function cleanData(mixed $data, string $regex): mixed;
    }
?>