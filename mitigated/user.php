<?php
    declare(strict_types=1);

    class User {
        public int $id;
        public string $username;
        public $erros = [];

        public function __construct(int $id, string $username) {
            $this->id = $id;
            $this->username = $username;
        }

        public function __toString(): string {
            return $this->username;
        }

        public function getId(): int {
            return $this->id;
        }

        public function getUsername(): string {
            return $this->username;
        }

        public static function getUser(PDO $db, int $id): ?User {
            $stmt = $db->prepare('
                SELECT id, username
                FROM users
                WHERE id = ?
            ');

            $stmt->execute([$id]);
            $user = $stmt->fetch();

            if (!$user) return null;

            return new User((int) $user['id'], $user['username']);
        }

        public static function login(PDO $db, string $username, string $password): ?User {
            if (self::isBlocked($db, $username)) {
                $erros[] = 'Muitas tentativas de login. Por favor tenta mais tarde.';
                return null;
            }

            $stmt = $db->prepare('
                SELECT id, username, password
                FROM users
                WHERE lower(username) = ?
            ');

            $stmt->execute([strtolower($username)]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $stmt = $db->prepare('DELETE FROM login_attempts WHERE username = ?');
                $stmt->execute([$username]);
                return new User((int) $user['id'], $user['username']);
            }

            $stmt = $db->prepare('INSERT INTO login_attempts (username) VALUES (?)');
            $stmt->execute([$username]);

            $erros[] = 'Username or password inválidos.';
            return null;
        }

        public static function register(PDO $db, string $username, string $password): ?User {
            list($isValid, $errors) = self::validarSenhaForte($password);

            if (!$isValid) {
                $erros[] = 'Validação da password falhada.';
                return null;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $db->prepare('
                INSERT INTO users (username, password)
                VALUES (?, ?)
            ');

            $stmt->execute([strtolower($username), $hashedPassword]);

            return self::login($db, $username, $password);
        }

        public static function isBlocked(PDO $db, string $username): bool {
            $stmt = $db->prepare('
                SELECT COUNT(*) as attempts
                FROM login_attempts
                WHERE username = ? AND attempt_time > datetime("now", "-2 minutes")
            ');

            $stmt->execute([$username]);
            $result = $stmt->fetch();

            return $result['attempts'] >= 3;
        }

        public static function validarSenhaForte(string $password): array {

            if (strlen($password) < 8) $erros[] = 'A password deve ter pelo menos 8 caracteres.';
            if (!preg_match('/[A-Z]/', $password)) $erros[] = 'A password deve conter pelo menos uma letra maiúscula.';
            if (!preg_match('/[a-z]/', $password)) $erros[] = 'A password deve conter pelo menos uma letra minúscula.';
            if (!preg_match('/[0-9]/', $password)) $erros[] = 'A password deve conter pelo menos um número.';
            if (!preg_match('/[\W_]/', $password)) $erros[] = 'A password deve conter pelo menos um caracter especial (ex: !@#$%^&*).';

            $commonPasswords = ['1234', 'password', 'admin', 'porto'];
            if (in_array(strtolower($password), $commonPasswords)) {
                $erros[] = 'A password é muito comum. Escolha uma mais segura.';
            }

            return empty($erros) ? [true, []] : [false, $erros];
        }
    }
?>
