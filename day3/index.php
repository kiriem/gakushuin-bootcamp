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
				<p class="page-title">お問い合わせフォーム</p>
				<p class="page-text">私たちへのお問い合わせは、以下のフォームよりお願い致します</p>

				<form action="check.php" method="POST" class="form-group">

					<label class="form-title">お名前：</label>
					<input type="text" name="userName" class="form-control" placeholder="お名前を入力" required="">

					<label class="form-title mt-4">メールアドレス：</label>
					<input type="mail" name="mail" class="form-control" placeholder="メールアドレスを入力" required="">

					<label class="form-title mt-4">お問い合わせ内容：</label>
					<select name="category" class="form-control" required="">
						<option value="取材">取材</option>
						<option value="講演依頼">講演依頼</option>
						<option value="打合わせ">打合わせ依頼</option>
						<option value="その他">その他</option>
					</select>

					<label class="form-title mt-4">本文：</label>
					<textarea name="text" class="form-control" rows="5" required=""></textarea>

					<input type="hidden" name="flag" value="true">

					<button type="submit" class="btn btn-primary mt-4">送信する</button>

				</form>

			</div>
		</div>
	</div>
</body>
</html>