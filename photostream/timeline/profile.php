
<?php
require_once "header.php";
require_once "../common/UserData.php";
$userDataManager = new UserData();

$profileId = $_GET["userId"];

if($profileId == $userId){
    //自分自信
    $isSelf = true;
}else{
    $isSelf = false;
}

$profileData = $userDataManager->getUserDataById($profileId);

$profileImageUrl = $userDataManager->getUserProfileImage($profileId);


?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 col-sm-12 offset-md-3 mt-5">



            <img src="<?php print($profileImageUrl);?>" class="image-center rounded-circle profile-image mt-2" width="50%">

            <p class="text-center mt-2 text-bold username-text">@<?php print($profileData["user_name"]); ?></p>
            
            <?php
                if($isSelf){
                    print("<p class='text-center'>{$userMail}</p>");
                    print("<a href='./profileImage.php' class='text-center link-center'>プロフィール写真を変更する</a>");
                }
            ?>

            

        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <div class="card-columns">

            <?php

                //個人の写真データを取得する
                
                require_once "../common/Image.php";
                $imageManager = new Image();

                $userImageList = $imageManager->getUserImageList($profileId);

                for($i=0; $i<count($userImageList); $i++){

                    //userNameを取得
                    $userName = $userDataManager->getUserNameById($userImageList[$i]["user_id"]);
                    $url = "./upload/stream/{$userImageList[$i]["file_name"]}";
                    $profileImageUrl = $userDataManager->getUserProfileImage($profileId);

                    print("<div class='card mt-2' style=''>");
                    print("<img src='{$profileImageUrl}' class='article-profile-image m-2 rounded-circle'>");
                    print("<label class='article-user-name'> @{$userName}");
                    print("<img class='card-img-top' src='{$url}' alt='Card image cap'>");
                    print("<div class='card-body'>");
                    print("<p class='card-text'>{$userImageList[$i]["description"]}</p>");
                    print("<p class='card-text text-gray'>{$userImageList[$i]["update_date"]}</p>");
                    print("</div></div>");

                }

            ?>

            </div>

        </div>

    </div>

</div>
