<?php 

	if (empty($_POST['table_name'])) {
		header('Location: create_step_one.php?m=m1');
		die;
	} elseif (empty($_POST['col_count'])) {
		header('Location: create_step_one.php?m=m2');
		die;
	}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Step 2 | Create table</title>
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
				<a href="index.php" class="navbar-brand">Simple table editor | Create table - Step 2</a>

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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Создать новую таблицу - шаг 2 | <?=$_POST['table_name']?></h3>
					</div>
					<div class="panel-body">
	                    <form method="POST" action="create_handler.php?n=<?=$_POST['table_name']?>&c=<?=$_POST['col_count']?>">
							<table class="table">
								<tr><th>Имя столбца</th><th>Тип</th></tr>
								<tr><td>`id`</td><td>INT (Primary Key, Auto Incrementable)</td></tr>
								<?php
									$type_options = '<option value="INT">Простое число</option>
													<option value="VARCHAR (255)">Строка</option>
													<option value="TEXT (1024)">Текст</option>
													<option value="DATETIME">Дата</option>
													</select>';
									while ($i < $_POST['col_count']) {
										$i++;
										echo '<tr><td><input type="text" maxlength="20" name="col_name_'. $i .'"></td><td><select name="col_type_'. $i .'">'. $type_options .'</td></tr>';
									}
								?>
							</table>
							<button class="btn btn-success btn-block" type="submit">Создать</button>
							<a href="create_step_one.php" class="btn btn-warning btn-block">Назад</a>
	                    </form>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
</body>
</html>