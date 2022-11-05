<?php
    class password implements input {
        const PASSWORD = "^[\w]{8,}$";

        function cleanData(mixed $data, string $regex = PASSWORD) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            if (preg_match($regex, $data)) return $data;
            return null;
        }
    }
?>