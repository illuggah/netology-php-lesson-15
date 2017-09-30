<?php 

	require_once 'db_connect.php';

	$myquery = 'SHOW TABLES';
	$stm = $newdb->query($myquery);
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $item) {
		foreach ($item as $table_name) {
			$list[] = $table_name;
		}
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
				<a href="index.php" class="navbar-brand">Simple table editor | Table list</a>

			</div>
			<div class="navbar-collapse navbar-top collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="table_list.php">Список таблиц</a></li>
					<li><a href="create_step_one.php">Создать таблицу</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
			<?php
				if (isset($list)) {
					echo '<h2>Список таблиц</h2>' . PHP_EOL;
					echo "<table class=\"table table-hover\"><tr><th>Имя</th><th>Инфо</th><th>Редактировать</th><th>Удалить</th></tr>";
					foreach ($list as $list_item) {
						echo '<tr><td>'. $list_item .'</td>
						<td><a class="btn btn-info" href="table_info.php?tb='. $list_item .'"><i class="fa fa-info-circle"></i></a></td>
						<td><a class="btn btn-warning" href="edit.php?tb='. $list_item .'"><i class="fa fa-pencil-square-o"></i></a></td>
						<td><a class="btn btn-danger" href="drop.php?tb='. $list_item .'"><i class="fa fa-trash"></i></a></td>';
					}
					echo '</table>';
				} else {
					echo '<h2>Список таблиц пуст</h2>' . PHP_EOL . '<h2><small>Вы можете</small></h2>' . PHP_EOL;
					echo '<a href="create_step_one.php" class="btn btn-primary">Создать таблицу</a>';
				}
			?>		
	</div>
</body>
</html>