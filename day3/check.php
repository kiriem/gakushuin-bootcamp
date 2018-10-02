<?php

	//POST形式で渡されてきたflagという名前のデータを取得する
	$flag = $_POST["flag"];

	if($flag){
		$userName = $_POST["userName"];
		$mail = $_POST["mail"];
		$category = $_POST["category"];
		$text = $_POST["text"];
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>お問い合わせフォーム</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./style/style.css" style="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
	
	<div class="container">

		<div class="row">

			<div class="col-12 m-3">
				<p class="page-title">お問い合わせ内容の確認</p>

				<table class="table">
					<tr><td>お名前</td><td><?php print($userName); ?></td></tr>
					<tr><td>メールアドレス</td><td><?php print($mail); ?></td></tr>
					<tr><td>お問い合わせ内容</td><td><?php print($category); ?></td></tr>
					<tr><td>本文</td><td><?php print($text); ?></td></tr>
				</table>

			</div>

		</div>

	</div>

</body>

</html>