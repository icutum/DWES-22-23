<?php
    namespace Form;

    class StudentManager {
        private static $list = [];
        private static $instance;
        private $keys = ["name", "surname", "user", "password", "mail", "phone", "gender", "birthdate", "grade"];

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
                    $student = array_combine($this->keys, explode(",",$student));
                    self::$list[] = new \Form\Student($student);
                }

            } else {
                // Si no existe el archivo, lo crea
                self::$list = file_put_contents("list.csv", "");    
            }

            return self::$list;
        }

        public function saveAlumnos(\Form\Student $student) {
            file_put_contents(
                "list.csv",
                $student->getName().",".
                $student->getSurname().",".
                $student->getUser().",".
                $student->getPassword().",".
                $student->getMail().",".
                $student->getPhone().",".
                $student->getGender().",".
                $student->getBirthdate().",".
                $student->getGrade()."\n",
                FILE_APPEND
            );
        }

        public function getKeys() {
            return $this->keys;
        }

        public static function printList() {
            foreach (self::$list as $alumno) {
                echo @$alumno->__toString();
            }
        }
    }
?>