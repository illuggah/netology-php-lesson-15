<?php

	require_once 'db_connect.php';

####### Проверка запроса

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

#######

	#Выводим сообщения обработчиков
	if ($_GET['m'] === 'exist') {
		$message = 'Заданное поле уже существует!';
	} elseif ($_GET['m'] === 'del_succ') {
		$message = 'Поле удалено';
	} elseif ($_GET['m'] === 'not_exist') {
		$message = 'Поле не существует';
	} elseif ($_GET['m'] === 'add_succ') {
		$message = 'Поле добавлено';
	} elseif ($_GET['m'] === 'edit_succ') {
		$message = 'Поле отредактировано';
	} else {
		$message = '';
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
				<a href="index.php" class="navbar-brand">Simple table editor | Edit table</a>

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
		<h2>Редактирование таблицы '<?=$_GET['tb']?>'</h2>
		<div class="messages" style="height: 20px;">
			<span id="msg"><?=$message?></span>
		</div>
		<table class="table table-hover">
			<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th><th>Edit</th><th>Delete</th></tr>
			<?php 
				foreach ($result as $column) {
					echo   '<tr><td>'.$column['Field'].'</td>
							<td>'.$column['Type'].'</td>
							<td>'.$column['Null'].'</td>
							<td>'.$column['Key'].'</td>
							<td>'.$column['Default'].'</td>
							<td>'.$column['Extra'].'</td>
							<td><a class="btn btn-warning" href="edit_col.php?tb='. $_GET['tb'] .'&col='. $column['Field'] .'"><i class="fa fa-pencil-square-o"></i></a></td>
							<td><a class="btn btn-danger" href="delete_col.php?tb='. $_GET['tb'] .'&col='. $column['Field'] .'"><i class="fa fa-trash"></i></a></td>
							</tr>';
				}
			?>
			<form method="post" action="add_col.php?tb=<?=$_GET['tb']?>">
				<tr>
				<td><input name="col_name" type="text" maxlength="20"></td>
				<td>
					<select name="col_type">
						<option value="INT">Простое число</option>
						<option value="VARCHAR (255)">Строка</option>
						<option value="TEXT (1024)">Текст</option>
						<option value="DATETIME">Дата</option>
					</select>
				</td>
				<td>
					<select name="col_null">
						<option value="YES">YES</option>
						<option value="NO">NO</option>
					</select>
				</td>
				<td>---</td>
				<td>---</td>
				<td>---</td>
				</tr>
				<tr><td><button class="btn btn-block btn-success" type="submit">Добавить поле</button></td></tr>
			</form>
		</table>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$('#msg').fadeOut(5000);
	</script>
</body>
</html>