<?php
    /**
     * mb_funcion()
     * Para caracteres multibyte
     */


    function esPalindromo($str) {
        for ($i = 0; $i < mb_strlen($str) / 2; $i++) { 
            if ($str[$i] != $str[mb_strlen($str) - 1 - $i]) {
                return false;
            }
        }
        return true;

        // Manera fácil
        // if (str_replace(" ", "", strtolower($str)) == str_replace(" ", "", strtolower(strrev($str)))) {
        //     return true;
        // }
        // return false;
    }

    function contarVocales($str) {
        $vocales = ["a", "e", "i", "o", "u"];
        $n = 0;

        for ($i = 0; $i < mb_strlen($str); $i++) {
            if (in_array($str[$i], $vocales)) {
                $n++;
            }
        }
        return $n;
    }

    function contarConsonantes($str) {
        $n = 0;

        for ($i = 0; $i < mb_strlen($str); $i++) {
            if (!preg_match("/[aeiou]/", $str[$i])) {
                $n++;
            }
        }
        return $n;
    }
?>