<?php
    namespace Controller;

    class SigninForm extends AForm {
        protected static $instance;
        protected $user;
        protected $mail;
        protected $password;
        protected $redirect;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new SigninForm();
            }
            return self::$instance;
        }

        public function createInputs($post) {
            @$this->user = new \Input\InputText("usuario", $post["usuario"], "Nombre de usuario");
            @$this->mail = new \Input\InputMail("mail", $post["mail"], "Correo");
            @$this->password = new \Input\InputPassword("contraseña", $post["contraseña"], "Contraseña");

            if (isset($_GET["redirect"])) {
                $url = $_GET["redirect"];
            } else if (isset($_POST["redirect"])) {
                $url = $_POST["redirect"];
            } else {
                $url = "index.php";
            }

            @$this->redirect = new \Input\InputHidden("redirect", $url);

        }

        public function getUser() {
            return $this->user;
        }

        public function setUser($user) {
            $this->user = $user;
        }

        public function getMail() {
            return $this->mail;
        }

        public function setMail($mail) {
            $this->mail = $mail;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getRedirect() {
            return $this->redirect;
        }

        public function setRedirect($redirect) {
            $this->redirect = $redirect;
        }
    }
?>