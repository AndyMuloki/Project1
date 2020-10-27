<?php

include_once 'account.php';
if(!isset($_SESSION)){session_start(); }

    class User implements Account{
        
        protected $userName;
        protected $password;
        protected $newPass;
        protected $fName;
        protected $email;
        protected $city_of_residence;
        protected $pic;
        
        function __construct($user, $pass){
            $this->userName =$user;
            $this->password = $pass;
        }
        
        public function setFullName ($fName){
        	$this->fName = $fName;
        }
        
        public function getFullName (){
        	return $this->fName;
        }

        public function setEmail ($email){
            $this->email = $email;
        }
        
        public function getEmail (){
            return $this->email;
        }

        public function setCityOfResidence ($city_of_residence){
            $this->city_of_residence = $city_of_residence;
        }
        
        public function getCityOfResidence (){
            return $this->city_of_residence;
        }

        public function setNewPass ($newPass){
            $this->newPass = $newPass;
        }

        public function getNewPass (){
            return $this->newPass;
        }

        /**
        * Create a new user
        * @param Object PDO Database connection handle
        * @return String success or failure message
        */
        public function register ($pdo){

            $file_name = $this->pic['name'];
            $folder = "product-images/".$file_name;

            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO users (fName, userName, password, email, city_of_residence, profile_photo) VALUES (?,?,?,?,?)');

                $stmt->execute([$this->fName, $this->userName, $passwordHash, $this->email, $this->city_of_residence, $folder]);
                $stmt = null;
                return "Registration was successiful";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }            
        }
        /**
        * Check if a user entered a correct username and password
        * @param Object PDO Database connection handle
        * @return String success or failure message
        */
        public function login ($pdo){
            try {
                $stmt = $pdo->prepare("SELECT password FROM users WHERE userName=?");
                $stmt->execute([$this->userName]);
                $row = $stmt->fetch();
                if($row == null){
                	return "This account does not exist";
                }
                if (password_verify($this->password,$row['password'])){
                	return "Correct password";
                }
                return "Your username or password is not correct";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }
        }

        public function changePassword($pdo){

            try{
                $stmt = $pdo->prepare ('UPDATE `users` SET `password` = ? WHERE `userID` = ? AND `password` = ?');
                $stmt->execute([$this->newPass, $_SESSION['user_id'], $this->password]);
                $result = $stmt->fetch();
                $stmt = null;
                return 'User Password has changed';
            } catch (PDOException $e) {
                return $e->getMessage();
            } 
        }

        public function logout($pdo){
            session_destroy();
        }

        public function _destruct(){}
    }
?>