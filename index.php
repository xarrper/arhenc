<?
session_start();
include "function.php";
?>
<!DOCTYPE html>
<html>
<head>
<link href="reset.css" rel="stylesheet" type="text/css" />
<link href="normalize.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="handler.js"></script>
</head>
<body>
<div class='menu'>Меню
<?

	if($_SESSION['enter']=='yes') { 
		echo '<form action="exit.php">
		<input type="submit" name="exit" value="Выход">
		</form>';
	}
	
?>
</div>
<div id='comboDiv'>
<div class='block block1'>
<form name="test" method="post" action="authorized.php" >
<?

	if($_SESSION['enter']!='yes') {
		echo '  <p>Логин:<br>
		<input type="text" size="15" name="name" value="'.$_SESSION['name'].'">
		</p>
		<br>
		<p>Пароль:<br>
		<input type="password" size="15" name="password">
		</p>
		<br>';
	}
	
?>
<p><input type="submit" name="submit" value="Отправить"></p>
</div>
<div class='block block2'> 
<?

	$array_id_questions = array(); 
	if (($_SESSION['enter']=='yes')or(!(isset($_SESSION['questions'])))) array_id_questions();
	else $array_id_questions=$_SESSION['questions'];
	file_questions();

?>
</div>
<div class='block block3'>
<?

	if ($_SESSION['enter']=='yes') {
		echo 'Здравствуйте, '.$_SESSION['name'].'<br>';
		display_answer();
	}
	elseif ($_SESSION['enter']=='no') echo 'Проверьте пароль/логин';
	
?>
</div>
</div>
<div class='end'></div>

<div class='block block4'>
	<p>Хочу свои вопросы!</p><br>
	<input type="text" size="30" name="question"><br>
	<p><span id='insert'>Отправить</span></p>
</div>
</body>
</html>