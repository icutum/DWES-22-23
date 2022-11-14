<?php
    namespace Form;

    class InputDate extends Input {
        private $minAge;

        public function __construct($name, $data = null, $minAge = 16) {
            $this->type = "date";
            $this->minAge = $minAge;
            parent::__construct($name, null, $data, null);
        }

        public function validate() {
            parent::validate();

            // Comprobación específica
            $sysdate = new \DateTime("now");
            $sysdate->format("Y-m-d");

            $diff = $sysdate->diff(new \DateTime($this->data));

            echo $this->minAge ."<br>";
            echo $this->data . "<br>";
            echo $sysdate->format("Y-m-d") . "<br>";
            echo $diff->y . "<br>";

            if ($this->data > $sysdate || $diff->y <= $this->minAge) {
                parent::$errors[$this->name] = "El alumno tiene que ser mayor de " . $this->minAge . " años";
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