<?php
    namespace Classes;

    class ClearInputData {
        // [type=text]
        public const STRING = "/^[a-zA-ZÀ-ÿ\s]{2,25}$/";
        public const USER = "/^[a-zA-Z0-9]{3,15}$/";
        // [type=number]
        public const PHONE = "/^[69]{1}[0-9]{8}$/";
        // [type=mail]
        public const MAIL = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; // https://www.php.net/manual/en/function.filter-var.php
        // [type=password]
        public const PASSWORD = "/^[\w]{8,}$/";

        public static function cleanData(mixed $data, string $regex = self::STRING): mixed {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

            if (preg_match($regex, $data)) return $data;
            return null;
        }
    }
?>