<?PHP
	header("Content-type: text/html; charset=utf-8");
	$link = new mysqli('localhost', 'root', '', 'music');
	if(mysqli_connect_errno()){
		die('Unable to connect!');
	}
	mysqli_set_charset($link, 'utf8');
	$mid = $_POST['mid'];
	$sql = "select * from message_list where mid = $mid";
	$result = $link->query($sql);
	$data = array();
	while( $row = $result->fetch_object() ){
		$data[] = $row;
	}
	echo json_encode($data);
?>