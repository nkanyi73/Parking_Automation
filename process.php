<?php

    class Admin{
        private $name;
        private $email;
        private $password;
        private $ID;

        
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
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO admin (name,email,password) VALUES(?,?,?)');
                $stmt->execute([$name,$email,$passwordHash]);
                echo '<script>alert("Registration successful")</script>';
                echo '<script>window.location="login.php"</script>';
            } catch (PDOException $e) {
                return $e->getMessage();
            }            
        }

       public function login($pdo){
        session_start();
        try{
            $password = $this->getPassword();
            $ID = $this->getID();
            $sql = "SELECT * FROM admin WHERE employeeID=?";
            $stmt =$pdo->prepare($sql);
            $stmt->execute([$ID]);
            $result=$stmt->fetch();
            $hash = $result['password'];
            //print_r($result['password']);
            if(empty($result)){
                echo '<script>alert("Invalid credentials")</script>';
                echo '<script>window.location="login.php"</script>';
            }else{
                    if (password_verify($password, $hash)) {
                        $_SESSION['employeeID'] = $result['employeeID'];
                        echo '<script>alert("Login successful")</script>';
                        echo '<script>window.location="index.php"</script>';
                        
                    }else{
                        echo '<script>alert("Wrong credentials")</script>';
                        echo '<script>window.location="login.php"</script>';
                    }
                }
    }catch(Exception $e){
        return $e->getMessage();
    }
}
}






?>