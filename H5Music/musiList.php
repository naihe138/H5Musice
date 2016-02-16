<?PHP
	
//	旧版的
	 
//	header("Content-type: text/html; charset=utf-8");
//	$con = mysql_connect('localhost', 'root', '');
//	mysql_select_db('music');
//	mysql_query('set names utf8');
//	$sql = 'select name, musicName from music_list';
//	$query = mysql_query($sql);
//	if( $query && mysql_num_rows($query) ){
//		while($row = mysql_fetch_assoc($query)){
//			$data[] = $row;
//		}
//		echo json_encode($data);
//	}
	 
	//下面是5.3以上的版本的
	//定义头文件utf-8编码
	header("Content-type: text/html; charset=utf-8");
	//链接数据库
	$link = new mysqli('localhost', 'root', '', 'music');
	//如果数据库链接失败
	if(mysqli_connect_errno()){
		die('Unable to connect!');
	}
	//对数据库定于utf8的编码
	mysqli_set_charset($link, 'utf8');
	//表查询语句
	$sql = 'select id, name, musicName from music_list';
	//执行查询代码
	$result = $link->query($sql);
	//声明data数组变量
	$data = array();
	//循环查询语句  放到data数组里面
	while( $row = $result->fetch_object() ){
		$data[] = $row;
	}
	//输出数组
	echo json_encode($data);
?>