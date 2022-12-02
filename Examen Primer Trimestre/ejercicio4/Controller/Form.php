<?php
    namespace Controller;

    class Form {
        private static $instance;
        private $nombre;
        private $direccion;
        private $extras;

        public static function singleton() {
            if(!isset(self::$instance)) {
                self::$instance = @new Form();
            }
            return self::$instance;
        }

        public function createInputs($post) {
            @$this->nombre = new \Input\InputText("nombre", $post["nombre"], "Nombre del queso...");
            @$this->direccion = new \Input\InputText("direccion", $post["direccion"], "Dirección de envío...");
            @$this->extras = new \Input\InputCheckbox("extras", $post["extras"], "Caja Madera", "Tarjeta Regalo", "Envío urgente", "Panecillos", "Membrillo");
        }

        public function printForm() { ?>
            <form action="" method="post">
                <?php if (@$_GET["success"]) : ?>
                    <p class="form__success">Gracias por su pedido</p>
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

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function getExtras() {
            return $this->extras;
        }

        public function setExtras($extras) {
            $this->extras = $extras;
        }
    }
?>