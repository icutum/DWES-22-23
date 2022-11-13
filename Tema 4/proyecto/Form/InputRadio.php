<?php
    namespace Form;

    class InputRadio extends Input {
        private $values = [];

        public function __construct($name, $data = null, string ...$values) {
            $this->type="radio";
            foreach ($values as $value) {
                $this->values[] = $value;
            }
            parent::__construct($name, null, $data, null);
        }

        public function validate() {
            // Comprobación específica
            if (!in_array($this->data, $this->values)) {
                parent::$errors[$this->name] = ucfirst($this->name) . " tiene un valor no válido";
            }
        }

        public function printInput() { ?>
            <label class="form__label">
                <?= ucfirst($this->name) ?>:
                <div class="form__radio">
                    <?php foreach ($this->values as $value) : ?>
                        <label class="form__label">
                            <input class="form__input form__input--radio" type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $value ?>" <?= ($value == $this->data)?"checked":""; ?> > <?= $value ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </label>
        <?php }
    }
?>