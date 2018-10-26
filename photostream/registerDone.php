<?php

    session_start();
    $userName = $_SESSION["userData"]["userName"];
    $mail = $_SESSION["userData"]["mail"];
    require_once "header.php";

    //セッション情報を消す
    $flag = $_POST["flag"];

    if($flag){
        unset($_SESSION["userData"]);
        header("Location: login.php");
    }

?>

<div class="container">

    <div class="row mt-5">
        <div class="col-md-6 offset-3 mt-5">

            <h3 class="text-center mb-5">アカウントを作成しました</h3>

            <table class="table">
                <tr><td>ユーザ名</td><td><?php print($userName); ?></td></tr>
                <tr><td>メールアドレス</td><td><?php print($mail); ?></td></tr>
                
            </table>

            <p class="text-center mt-5">先ほど登録したメールアドレスとパスワードでログインしてください</p>

            <form action="" method="POST">
                <input type="hidden" name="flag" value="true">
                <button type="submit" class="btn btn-primary submitButton mt-5 btn-center">ログインする</button>
            </form>

        </div>
    </div>

</div>