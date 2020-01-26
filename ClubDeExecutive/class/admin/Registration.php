<?php

class Registration
{
    public $email;
    public $password;
    public $reputation;
    public $text;



    public function setData($data = '')
    {
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = $data['password'];
        }
        if(array_key_exists('reputation', $data)){
            $this->reputation = $data['reputation'];
        }
        if(array_key_exists('text', $data)){
            $this->text=$data['text'];
        }


    }

    public function store()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

            $sql = "INSERT INTO `registration` (`user_id`, `email`, `password`) VALUES (:id, :email, :pass)";
            $query = 'INSERT INTO someTable VALUES(:name)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id' => null,
                ':email' => $this->email,
                ':pass' => $this->password
            ));
            $_SESSION['email']=$this->email;
            if ($stmt) {
                session_start();
                $_SESSION['message'] = 'Registration Successfull';
                header('location:profile.php');
            }
            else{
                $_SESSION['message']= "Re Try";
            }


        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function login()
    {


        $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');
        $sql = "SELECT * FROM `registration` WHERE email=:email AND password=:password";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':email' => $this->email, ':password' => $this->password));

        $userData = $stmt->fetch();
        if ($stmt->rowCount()>0)
        {
            session_start();
            $_SESSION['uname']=$userData['email'];
            header('location:profile.php');

        }
        else{
            session_start();
            $_SESSION['message']="Invalide Inpute...";

        }
        $this->id=$userData['id'];

    }
    public function storeReputation(){

         $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');
        $sql = "INSERT INTO `reputation` (`r_id`, `reputation`) VALUES (:id , :reputation)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => null, ':reputation' => $this->reputation));
        if($stmt){
//            session_start();
            $_SESSION['message']="Thank you for giving your reputation";

        }


    }
    public function storeChoice(){

         $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');
        $sql = "INSERT INTO `choice` (`choice`, `c_id`) VALUES (:choice, :id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array( ':choice' => $this->text, ':id' => null));
        if($stmt){

            $_SESSION['message']="Submitted";

        }
    }
    public function show(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

            $sql="SELECT * FROM `event`";
            $query ='INSERT INTO someTable VALUES(:name)';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $array=$stmt->fetchAll();
            return $array;



        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
    public function logout(){

        if(isset($_SESSION)){
            unset($_SESSION);
            session_destroy();
            header('location:login.php');
        }

    }



}