<?
/*$mysql=mysql_connect("127.0.0.1","root","") OR DIE("Не могу создать соединение ");
mysql_query('SET names "utf8"');
mysql_select_db("diploma",$mysql) or die(mysql_error());




$query ="INSERT INTO `question` (`question`.`text`) VALUES ('".$text."')";
mysql_query($query);

mysql_close($mysql);*/
//echo json_encode($text);	
try
{
	$DBH = new PDO('mysql:host=127.0.0.1;dbname=diploma','root','');
	$STH = $DBH->prepare("INSERT INTO question (text) VALUES (?)");
	$STH->bindParam(1, $text);
	$text = $_POST['val'];
	$STH->execute(); 
	$DBH = null;
}
catch(PDOException $e)
{
	die("Error: ".$e->getMessage());
}