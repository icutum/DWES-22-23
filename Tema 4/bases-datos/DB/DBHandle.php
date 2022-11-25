<?php
    namespace DB;

    class DBConnection {
        private static $instance;

        public static function singleton($dsn, $user, $passwd, $options = null) {
            if(!isset(self::$instance)) {
                try {
                    self::$instance = new \PDO($dsn, $user, $passwd, $options);
                } catch (PDOException $e) {
                    print "Error:" . $e->getMessage() . "\n";
                    die();
                }
            }
            return self::$instance;
        }

        public function selectAll($tableName) {
            $sth = self::$instance->prepare("SELECT * FROM :tablename");
            $sth->execute([":tablename" => $tableName]); 
            
            $table = $sth->fetchAll(); ?>

            <table>
                <tr>
                    <?php foreach ($table[0] as $column => $value) : ?>
                        <td><?= $column ?></td>
                    <?php endforeach ?>
                </tr>
                <?php foreach ($table as $row) : ?>
                    <tr>
                        <?php foreach ($row as $column => $value) : ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php }
    }
?>