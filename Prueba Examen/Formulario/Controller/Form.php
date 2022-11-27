<?php
    namespace Controller;

    class Form {
        private static $instance;
        private $text;
        private $password;
        private $number;
        private $mail;
        private $date;
        private $checkbox;
        private $radio;
        private $select;
        private $textarea;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new Form();
            }
            return self::$instance;
        }

        public function createInputs($post) {
            @$this->text = new \Input\InputText("usuario", $post["usuario"], "placeholder texto");
            @$this->password = new \Input\InputPassword("contraseña", $post["contraseña"], "placeholder contra");
            @$this->number = new \Input\InputNumber("dinero", $post["dinero"], "placeholder dinero");
            @$this->mail = new \Input\InputMail("mail", $post["mail"], "placeholder mail");
            @$this->date = new \Input\InputDate("fecha", $post["fecha"]);
            @$this->checkbox = new \Input\InputCheckbox("check", $post["check"], "si", "no", "puede");
            @$this->radio = new \Input\InputRadio("genero", $post["genero"], "hombre", "mujer", "todos los dias");
            @$this->select = new \Input\Select("pais", $post["pais"], "españa", "italia", "andorra");
            @$this->textarea = new \Input\Textarea("comentarios", $post["comentarios"], "placeholder textarea");
        }

        public function printForm() { ?>
            <form action="" method="post">
                <?php if (@$_GET["success"]) : ?>
                    <p class="form__success">Se ha creado correctamente</p>
                <?php endif; ?>

                <?php foreach ($this as $input) :
                    $input->printInput();
                endforeach; ?>
                <input type="submit" name="submit" value="Enviar">
            </form>
        <?php }

        public function validateForm() {
            foreach ($this as $input) {
                $input->validate();
            }
        }

        public function isValid() {
            self::validateForm();

            foreach ($this as $input) {
                if (!empty($input->getError()))
                    return false;
            }
            return true;
        }

        public function getKeys() {
            $keys = [];

            foreach ($this as $input) {
                $keys[] = $input->getName();
            }

            return $keys;
        }

        public function getText() {
            return $this->text;
        }

        public function setText() {
            return $this->text;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword() {
            return $this->password;
        }

        public function getNumber() {
            return $this->number;
        }

        public function setNumber() {
            return $this->number;
        }

        public function getMail() {
            return $this->mail;
        }

        public function setMail() {
            return $this->mail;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate() {
            return $this->date;
        }

        public function getCheckbox() {
            return $this->checkbox;
        }

        public function setCheckbox() {
            return $this->checkbox;
        }

        public function getRadio() {
            return $this->radio;
        }

        public function setRadio() {
            return $this->radio;
        }

        public function getSelect() {
            return $this->select;
        }

        public function setSelect() {
            return $this->select;
        }

        public function getTextarea() {
            return $this->textarea;
        }

        public function setTextarea() {
            return $this->textarea;
        }
    }
?>