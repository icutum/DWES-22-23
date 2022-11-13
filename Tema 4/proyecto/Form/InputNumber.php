<?php
    namespace Form;

    class InputNumber extends Input {
        public function __construct($name, $placeholder = null, $data = null, $regex = "/^[69]{1}[0-9]{8}$/") {
            $this->type="number";
            parent::__construct($name, $placeholder, $data, $regex);
        }

        public function validate() {
            parent::validate();

            // Comprobación específica
            if (!preg_match($this->regex, $this->data)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " tiene que empezar por 6 o 9 y tener una longitud de 8 caracteres";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <input required class="form__input" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $this->data ?>" placeholder="<?= $this->placeholder ?>" min=600000000 max=999999999>
            </label>
        <?php }
    }
?>