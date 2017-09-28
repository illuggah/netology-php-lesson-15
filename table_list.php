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
		<h2>Список таблиц</h2>
		<table class="table">
			<?php
				if (isset($list)) {
					echo "<tr><th>Название</th><th>Инфо</th><th>Редактировать</th><th>Удалить</th></tr>";
					foreach ($list as $list_item) {
						echo '<tr><td>'. $list_item .'</td>
						<td><a href="table_info.php?db='. $list_item .'"><i class="fa fa-info-circle"></i></a></td>
						<td><a href="edit.php?db='. $list_item .'"><i class="fa fa-pencil-square-o"></i></a></td>
						<td><a href="drop.php?db='. $list_item .'"><i class="fa fa-trash"></i></a></td>';
					}
				} 
			?>		
		</table>
	</div>
</body>
</html>