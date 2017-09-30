<?php

	if ($_GET['m'] === 'm1') {
		$message = 'Введите название таблицы!';
	} elseif ($_GET['m'] === 'm2') {
		$message = 'Введите количество полей!';
	} elseif ($_GET['m'] === 'm3') {
		$message = 'Заполните названия всех полей!';
	} elseif ($_GET['m'] === 'm4') {
		$message = 'Таблица с данным именем уже существует!';
	} else {
		$message = 'Создать новую таблицу - шаг 1';
	}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Step 1 | Create table</title>
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
				<a href="index.php" class="navbar-brand">Simple table editor | Create table - Step 1</a>

			</div>
			<div class="navbar-collapse navbar-top collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="table_list.php">Список таблиц</a></li>
					<li class="active"><a href="#">Создать таблицу</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row vertical-offset-100">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><?=$message?></h3>
					</div>
					<div class="panel-body">
	                    <form method="POST" action="create_step_two.php">
	                        <fieldset>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Имя таблицы*" name="table_name" maxlength="20" type="text">
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" placeholder="Кол-во полей**" name="col_count" min="1" max="16" type="number">
	                            </div>
	                            <p>*Название таблицы может содержать латинские символы и числа</p>
	                            <p>**Поле `id` будет добавлено автоматически</p>
	                            <input class="btn btn-success btn-block" type="submit" value="Продолжить &raquo">
	                        </fieldset>
	                    </form>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
</body>
</html>