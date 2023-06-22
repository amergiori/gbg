<?php
    class Users {
        public $users;
        protected static $conn;
        protected $error;

        public function insert($user) {
            require_once ('../DB.php');
            require_once '../Controller/API/UserController.php';
            $usersController = new UserController();
            try {
                $db = DB::getInstance();
                $sql = "INSERT INTO users (username, email, password, birthdate, tel, url) VALUES (?,?,?,?,?,?)";
                $stmt= $db->prepare($sql);    
                $stmt->execute([
                    $user->username, 
                    $user->email, 
                    $user->password, 
                    $user->birthdate, 
                    $user->tel,
                    $user->url
                ]);        
                $usersController->setError('');
            } catch (Exception $e) {
                $usersController->setError($e->getMessage());
            }
        }

        public function getList($email = "") {
            require_once PROJECT_ROOT_PATH . "/DB.php";
            require_once '../Controller/API/UserController.php';
            $usersController = new UserController();
            try {
                $db = DB::getInstance();
                $emailString = "%$email%";
                $query = $db->prepare("SELECT * FROM `users` WHERE `email` LIKE :email");
                $query->bindParam(':email', $emailString);
                $query->execute();
                $usersController->setError('');
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                $usersController->setError($e->getMessage());
            }
        }
        
        public function deleteUser($id = "") {
            require_once PROJECT_ROOT_PATH . "/DB.php";
            require_once '../Controller/API/UserController.php';
            $usersController = new UserController();
            if ($id) {
                try {
                    $db = DB::getInstance();
                    $db->prepare("DELETE FROM users WHERE id=?")->execute([$id]);
                    $usersController->setError('');
                    return 'User has been deleted';
                } catch (Exception $e) {
                    $usersController->setError($e->getMessage());
                }
            }
        }
    }