<?php


class Event
{
    public $image;
    public function store($data=''){
        if(array_key_exists('image',$data)){
            $this->image=$data['image'];
        }

    }

public function storePicture(){

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

        $sql = "INSERT INTO `galary` (`id`, `image`) VALUES (:id, :image);";
        $query = 'INSERT INTO someTable VALUES(:name)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => null,
             ':image'=>$this->image
        ));
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
public function show(){
    $pdo = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');
    $sql = "SELECT * FROM `galary`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $array = $stmt->fetchAll();
    return $array;
}

}