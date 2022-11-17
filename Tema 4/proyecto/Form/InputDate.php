<?php
    namespace Form;

    class InputDate extends Input {
        private $minAge;
        private $maxAge;

        public function __construct($name, $data = null, $minAge = 16, $maxAge = 65) {
            $this->type = "date";
            $this->minAge = $minAge;
            $this->maxAge = $maxAge;
            parent::__construct($name, null, $data, null);
        }

        public function validate() {
            parent::validate();

            // Comprobación específica
            $sysdate = new \DateTime("now");
            $sysdate->format("Y-m-d");

            $diff = date_diff(new \DateTime($this->data), $sysdate);
            $diff = intval($diff->format("%R%y")); // %R = +/- | %y = años

            if ($diff <= $this->minAge) {
                parent::$errors[$this->name] = "El alumno tiene que ser mayor de " . $this->minAge . " años";
            } else if ($diff > $this->maxAge) {
                parent::$errors[$this->name] = "El alumno tiene que ser menor de " . $this->maxAge . " años";
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