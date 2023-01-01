<?php
    namespace Controller;

    class DBHandle {
        private static $instance;

        public function __construct($dsn, $user, $password, $options) {
            if (!isset(self::$instance)) {
                try {
                    self::$instance = new \PDO($dsn, $user, $password, $options);

                } catch (PDOException $e) {
                    print "Error:" . $e->getMessage() . "\n";
                    exit();
                }
            }
        }

        public function insertUser($form) {
            $sth = self::$instance->prepare(
                "INSERT INTO users (user, mail, password)
                VALUES (:user, :mail, :password)"
            );

            $sth->execute([
                ":user" => $form->getUser()->getValue(),
                ":mail" => $form->getMail()->getValue(),
                ":password" => password_hash($form->getPassword()->getValue(), PASSWORD_DEFAULT)
            ]);
        }

        public function isUserValid($form) {
            $sth = self::$instance->prepare(
                "SELECT password FROM users WHERE user = :user"
            );

            $sth->execute([":user" => $form->getUser()->getValue()]);

            $row = $sth->fetch();

            return @password_verify($form->getPassword()->getValue(), $row["password"]);
        }

        public function isUserAvailable($form) {
            $sth = self::$instance->prepare(
                "SELECT * FROM users WHERE user = :user OR mail = :mail"
            );

            $sth->execute([
                ":user" => $form->getUser()->getValue(),
                ":mail" => $form->getMail()->getValue()
            ]);

            $row = $sth->fetch();

            return empty($row);
        }

        public function selectAllPosts() {
            $sth = self::$instance->query(
                'SELECT u.user, p.id_post, p.title, p.timestamp
                    FROM users u, posts p 
                    WHERE u.id = p.id_user
                    ORDER BY timestamp DESC'
            );

            $table = $sth->fetchAll(); ?>

            <table class="posts">
                <tr class="posts__row">
                    <th class="posts__heading">Fecha y hora</th>
                    <th class="posts__heading">Usuario</th>
                    <th class="posts__heading">Título</th>
                </tr>
                <?php foreach ($table as $row) : ?>

                    <tr class="posts__row">
                        <td class="posts__column">
                            <a class="posts__link" href="./post.php?id=<?= $row['id_post'] ?>">
                                <?= date("d/m/Y H:i",$row['timestamp']) ?>
                            </a>
                        </td>
                        <td class="posts__column"><?= $row["user"] ?></td>
                        <td class="posts__column"><?= $row['title'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php }

        public function selectPost($get) {
            
        }

        public function insertPost($form) {
            $user = $_SESSION["user"];
            $userQuery = self::$instance->query(
                "SELECT id FROM users WHERE user = '$user'"
            );
            $id = $userQuery->fetch()["id"];

            $sth = self::$instance->prepare(
                "INSERT INTO posts (id_user, title, subject, timestamp)
                VALUES (:id_user, :title, :subject, :timestamp)"
            );

            $sth->execute([
                ":id_user" => $id,
                ":title" => $form->getTitle()->getValue(),
                ":subject" => $form->getSubject()->getValue(),
                ":timestamp" => $_SERVER["REQUEST_TIME"]
            ]);
        }

        public static function getInstance() {
            return self::$instance;
        }
    }
?>