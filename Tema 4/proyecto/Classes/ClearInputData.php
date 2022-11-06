<?php
    namespace Classes;

    class ClearInputData {
        // [type=text]
        const STRING = "^[a-zA-Z\s]{2,25}$";
        const USER = "^[a-zA-Z0-9]{3,15}$";
        // [type=number]
        const TELEPHONE = "^[69]{1}[0-9]{8}$";
        // [type=mail]
        const MAIL = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; // https://www.php.net/manual/en/function.filter-var.php
        // [type=password]
        const PASSWORD = "^[\w]{8,}$";

        function cleanData(mixed $data, string $regex): mixed {
            function cleanData(mixed $data, string $regex = STRING): mixed {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
    
                if (preg_match($regex, $data)) return $data;
                return null;
            }
        }
    }
?>