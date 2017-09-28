<?php

	require_once 'db_connect.php';

	$i=0;

	while ($i < $_GET['c']) {
		$i++;
		if (empty($_POST["col_name_$i"])) {
			header('Location: create_step_one.php?m=m3');
			die;
		}

		$create_array[] = '`' . $_POST["col_name_$i"] . '` ' . $_POST["col_type_$i"] . ', ';
	}

	$create_query = 'CREATE TABLE IF NOT EXISTS `' . $_GET['n'] . '` (`id` INT NOT NULL AUTO_INCREMENT, ';

	foreach ($create_array as $item) {
		$create_query .= $item;	
	}

	$create_query .= 'PRIMARY KEY (id)) ENGINE=innodb;';

	$stm = $newdb->query($create_query);

	header('Location: messages.php?m=m1&n=' . $_GET['n']);

?>