<?php

require_once "DataBaseConnect.php";

class UserData {

    public function createNewUserData($userName, $mail, $password){
        $dbh = dbCon();
        
        $sql = "INSERT INTO user_data(user_name, user_mail, user_password, last_update) values (?,?,?,now())";
        $stmt = $dbh->prepare($sql);
        $flag = $stmt->execute(array($userName, $mail, $password));

        return $flag;
    }

    public function getUserDataByMail($mail){
        # code...
    }

    public function getUserIdByMail($mail){
        # code...
    }

    public function isUserRegisterd($mail){
       
        $dbh = dbCon();

        $sql = "SELECT * from user_data where user_mail = :mail limit 1";
        $stmt = $dbh -> prepare($sql);
        $stmt->execute(array(":mail"=>$mail));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data) == 0){
            return false;
        }else{
            return true;
        }

    }

    /*== login ==*/
    public function login($mail, $password){
        
        $dbh = dbCon();

        $sql = "SELECT * from user_data where user_mail = :mail and user_password = :password limit 1";
        $stmt = $dbh -> prepare($sql);
        $stmt->execute(array(":mail"=>$mail, ":password"=>$password));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data) == 0){
            $returnObject = [
                "ok" => false
            ];
        }else{
            $returnObject = [
                "ok" => true,
                "data" => $data[0]
            ];
        }

        return $returnObject;

    }

}