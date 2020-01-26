<?php


class GetUsersInfo
{
    private  static $allData = null;

    public static function findUsersData($email = null)
    {
        $db = new PDO('mysql:host=localhost;dbname=prothoma', 'root', '');

        if ($email){
            $sql = "SELECT * FROM `registration` WHERE email = :email";

            $query = $db->prepare($sql);
            $result = $query->execute(
                array(
                    ':email' => $email
                )
            );

            if ($result){
                self::$allData = $query->fetchAll(PDO::FETCH_OBJ);
            }

            if (self::$allData){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function getUsersData()
    {
        if (self::$allData){
            return self::$allData;
        }else{
            return false;
        }
    }
}