<?php
    namespace Controller;

    class DBHandle {
        private static $instance;
        private const REPLIES_PER_POST = 5;
        private const POSTS_PER_PAGE = 10;

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

        public function getUserID($name) {
            $sth = self::$instance->prepare(
                "SELECT id FROM users
                    WHERE user = :user"
            );

            $sth->execute([
                ":user" => $name,
            ]);

            return $sth->fetch()["id"];
        }

        public function getUserName($id) {
            $sth = self::$instance->prepare(
                "SELECT user FROM users
                    WHERE id = :id"
            );

            $sth->execute([
                ":id" => $id,
            ]);

            return $sth->fetch()["user"];
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

        public function getPostPages() {
            return ceil(self::getPostsRowCount() / self::POSTS_PER_PAGE);
        }

        public function getPostsRowCount() {
            $sth = self::$instance->query(
                'SELECT *
                    FROM users u, posts p 
                    WHERE u.id = p.id_user'
            );

            return $sth->rowCount();
        }

        public function selectAllPosts($page = 1) {
            $sth = self::$instance->prepare(
                'SELECT u.user, p.id_post, p.title, p.timestamp
                    FROM users u, posts p 
                    WHERE u.id = p.id_user
                    ORDER BY timestamp DESC
                    LIMIT :firstPost, :lastPost'
            );

            $sth->execute([
                ":firstPost" => ($page - 1) * self::POSTS_PER_PAGE,
                ":lastPost" => self::POSTS_PER_PAGE
            ]);

            return $sth->fetchAll();
        }

        public function selectPost($id) {
            $sth = self::$instance->prepare(
                'SELECT u.user, p.*
                    FROM users u, posts p
                    WHERE p.id_post = :id_post
                    AND p.id_user = u.id'
            );

            $sth->execute([
                ":id_post" => $id
            ]);

            return $sth->fetch();
        }

        public function selectLastUserPost($id) {
            $sth = self::$instance->prepare(
                'SELECT id_post
                    FROM posts
                    WHERE id_user = :id_user
                    ORDER BY timestamp DESC LIMIT 1'
            );

            $sth->execute([
                ":id_user" => $id
            ]);

            return $sth->fetch()["id_post"];
        }

        public function insertPost($form) {
            $sth = self::$instance->prepare(
                "INSERT INTO posts (id_user, title, subject, timestamp)
                VALUES (:id_user, :title, :subject, :timestamp)"
            );

            $sth->execute([
                ":id_user" => $_SESSION["userID"],
                ":title" => $form->getTitle()->getValue(),
                ":subject" => $form->getSubject()->getValue(),
                ":timestamp" => $_SERVER["REQUEST_TIME"]
            ]);
        }

        public function getRepliesRowCount($id) {
            $sth = self::$instance->prepare(
                "SELECT u.user, r.subject, r.timestamp
                    FROM users u, replies r
                    WHERE u.id = r.id_user
                    AND r.id_post = :id_post"
            );

            $sth->execute([
                ":id_post" => $id
            ]);

            return $sth->rowCount();
        }

        public function getReplyPages($id) {
            return ceil(self::getRepliesRowCount($id) / self::REPLIES_PER_POST);
        }

        public function selectReplies($id, $page = 1) {
            $sth = self::$instance->prepare(
                "SELECT u.user, r.subject, r.timestamp
                    FROM users u, replies r
                    WHERE u.id = r.id_user
                    AND r.id_post = :id_post
                    LIMIT :firstReply, :lastReply"
            );

            $sth->execute([
                ":id_post" => $id,
                ":firstReply" => ($page - 1) * self::REPLIES_PER_POST,
                ":lastReply" => self::REPLIES_PER_POST
            ]);

            return $sth->fetchAll();
        }

        public function insertReply($form) {
            $sth = self::$instance->prepare(
                "INSERT INTO replies (id_user, id_post, subject, timestamp)
                VALUES (:id_user, :id_post, :subject, :timestamp)"
            );

            $sth->execute([
                ":id_user" => $_SESSION["userID"],
                ":id_post" => $_GET["id"],
                ":subject" => $form->getSubject()->getValue(),
                ":timestamp" => $_SERVER["REQUEST_TIME"]
            ]);
        }

        public static function getInstance() {
            return self::$instance;
        }
    }
?>