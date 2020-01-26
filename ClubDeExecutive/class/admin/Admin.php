<?php


class Admin
{
    public $textare;
    public $date;

    public function setdata($data = '')
    {
        if(array_key_exists('textarea',$data)){
        $this->textare = $data['textarea'];
    }
    if(array_key_exists('date',$data)){

        $this->date = $data['date'];
    }

    }

    public function store()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

            $sql = "INSERT INTO `event` (`event_id`, `event_type`, `event_date`) VALUES (:id, :type, :date)";
            $query = 'INSERT INTO someTable VALUES(:name)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id' => null,
                ':type' => $this->textare,
                ':date' => $this->date
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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

    public function showMember(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

            $sql="SELECT * FROM `registration`";
            $query ='INSERT INTO someTable VALUES(:name)';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            $array=$stmt->fetchAll();
            return $array;



        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}



