<?php

require_once "DataBaseConnect.php";

class Image {

    public function uploadNewImage($fileName, $text, $userId){
        
        $dbh = dbCon();

        $sql = "INSERT INTO image_data(file_name, description, user_id) values (?,?,?)";
        $stmt = $dbh->prepare($sql);
        $flag = $stmt->execute(array($fileName, $text, $userId));

        return $flag;
    
    }

    public function getUserTimeline($userId){

        $dbh = dbCon();

        $sql = "SELECT * from image_data ORDER BY update_date DESC limit 20";
        $stmt = $dbh -> query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function getUserImageList($userId){
        $dbh = dbCon();

        $sql = "SELECT * from image_data where user_id = ? ORDER BY update_date DESC limit 20";
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute(array($userId));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }




}