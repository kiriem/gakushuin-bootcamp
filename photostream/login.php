<?php

    //ini_set("display_errors", "on");
    
    require_once "./common/UserData.php";
    $userDataManager = new UserData();

    $flag = $_POST["flag"];
    if($flag){
        $mail = $_POST["mail"];
        $userPassword = $_POST["userPassword"];

        $password = sha1($userPassword);

        $login = $userDataManager->login($mail, $password);

        $error = [];

        if($login["ok"]){
            //ログイン成功！

            //クッキーに保存する
            setcookie("isLogin", true);
            setcookie("userId", $login["data"]["id"]);
            setcookie("userName", $login["data"]["user_name"]);
            setcookie("userMail", $login["data"]["user_mail"]);

            header("Location: index.php");

        }else{

            $error[] = "ログインに失敗しました。メールアドレスとパスワードの組み合わせを確認してください";

        }

    }
 
 require_once "header.php";

?>


<div class="container">

    <div class="row mt-5">
        <div class="col-md-6 offset-3 mt-5">

            <h3 class="text-center mb-5">login</h3>

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
                <input type="text" name="mail" class="form-control text-center mt-3" placeholder="メールアドレス">
                <input type="password" name="userPassword" class="form-control text-center mt-3" placeholder="パスワード">
                <input type="hidden" name="flag" value="true">
                <button type="submit" class="btn btn-primary mt-5 btn-center">ログインする</button>
            </form>

        </div>
    </div>

</div>