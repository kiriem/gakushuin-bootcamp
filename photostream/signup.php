<?php

require_once "./common/UserData.php";
$udManager = new UserData();

$flag = $_POST["flag"];

if($flag){

    //使うデータ

    $userName = $_POST["userName"];
    $mail = $_POST["userMail"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    //エラーを入れておくための配列を作成
    $error = [];

    //入力された2つのパスワードが正しいかどうかを判定する

    if($password1 !== $password2){
        $error[] = "入力されたパスワードが一致しません";
    }

    //すでにメールアドレスが登録されていないかどうかを調べる
    $isUserRegisterd = $udManager->isUserRegisterd($mail);

    if($isUserRegisterd){
        $error[] = "このメールアドレスは既に登録されています";
    }

    //エラーがなかった場合、登録処理を行う

    if(count($error) == 0){

        //パスワードのハッシュ化処理
        $password = sha1($password1);

        $register = $udManager->createNewUserData(
            $userName,
            $mail,
            $password
        );

        if($register){
            
            session_start();
            $_SESSION["userData"] = [
                "userName" => $userName,
                "mail" => $mail
            ];

            header("Location: registerDone.php");

        }else{
            $error[] = "登録に失敗しました";
        }

    }

}

require_once "header.php";

?>

<div class="container">

    <div class="row mt-5">
        <div class="col-md-6 offset-3 mt-5">

            <h3 class="text-center mb-5">アカウントを作成する</h3>

            <?php

                if(count($error) > 0){
                    print("<div class='alert alert-warning text-center' role='alert'>");
                    for($i=0; $i<count($error); $i++){
                        print("$error[$i]");
                        print("<br>");
                    }
                    print("</div>");
                }

            ?>

            <form action="" method="POST">
                <input type="text" name="userName" class="form-control text-center mt-3" placeholder="ユーザ名" required>
                <input type="email" name="userMail" class="form-control text-center mt-3" placeholder="メールアドレス" required>
                <input type="password" name="password1" class="form-control text-center mt-3" placeholder="パスワード" required>
                <input type="password" name="password2" class="form-control text-center mt-3" placeholder="パスワードを再度入力" required>
                <input type="hidden" name="flag" value="true">
                <button type="submit" class="btn btn-primary mt-5 btn-center">アカウントを作る</button>
            </form>

        </div>
    </div>

</div>