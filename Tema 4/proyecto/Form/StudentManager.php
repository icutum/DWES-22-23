<?php
    namespace Form;

    use \Form;

    class StudentManager {
        private static $instance;
        private static $list = [];
        private static $keys = [];

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new StudentManager();
            }
            return self::$instance;
        }

        public function fetchStudents() {
            $students = @file_get_contents(
                "./list.csv"
            );

            if ($students != false) {
                // Si recupera el archivo
                $students = explode("\n", $students);
                array_pop($students);

                foreach ($students as $student) {
                    $student = array_combine($_SESSION["keys"], explode(",", $student));
                    self::$list[] = new Student($student);
                }

            } else {
                // Si no existe el archivo, lo crea
                self::$list = file_put_contents("./list.csv", "");    
            }

            return self::$list;
        }

        public function saveStudent(Student $student) {
            file_put_contents(
                "./list.csv",
                $student->getName().",".
                $student->getSurname().",".
                $student->getGender().",".
                $student->getBirthdate().",".
                $student->getUser().",".
                password_hash($student->getPassword(), PASSWORD_DEFAULT).",".
                strtolower($student->getMail()).",".
                $student->getPhone().",".
                $student->getGrade()."\n",
                FILE_APPEND
            );
        }

        public function createInputs($post) {
            $name       = new InputText("Nombre", "Nombre", $post["Nombre"]);
            $surname    = new InputText("Apellidos", "Apellidos", $post["Apellidos"]);
            $gender     = new InputRadio("Sexo", $post["Sexo"], "Hombre", "Mujer", "Todos los días", "Por favor");
            $birthdate  = new InputDate("Cumpleaños", $post["Cumpleaños"]);
            $user       = new InputText("Usuario", "Usuario", $post["Usuario"], 3, 16);
            $password   = new InputPassword("Contraseña", "Contraseña", $post["Contraseña"]);
            $mail       = new InputMail("Correo", "Correo", $post["Correo"]);
            $phone      = new InputNumber("Teléfono", "Teléfono", $post["Teléfono"]);
            $grade      = new InputSelect("Ciclo", $post["Ciclo"], "SMR", "ASIR", "DAW", "DAM");

            self::setKeys();
        }

        public static function setKeys() {
            session_start();

            foreach (Input::$inputs as $key) {
                self::$keys[] = $key->getName();
            }

            $_SESSION["keys"] = self::$keys;
        }

        public function getKeys() {
            return self::$keys;
        }
    }
?>