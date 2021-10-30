<?php
include '../../connection.inc.php';
if (isset($_GET['type']) && $_GET['type'] != '') {
	$type= $_GET['type'];
	if ($type == 'status') {
		$operation = $_GET['operation'];
		$id = $_GET['id'];
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$url = $_SERVER['HTTP_REFERER'];
		$update_status_sql = "update our_clients set status='$status' where id='$id'";
		mysqli_query($connection, $update_status_sql);
		echo "<script>
		window.location.replace('" . $url . "')
	</script>";
	}}
    ?>