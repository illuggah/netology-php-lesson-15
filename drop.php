<?php

	require_once 'db_connect.php';

	$table_query = 'SHOW TABLES';
	$tb_stm = $newdb->query($table_query);
	$tb_result = $tb_stm->fetchAll(PDO::FETCH_ASSOC);

	foreach ($tb_result as $item) {
		foreach ($item as $table_name) {
			#$list[] = $table_name;
			if ($_GET['db'] === $table_name) {
				$is_valid = true;
			}
		}
	}

	if ($is_valid) {
		$myquery = 'DROP TABLE `' . $_GET['db'] . '`';
		$stm = $newdb->query($myquery);
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	} else {
		header("HTTP/1.0 400 Bad Request");
		echo '<h1 style="text-align: center; font-size: 40pt;">400</h1><h1 style="text-align: center;">Неверный запрос</h1>';
		die;
	}

	header('Location: table_list.php');

?>