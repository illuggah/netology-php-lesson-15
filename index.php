<?php 



?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Simple table editor</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #ded;">
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-top">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">Simple table editor | Main</a>

			</div>
			<div class="navbar-collapse navbar-top collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="table_list.php">Список таблиц</a></li>
					<li><a href="create_step_one.php">Создать таблицу</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h2>Hello, World! Я - редактор таблиц MySQL. Со мной Вы сможете:</h2><br>
		<a class="btn btn-primary" href="table_list.php">Просмотреть уже имеющиеся таблицы</a><br><br>
		<a class="btn btn-primary" href="create_step_one.php">Создать новую таблицу</a>
	</div>
</body>
</html>