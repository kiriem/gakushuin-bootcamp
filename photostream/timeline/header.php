<?php

//ログインしているかどうか確認

$isLogin = $_COOKIE["isLogin"];

if($isLogin){

    $userId = $_COOKIE["userId"];
    $userName = $_COOKIE["userName"];
    $userMail = $_COOKIE["userMail"];
}else{
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PhotoStream</title>
    <meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../style/style.css" style="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php"><i class="fas fa-camera"></i> Photo Stream</a>
        <ul class="navbar-nav">
             <li class="nav-item">
                <a class="nav-link active" href="upload.php"><i class="fas fa-cog"></i> upload image</a>
            </li>
         </ul>
        
        <div class="dropdown ml-auto">
            <!-- 切替ボタンの設定 -->
  
            <a class="btn bg-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                    if($isLogin){
                        print($userMail);
                        print(" / (@{$userName})");
                    }else{
                        print("ログイン / サインイン");
                    }
                ?>
                </a>

            <!-- ドロップメニューの設定 -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                    if($isLogin){
                        print("<a class='dropdown-item' href='./profile.php?userId={$userId}'><i class='fas fa-sign-out-alt'></i> プロフィール</a>");
                        print("<a class='dropdown-item' href='./logout.php'><i class='fas fa-sign-out-alt'></i> ログアウト</a>");
                    }else{
                        print("<a class='dropdown-item' href='./login.php'><i class='fas fa-sign-in-alt'></i> ログイン</a>");
                        print("<a class='dropdown-item' href='./signup.php'><i class='fas fa-user-plus'></i> サインイン</a>");
                    }
                ?>
                
            </div>
        </div>
    </nav>