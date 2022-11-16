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

        public function __construct($post) {
            $this->name = $post[$_SESSION["keys"][0]];
            $this->surname = $post[$_SESSION["keys"][1]];
            $this->gender = $post[$_SESSION["keys"][2]];
            $this->birthdate = $post[$_SESSION["keys"][3]];
            $this->user = $post[$_SESSION["keys"][4]];
            $this->password = $post[$_SESSION["keys"][5]];
            $this->mail = $post[$_SESSION["keys"][6]];
            $this->phone = $post[$_SESSION["keys"][7]];
            $this->grade = $post[$_SESSION["keys"][8]];
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

            // Hardcodear es mi pasión
            $this->setName(\Form\Input::$inputs[0]->getData());
            $this->setSurname(\Form\Input::$inputs[1]->getData());
            $this->setGender(\Form\Input::$inputs[2]->getData());
            $this->setBirthdate(\Form\Input::$inputs[3]->getData());
            $this->setUser(\Form\Input::$inputs[4]->getData());
            $this->setPassword(\Form\Input::$inputs[5]->getData());
            $this->setMail(\Form\Input::$inputs[6]->getData());
            $this->setPhone(\Form\Input::$inputs[7]->getData());
            $this->setGrade(\Form\Input::$inputs[8]->getData());
        }

        public function isValid() {
            return count(\Form\Input::getErrors()) == 0;
        }
    }
?>