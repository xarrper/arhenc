<?php
session_start();
include "config.php";
	if(isset($_POST['submit']))  {		
		if(!empty($_POST['name'])) $_SESSION['name'] = $_POST['name'];
		if(!empty($_POST['password'])) $_SESSION['password'] = $_POST['password']; //не хранить пароль в сессии
		$_SESSION['answer'] = array();
		if(($_SESSION['name']=='Ольга')and($_SESSION['password']=='1234')) { //сделать через бд
			$_SESSION['enter'] = 'yes';
			for ($i=1;$i<=count(file('questions.csv'));$i++) { //дурацки, а если миллиард строк??? в сессию или в прочую чушь
				for ($j=1;$j<=count(file('questions.csv'));$j++) { //как определить максимальное кол-во вопосов
					if (isset($_POST['question'.$i.'_'.$j])) {
						$_SESSION['answer'][] = $_POST['question'.$i.'_'.$j];
						
					}
				}
			}
		}
		else $_SESSION['enter'] = 'no';
	}
header('Location: '.PATH); 
exit;
