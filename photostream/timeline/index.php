<?php

    require_once "./header.php";    
?>

    <div class="container">

        <div class="row mt-5">

            <div class="col-sm-12 col-md-6 offset-md-3 mt-5">

                <?php
                
                    require_once "../common/Image.php";
                    $imageManager = new Image();
                    $timelineData = $imageManager->getUserTimeline($userId);

                    require_once "../common/UserData.php";
                    $userDataManager = new UserData();
                    
                    for($i=0; $i<count($timelineData); $i++){

                        //userNameを取得
                        $userName = $userDataManager->getUserNameById($timelineData[$i]["user_id"]);
                        $url = "./upload/stream/{$timelineData[$i]["file_name"]}";

                        $profileImageUrl = $userDataManager->getUserProfileImage($timelineData[$i]["user_id"]);

                        print("<div class='card mt-2' style=''>");
                        print("<a href='profile.php?userId={$timelineData[$i]["user_id"]}'>");
                        print("<img src='{$profileImageUrl}' class='article-profile-image m-2 rounded-circle'>");
                        print("</a>");
                        print("<img class='card-img-top' src='{$url}' alt='Card image cap'>");
                        print("<div class='card-body'>");
                        print("<p class='card-text text-bold'><a href='profile.php?userId={$timelineData[$i]["user_id"]}'>@{$userName}</a></p>");
                        print("<p class='card-text'>{$timelineData[$i]["description"]}</p>");
                        print("<p class='card-text text-gray'>{$timelineData[$i]["update_date"]}</p>");
                        print("</div></div>");

                    }
                 
                ?>

            </div>
        </div>

    </div>

</body>

</html>