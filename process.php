<?php

    class Admin{
        protected $name;
        protected $email;
        protected $password;
        protected $ID;

        function __construct($user, $pass){
            $this->email =$user;
            $this->password = $pass;
        }
        
         public function setID($ID){
            $this->ID = $ID;
        }
        public function getID(){
            return $this->ID;
        }

        public function setFullName($name){
            $this->name = $name;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getFullName(){
            return $this->name;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }

        public function signin ($pdo){
            $password = $this->getPassword();
            $name = $this->getFullName();
            $email = $this->getEmail();
           // $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO admin (name,email,password) VALUES(?,?,?)');
                $stmt->execute([$name,$email,$password/*$passwordHash*/]);
                echo '<script>alert("Registration successful")</script>';
                echo '<script>window.location="login.php"</script>';
            } catch (PDOException $e) {
                return $e->getMessage();
            }            
        }

       
}






?>