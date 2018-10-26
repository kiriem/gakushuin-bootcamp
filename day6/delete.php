<?php

    $id = $_GET["id"];

    $flag = $_POST["flag"];

    if($flag){
        //削除処理をする
        require_once "./common/FavoriteFoods.php";
        $foodManager = new FavoriteFoods();

        $isDelete = $foodManager->deleteData($id);

        header("Location: index.php");
        
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>SQLの基本</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./style/style.css" style="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1>削除する</h1>
                <p>データid: <?php print($id); ?> を削除しますか？</p>

                <form action="" method="POST">
                    <input type="hidden" name="flag" value="true">
                    <button type="submit" class="btn btn-danger">削除する</button> 
                </form>

            </div>
        </div>
    </div>

</body>
</html>