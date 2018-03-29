<?php
//To choose Hello World langage
	$quackLang = array (
	    'english' => 'Hello world !',
	    'french' => 'Bonjour le monde !',
	    'spanish' => 'Hola Mundo',
	    'ukranian' => 'Привіт Світ',
	    'japanese' => 'こんにちは世界',
	    'hebrew' => 'שלום עולם'
	);
	//looking for good langage
	if(isset($_POST['lang'])){
		$quackIntro = $quackLang[$_POST['lang']];
		return ($quackIntro);
	}
?>