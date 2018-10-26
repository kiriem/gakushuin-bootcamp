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

    public function getUserDataById($userId){
        $dbh = dbCon();
        $sql = "SELECT user_name from user_data where id = :userId limit 1";
        $stmt = $dbh -> prepare($sql);
        $stmt->execute(array(":userId"=>$userId));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0];

    }

    public function getUserIdByMail($mail){
        # code...
    }

    public function getUserProfileImage($userId){
        $dbh = dbCon();
        $sql = "SELECT user_profile_image from user_data where id = :userId limit 1";
        $stmt = $dbh -> prepare($sql);
        $stmt->execute(array(":userId"=>$userId));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($data[0]["user_profile_image"] == "") {
            return "upload/profile_image/profile.png";
        }else{
            return "upload/profile_image/{$data[0]['user_profile_image']}";
        }

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

    public function getUserNameById($userId){
        $dbh = dbCon();
        $sql = "SELECT * from user_data where id = :userId limit 1";
        $stmt = $dbh -> prepare($sql);
        $stmt->execute(array(":userId"=>$userId));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0]["user_name"];

    }

    /*== profile ==*/

    public function updateProfileImage($userId, $fileName){
        $dbh = dbCon();
        $sql = "UPDATE user_data SET user_profile_image = ? where id = ? limit 1";
        $stmt = $dbh->prepare($sql);
        $result = $stmt->execute(array($fileName, $userId));

        return $result;

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