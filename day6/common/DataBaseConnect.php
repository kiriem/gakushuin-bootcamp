<?php

	function dbCon() {

		//0:本番 1:ローカル
		$debugFlag = 1;

		if ($debugFlag == 0) {
	        
	    }elseif ($debugFlag == 1) {
		    
			$dsn = 'mysql:dbname=sql-example;host=localhost';
	    	$user = 'root';
	    	$password = 'root';

	    }else{
	    	print("error");
		}		

    	$connOpt = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			PDO::ATTR_EMULATE_PREPARES=>false
		);

 		// DBサーバーへコネクト
    	$dbh = new PDO($dsn, $user, $password, $connOpt);
		
		return $dbh;

	}
