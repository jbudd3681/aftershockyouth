<?php 

include('db_config.php');
	$results = $db->query('SELECT * FROM users WHERE authlvl = 0');
	$row_cnt = mysqli_num_rows($results);
	echo $row_cnt;

?>