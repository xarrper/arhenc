$(document).on('click','#insert',function() { //div > span
	val = $('input[name = "question"]').val();
	jQuery.ajax({
		url: 'insert_question.php',
		type: 'POST',
		data: {val: val},
		success: function() {
			alert('Данные успешно отправлены');
			$('input[name = "question"]').val('');
		}
	});
});	