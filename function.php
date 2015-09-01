<?

function array_id_questions() { //заполнения массива сессии случайными вопросами.
	$count_questions = count(file('questions.csv')); 
	$count_rand_questions = rand(1, $count_questions);
	global $array_id_questions;
	while($count_rand_questions!=count($array_id_questions)){
		$question; 
		if (( $questions = array_search($question = rand(1, $count_questions), $array_id_questions) ) === false) {
			$array_id_questions[] = $question;
		}
	}
	$_SESSION['questions']=$array_id_questions;
}

function file_questions() { //чтение вопрос и ответов из файла, и оформление
	$array_questions = array();
	global $array_id_questions;
	$fh = fopen ( 'questions.csv', 'r' );
	$string_questios='';
	while ( ( $info = fgetcsv ($fh, 1000, ";") ) !== false )
	{
		if (array_search($info[0], $array_id_questions)!==false) {
			$string_questios.='<p><b>'.(iconv("Windows-1251", "UTF-8",$info[1])).'</b><Br>';
			if ($info[2]=='radio') {
				for ($i=3;$i<count($info);$i++) 
					$string_questios.='<input type="radio" name="question'.$info[0].'.1" value="answer'.$info[0].'.'.($i-2).'"> '.(iconv("Windows-1251", "UTF-8",$info[$i])).'<Br>';
			}
			else {
				for ($i=3;$i<count($info);$i++) 
					$string_questios.='<input type="checkbox" name="question'.$info[0].'.'.($i-2).'" value="answer'.$info[0].'.'.($i-2).'"> '.(iconv("Windows-1251", "UTF-8",$info[$i])).'<Br>';
			}
			$string_questios.='</p>';

		}
	}
	$string_questios.='</form>';
	fclose ( $fh );
	echo $string_questios;
}

function display_answer() { //оформление ответов на вопросы
	$string_answer='';
	if(!empty($_SESSION['answer'])) {
		sort($_SESSION['answer']);
		preg_match('/([0-9]+).([0-9]+)/',$_SESSION['answer'][0],$mas);
		$guestion = $mas[1];
		$string_answer .="<p>Вопрос №".$mas[1]."<br>Ответ:".$mas[2]."</p>";
		for ($i=1;$i<count($_SESSION['answer']);$i++) {
			if (preg_match('/([0-9]+).([0-9]+)/',$_SESSION['answer'][$i],$mas)) {
				if ($guestion != $mas[1]) { 
					$string_answer .="<p>Вопрос №".$mas[1]."</p><p>Ответ:".$mas[2]."</p>";
					$guestion = $mas[1];
				}
				else $string_answer .="<p>Ответ:".$mas[2]."</p>";
			}
		}
	}
	echo $string_answer;
}

