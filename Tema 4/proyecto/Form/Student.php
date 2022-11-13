<?php
    namespace Form;

    class Student extends \Form\StudentManager {
        private $name;
        private $surname;
        private $user;
        private $password;
        private $mail;
        private $phone;
        private $gender;
        private $grade;
        private $birthdate;

        public function __construct($data) {
            $this->name = $data["name"];
            $this->surname = $data["surname"];
            $this->user = $data["user"];
            $this->password = $data["password"];
            $this->mail = $data["mail"];
            $this->phone = $data["phone"];
            $this->gender = $data["gender"];
            $this->birthdate = $data["birthdate"];
            $this->grade = $data["grade"];
        }

        // Getters
        public function getName() {
            return $this->name;
        }

        public function getSurname() {
            return $this->surname;
        }

        public function getUser() {
            return $this->user;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getMail() {
            return $this->mail;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getGender() {
            return $this->gender;
        }

        public function getGrade() {
            return $this->grade;
        }

        public function getBirthdate() {
            return $this->birthdate;
        }

        // Setters
        public function setName($name) {
            $this->name = $name;
        }

        public function setSurname($surname) {
            $this->surname = $surname;
        }

        public function setUser($user) {
            $this->user = $user;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function setMail($mail) {
            $this->mail = $mail;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function setGender($gender) {
            $this->gender = $gender;
        }

        public function setGrade($grade) {
            $this->grade = $grade;
        }

        public function setBirthdate($birthdate) {
            $this->birthdate = $birthdate;
        }

        public function validateStudent() {
            foreach (\Form\Input::$inputs as $input) {
                $input->validate();
            }
        }

        public function isValid() {
            return count(\Form\Input::getErrors()) == 0;
        }
    }
?>