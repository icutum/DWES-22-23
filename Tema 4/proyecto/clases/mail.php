<?php
    class mail implements input {
        

        function cleanData(mixed $data, string $regex = ""): mixed {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            if (preg_match($regex, $data)) return $data;
            return null;
        }
    }
?>