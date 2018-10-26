<?php

//ini_set("display_errors", "true");

session_start();

$qId = $_GET["qid"];

require_once './quizList.php';

$quizData = $quizList[$qId];

$flag = $_POST["flag"];

$alertShowFlag = false;

if ($qId == 0) {
	unset($_SESSION["correct"]);
}

if($flag){
	$answer = $quizData["answer"];

	$alertShowFlag = true;

	$userAnswer = $_POST["userAnswer"];
	

	//正誤判定		
	if ($userAnswer == $answer) {
		$result = true;
		$_SESSION["correct"] += 1;
	}else{
		$result = false;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>クイズ</title>

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
			<div class="col-12 mt-3 p-2">
				<p class="page-title text-center text-white bg-primary">クイズ集</p>
			</div>
			<div class="col-12 mt-2 bg-light p-2">
				<h3>問題！</h3>
				<p><?php print($quizData["quiz"]); ?></p>
			</div>

			<div class="col-12 mt-2 p-2">
				<form class="form-group" action="" method="POST">
					<input type="text" name="userAnswer" class="form-control" placeholder="回答を入力">
					<input type="hidden" name="flag" value="true">
					<button type="submit" class="btn btn-success mt-5 submitButton">回答する</button>
				</form>
			</div>

		</div>

		<div class="row">

<?php

	if($alertShowFlag){

		if ($result) {

print<<<EOF
<div class="col-12 mt-5 p-2 bg-danger">
<h3>正解です！</h3>
</div>
EOF;
		}else{

print<<<EOF
<div class="col-12 mt-5 p-2 bg-info">
<h3>残念...不正解！</h3>
<p>正解は、◯◯でした。</p>
</div>
EOF;

		}

		$nextQId = $qId+1;

		//if文

		if ($qId+1 == count($quizList)) {
print<<<EOF
<a href="result.php" class="btn btn-warning mt-3 submitButton">結果を見る</a>
EOF;

		}else{
print<<<EOF
<a href="index.php?qid={$nextQId}" class="btn btn-warning mt-3 submitButton">次の問題へ</a>
EOF;

		}
		

	}

	?>		
		
		</div>
	</div>

</body>
</html>