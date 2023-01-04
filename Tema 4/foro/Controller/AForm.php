<?php
    namespace Controller;

    abstract class AForm {
        public static abstract function singleton();

        public abstract function createInputs($post);

        public function printForm($submitMessage) { ?>
            <form class="form" action="" method="post">
                <?php foreach ($this as $input) :
                    $input->printInput();
                endforeach; ?>
                <input type="submit" name="submit" value="<?= $submitMessage ?>">
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
    }
?>