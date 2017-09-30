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
		#Создаем массив с существующими именами полей
		foreach ($result as $column) {
			$columns_exist[] = $column['Field'];
		}
		#Сравниваем имена существующих полей с именем запроса и устанавливаем флаг
		$not_exist = TRUE;
		foreach ($columns_exist as $ex_col_name) {
			if ($_GET['col'] === $ex_col_name) {
				$not_exist = FALSE;
			}
		}
		#Если флаг установлен - делаем редирект с сообщением		
		if ($not_exist) {
			header('Location: edit.php?m=not_exist&tb='. $_GET['tb']);
			die;
		}
	} else {
		header("HTTP/1.0 400 Bad Request");
		echo '<h1 style="text-align: center; font-size: 40pt;">400</h1><h1 style="text-align: center;">Неверный запрос</h1>';
		die;
	}

#######

	if ($_POST['col_null'] === 'NO') {
		$null_option = 'NOT NULL';
	} else {
		$null_option = 'NULL';
	}

	$myquery = 'ALTER TABLE `'. $_GET['tb'] .'` DROP COLUMN `'. $_GET['col'] .'`';

	$stm = $newdb->query($myquery);
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	header('Location: edit.php?m=del_succ&tb='.$_GET['tb']);

?>