<?php
    class text implements input {
        const STRING = "^[a-zA-Z\s]{2,25}$";
        const USER = "^[a-zA-Z0-9]{3,15}$";

        function cleanData(mixed $data, string $regex = STRING): mixed {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            if (preg_match($regex, $data)) return $data;
            return null;
        }
    }
?>