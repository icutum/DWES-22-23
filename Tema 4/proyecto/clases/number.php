<?php
    class number implements input {
        const TELEPHONE = "^[69]{1}[0-9]{8}$";

        function cleanData(mixed $data, string $regex = TELEPHONE) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            if (preg_match($regex, $data)) return $data;
            return null;
        }
    }
?>