<?php
    namespace Classes;

    class StudentManager {
        private static $list = [];
        private static $instance;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new \Classes\StudentManager();
            }
            return self::$instance;
        }

        public function fetchStudents() {
            $aux = @file_get_contents(
                "list.csv"
            );
            
            if ($aux != false) {
                // Si recupera el archivo
                $aux = explode("\n", $aux);
                array_pop($aux);

                foreach ($aux as $student) {
                    $student = explode(",", $student);
                    // Hardcodear es mi pasión
                    self::$list[] = new \Classes\Student($student[0], $student[1], $student[2], $student[3], $student[4], $student[5], $student[6], $student[7], $student[8]);
                }

            } else {
                // Si no existe el archivo, lo crea
                self::$list = file_put_contents("list.csv","");    
            }

            return self::$list;
        }

        public function saveAlumnos(\Classes\Student $student) {
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

        static function printList() {
            foreach (self::$list as $alumno) {
                echo @$alumno->__toString();
            }
        }
    }
?>