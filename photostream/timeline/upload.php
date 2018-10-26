<?php

    require_once "./header.php";

    $flag = $_POST["flag"];

    if($flag){

        $uploadImageFile = $_FILES["uploadImage"]["tmp_name"];
        $uploadImageName = $_FILES["uploadImage"]["name"];

        $text = $_POST["text"];

        //画像の拡張子を取得
        $ext = pathinfo($uploadImageName, PATHINFO_EXTENSION);
        
        //ファイル名をリネーム
        $date = date("YmdHis");
        $newFileName = $date.$userId.".".$ext;
        $fileUrl = "./upload/stream/{$newFileName}";
        $uploadResult = move_uploaded_file($uploadImageFile, $fileUrl);

        if($uploadResult){
            //データベースに情報を登録

            require_once "../common/Image.php";
            $imageManager = new Image();
            $insertImageData = $imageManager->uploadNewImage(
                $newFileName,
                $text,
                $userId
            );

            if($insertImageData){
                header("Location: index.php");
            }else{
                $error[] = "データベースへのアップロードに失敗しました";
            }

        }else{
            $error[] = "ファイルのアップロードに失敗しました";
        }

       
    }

?>

<script>
$(function(){
  $('#uploadImage').change(function(e){
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();
 
    //画像でない場合は処理終了
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }
 
    //アップロードした画像を設定する
    reader.onload = (function(file){
      return function(e){
        $("#imagePreview").attr("src", e.target.result);
        $("#imagePreview").attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
 
  });
});
</script>

<div class="container">

    <div class="row mt-5">
        <div class="col-12 mt-5">
            <h2>画像をアップロードする</h2>
        </div>

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

        <div class="col-md-4 col-sm-12 mt-4">
            <img src="" id="imagePreview" width="100%">
        </div>

        <div class="col-12 mt-5">
            <form action="" method="POST" class="form-group" enctype="multipart/form-data">
                <input type="file" name="uploadImage" accept="image/*" required id="uploadImage" class="form-control">
                <textarea name="text" class="form-control" rows="5" placeholder="キャプションを追加する"></textarea>

                <input type="hidden" name="flag" value="true">

                <button type="submit" class="btn btn-primary btn-center mt-5">アップロード</button>

            </form>
        </div>

        </div>
    </div>

</div>