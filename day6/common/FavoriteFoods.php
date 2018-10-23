<?php

require_once 'DataBaseConnect.php';

class FavoriteFoods {

	public function createNewData($foodName, $reason){
		
		$dbh = dbCon();
		$sql = "INSERT INTO my_favorite_foods(food_name, reason) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		$result = $stmt->execute(array($foodName, $reason));

		return $result;

	}

	public function getFoodList(){

		$dbh = dbCon();

		$sql = "SELECT * from my_favorite_foods";
        $stmt = $dbh -> query($sql);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
	}

}