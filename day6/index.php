<?php

//ini_set("display_errors", "on");

require_once './common/FavoriteFoods.php';

$foodManager = new FavoriteFoods();

$flag = $_POST["flag"];

if ($flag) {

	$foodName = $_POST["foodName"];
	$reason = $_POST["reason"];

	$createNewData = $foodManager->createNewData($foodName, $reason);
	
}

$foodList = $foodManager->getFoodList();

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
		<div class="row mt-4">
			<div class="col-md-12">

				<h1>SQLの基本</h1>
				<form action="" method="POST" class="form-group">

					<input type="text" name="foodName" required placeholder="食べ物の名前" class="form-control">
					<input type="hidden" name="flag" value="true">
					<textarea name="reason" class="form-control" rows="5" placeholder="好きな理由"></textarea>
					<input type="submit" value="追加する" class="btn btn-primary">
					
				</form>

				<table class="table">

					<thead>
						<tr>
							<th>好きなたべもの</th>
							<th>その理由</th>
						</tr>
					</thead>

					<tbody>

						<?php

							for($i=0; $i < count($foodList); $i++){
								
								print("<tr>");
								print("<td>{$foodList[$i]["food_name"]}");
								print("<td>{$foodList[$i]["reason"]}");
								print("</tr>");
							}

						?>
					</tbody>

				</table>
			</div>
		</div>
	</div>

</body>
</html>