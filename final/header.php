<?php

    //ログインしているかどうか確認

    $isLogin = $_COOKIE["isLogin"];

    if($isLogin){
        $userName = $_COOKIE["userName"];
        $userMail = $_COOKIE["userMail"];
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- generalStyle -->
    <link rel="stylesheet" type="text/css" href="./style/style.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


    <title>iboard -みんなで作る、掲示板</title>
    <link rel="stylesheet" href="./style/style.css" style="text/css">
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">iboard -みんなでつくる掲示板</a>
        <ul class="navbar-nav">
             <li class="nav-item">
                <a class="nav-link active" href="newThread.php"><i class="fas fa-cog"></i> 新しいスレッドを作る</a>
            </li>
         </ul>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
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
                        print("<a class='dropdown-item' href='./logout.php'><i class='fas fa-sign-out-alt'></i> ログアウト</a>");
                    }else{
                        print("<a class='dropdown-item' href='./login.php'><i class='fas fa-sign-in-alt'></i> ログイン</a>");
                        print("<a class='dropdown-item' href='./signup.php'><i class='fas fa-user-plus'></i> サインイン</a>");
                    }
                ?>
                
            </div>
        </div>
    </nav>