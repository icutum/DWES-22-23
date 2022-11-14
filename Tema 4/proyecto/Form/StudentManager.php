<?php
    namespace Form;

    class StudentManager {
        private static $instance;
        private static $list = [];
        private static $keys = [];

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new \Form\StudentManager();
            }
            return self::$instance;
        }

        public function fetchStudents() {
            $students = @file_get_contents(
                "list.csv"
            );
            
            if ($students != false) {
                // Si recupera el archivo
                $students = explode("\n", $students);
                array_pop($students);

                foreach ($students as $student) {
                    $student = array_combine($_SESSION["keys"], explode(",", $student));
                    self::$list[] = new \Form\Student($student);
                }

            } else {
                // Si no existe el archivo, lo crea
                self::$list = file_put_contents("list.csv", "");    
            }

            return self::$list;
        }

        public function saveStudent(\Form\Student $student) {
            file_put_contents(
                "list.csv",
                $student->getName().",".
                $student->getSurname().",".
                $student->getGender().",".
                $student->getBirthdate().",".
                $student->getUser().",".
                password_hash($student->getPassword(), PASSWORD_DEFAULT).",".
                $student->getMail().",".
                $student->getPhone().",".
                $student->getGrade()."\n",
                FILE_APPEND
            );
        }

        public function createInputs($post) {
            $name       = new \Form\InputText("name", "Nombre", $post["name"]);
            $surname    = new \Form\InputText("surname", "Apellidos", $post["surname"]);
            $gender     = new \Form\InputRadio("gender", $post["gender"], "Hombre", "Mujer", "Todos los días");
            $birthdate  = new \Form\InputDate("birthdate", $post["birthdate"]);
            $user       = new \Form\InputText("user", "Usuario", $post["user"], 3, 16);
            $password   = new \Form\InputPassword("password", "Contraseña", $post["password"]);
            $mail       = new \Form\InputMail("mail", "Correo", $post["mail"]);
            $phone      = new \Form\InputNumber("phone", "Teléfono", $post["phone"]);
            $grade      = new \Form\InputSelect("grade", $post["grade"], "SMR", "ASIR", "DAW", "DAM");

            self::setKeys();
        }

        public static function setKeys() {
            session_start();

            foreach (\Form\Input::$inputs as $key) {
                self::$keys[] = $key->getName();
            }

            $_SESSION["keys"] = self::$keys;
        }

        public function getKeys() {
            return self::$keys;
        }
    }
?>