<?php
    namespace Form;

    class FormHandle {
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

        public function __construct($post) {
            $this->text = $post["usuario"];
            $this->password = $post["contraseña"];
            $this->number = $post["dinero"];
            $this->mail = $post["mail"];
            $this->date = $post["fecha"];
            $this->checkbox = $post["check"];
            $this->radio = $post["genero"];
            $this->select = $post["pais"];
            $this->textarea = $post["comentarios"];
        }

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new FormHandle($_POST);
            }
            return self::$instance;
        }

        public function createInputs($post) {
            $text = new \Input\InputText("usuario", $post["usuario"], "placeholder texto");
            $password = new \Input\InputPassword("contraseña", $post["contraseña"], "placeholder contra");
            $number = new \Input\InputNumber("dinero", $post["dinero"], "placeholder dinero");
            $mail = new \Input\InputMail("mail", $post["mail"], "placeholder mail");
            $date = new \Input\InputDate("fecha", $post["fecha"]);
            $checkbox = new \Input\InputCheckbox("check", $post["check"], "si", "no", "puede");
            $radio = new \Input\InputRadio("genero", $post["genero"], "hombre", "mujer", "todos los dias");
            $select = new \Input\Select("pais", $post["pais"], "españa", "italia", "andorra");
            $textarea = new \Input\Textarea("comentarios", $post["comentarios"], "placeholder textarea");
        }

        public function printForm() { ?>
            <form action="" method="post">
                <?php foreach (\Input\Input::getInputs() as $input) :
                    $input->printInput();
                endforeach; ?>
                <input type="submit" name="submit" value="Enviar">
            </form>
        <?php }

        public function validateForm() {
            foreach (\Input\Input::getInputs() as $input) {
                $input->validate();
            }
        }

        public function isValid() {
            self::validateForm();

            foreach (\Input\Input::getInputs() as $input) {
                if (!empty($input->getError()))
                    return false;
            }
            return true;
        }
    }
?>