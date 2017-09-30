<?php

	require_once 'db_connect.php';

#######	Проверка запроса

	$table_query = 'SHOW TABLES';
	$tb_stm = $newdb->query($table_query);
	$tb_result = $tb_stm->fetchAll(PDO::FETCH_ASSOC);

	foreach ($tb_result as $item) {
		foreach ($item as $table_name) {
			#$list[] = $table_name;
			if ($_GET['tb'] === $table_name) {
				$is_valid = true;
			}
		}
	}

	if ($is_valid) {
		$myquery = 'DESCRIBE `' . $_GET['tb'] . '`';
		$stm = $newdb->query($myquery);
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	} else {
		header("HTTP/1.0 400 Bad Request");
		echo '<h1 style="text-align: center; font-size: 40pt;">400</h1><h1 style="text-align: center;">Неверный запрос</h1>';
		die;
	}

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
				<a href="index.php" class="navbar-brand">Simple table editor | Table info</a>

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
		<h2>Информация о таблице '<?=$_GET['tb']?>'</h2>
		<table class="table table-hover">
			<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>
			<?php 
				foreach ($result as $column) {
					echo   '<tr><td>'.$column['Field'].'</td>
							<td>'.$column['Type'].'</td>
							<td>'.$column['Null'].'</td>
							<td>'.$column['Key'].'</td>
							<td>'.$column['Default'].'</td>
							<td>'.$column['Extra'].'</td></tr>';
				}
			?>
		<tr><td><a class="btn btn-warning btn-block" href="edit.php?tb=<?=$_GET['tb']?>">Редактировать таблицу</a></td></tr>
		</table>
	</div>
</body>
</html>