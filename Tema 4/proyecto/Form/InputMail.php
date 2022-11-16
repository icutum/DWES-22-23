<?php
    namespace Form;

    class InputMail extends Input {
        public function __construct($name, $placeholder = null, $data = null, $regex = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/") {
            $this->type = "mail";
            parent::__construct($name, $placeholder, $data, $regex);
        }

        public function validate() {
            parent::validate();

            // Comprobación específica
            if (!preg_match($this->regex, $this->data)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " no es un correo válido";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->data ?>" placeholder="<?= $this->placeholder ?>">
            </label>
        <?php }
    }
?>