<?php
    declare(strict_types = 1);

    class User {
        public int $id;
        public string $username;

        public function __construct(int $id, string $username) {
            $this->id = $id;
            $this->username = $username;
        }

        public function __toString() : string {
            return $this->username;
        }

        public function getId() : int {
            return $this->id;
        }

        public function getUsername() : string {
            return $this->username;
        }

        public static function getUser(PDO $db, int $id) : ?User {
            $stmt = $db->prepare('
                SELECT id, username
                FROM users
                WHERE id = ?
            ');

            $stmt->execute(array($id));
            $user = $stmt->fetch();

            if (!$user)
                return null;

            return new User((int) $user['id'], $user['username']);
        }

        public static function login(PDO $db, string $username, string $password) : ?User {
            $stmt = $db->prepare('
                SELECT id, username, password
                FROM users
                WHERE lower(username) = ?
            ');

            $stmt->execute(array(strtolower($username)));
            $user = $stmt->fetch();

            if ($user && md5($password) === $user['password'])
                return new User((int) $user['id'], $user['username']);

            return null;
        }

        public static function register(PDo $db, string $username, string $password) : ?User {
            $stmt = $db->prepare('
                INSERT INTO users (username, password)
                VALUES (?, ?)
            ');

            try {
                $stmt->execute(array(strtolower($username), md5($password)));
            } catch (PDOException $e) {
                return null;
            }

            return User::login($db, $username, $password);
        }
    }
?>
