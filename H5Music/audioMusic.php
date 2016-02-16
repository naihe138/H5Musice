<?PHP
	header("Content-type: text/html; charset=utf-8");
	$link = new mysqli('localhost', 'root', '', 'music');
	if(mysqli_connect_errno()){
		die('Unable to connect!');
	}
	mysqli_set_charset($link, 'utf8');
	$id = $_GET['id'];
	$sql = "select * from music_list where id = $id";
	$result = $link->query($sql);
	echo json_encode( $result->fetch_object());
?>