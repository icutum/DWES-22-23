<?php
    namespace Classes;

    class StudentManager {
        private static $list = [];
        private static $instance;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = new StudentManager();
            }
            return self::$instance;
        }
        
        private function __construct() {
            $this->fetchStudents();
        }

        public function fetchStudents() {
            // Se guarda en el array los contenidos del .csv suprimiendo los errores
            // Reemplazado self::$list por $aux

            // self::$list = @file_get_contents(
            //     "list.csv"
            // );

            $aux = @file_get_contents(
                "list.csv"
            );
            
            if ($aux != false) {
                // Si recupera el archivo
                $aux = explode("\n", $aux);
                array_pop($aux);

                foreach ($aux as $student) {
                    // Hardcodear es mi pasión
                    self::$list = new Classes\Student($aux[0], $aux[1], $aux[2], $aux[3], $aux[4], $aux[5], $aux[6], $aux[7]);
                }

            } else {
                // Si no existe el archivo, lo crea
                self::$list[] = file_put_contents("list.csv","",FILE_APPEND);    
            }

            return self::$list;
        }

        protected function saveAlumnos(Student $student) {
            file_put_contents(
                "list.csv",
                getName($student).",".
                getSurname($student).",".
                getUser($student).",".
                getPassword($student).",".
                getMail($student).",".
                getPhone($student).",".
                getGender($student).",".
                getGrade($student).",".
                getBirthdate($student)."\n",
                FILE_APPEND
            );
        }    
    }
?>