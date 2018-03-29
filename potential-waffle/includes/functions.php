
<?php
//function Get IP
	function get_ip() {
		// IP if shared net
		if (isset($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		// IP behind Proxy
		elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		// normal IP
		else {
			return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
		}
	}
//Get date and define it in ISO 
	function date_iso(){ return date ("Y-m-d\TH:i:sO");}

//Define FOAAS quotes
	function foaas(){
		$quackArray = array(
			"1" => "Fuck you, asshole.", /*asshole*/
			"2" => "Why? Because fuck you, that's why.", /*because*/
			"3" => "Fuckity bye!", /*bye*/
			"4" => "How about a nice cup of shut the fuck up? ", /*cup*/
			"5" => "Everyone can go and fuck off.", /*everyone*/
			"6" => "Fuck everything. ", /*everything*/
			"7" => "Fuck you, you fucking fuck.", /*fyyff*/
			"8" => "Fuck you and the horse you rode in on.", /*horse*/
			"9" => "No fucks given.", /*no*/
			"10" => "Well, fuck me pink." /*pink*/
		);
		//Count for random choice, corresponding with number of line in array
		$quackMin = 1;
		$quackMax = count($quackArray);
		//Random choice
		$quackQuoteNumber = rand ( $quackMin , $quackMax );
		return $quackArray[$quackQuoteNumber];
	}

//Regex the post
	function regexAndWrite($quackName){
		//preparing pattern for REGEX
		$pattern = "/^[a-yA-YÀ-ÿ]+[ \-']?[a-yA-YÀ-ÿ]+/";
		//If pattern OK, sending everithing
		if(preg_match($pattern, $quackName, $matches)){
			//define quote with FOAAS random function
			$quackQuote = foaas();
			//Opening file with writting rights
			$quackFile = fopen('quotation.txt', 'a');
			//Writting quote & name, separate by "--" to split 'em later & go to the line for next name
			fputs($quackFile, $quackQuote."--".$quackName.PHP_EOL ); 
			//Closing the file
			fclose($quackFile);
			return true;
		}else
			return false;
	}


// Read the file where quotes & names are.
	function blockquoteContent(){
		//Put each line in an array & sort by desc
		$quackLine = file('includes/quotation.txt');
		krsort ($quackLine);
		//initialize count for specific colors
		$cpt = 0;
		//Read each array to put quote & name in a blockquote content
		foreach ($quackLine as $quackValue) {
			$quackValue = preg_split("/--/", $quackValue);
			
			if(isset($quackValue[1])){
				//Usefull count for specific colors
				$cpt++;
				if($cpt == 6)
					$cpt = 1;
				//anonymize username
				$quackName = anonymize($quackValue[1]);
				//Blockquote
				echo "<blockquote data-username=".$quackName.">";
				echo "<p class='quotecolor".$cpt."'>".$quackValue[0]."</p>";
				echo "<p class='bold'>".$quackName."</p>";
				echo "</blockquote>";
			}else{}
		}
	}

// Transform names to become anonymous
	function anonymize($quackParams){
		$quackName = $quackParams;
		$quackPatternOneWord = "/^[a-yA-YÀ-ÿ]+[\-']?[a-yA-YÀ-ÿ]?/";
		$quackPatternTwoWords = "/^[a-yA-YÀ-ÿ]+[\s][a-yA-YÀ-ÿ]+/";
		$quackPatternWithNumber = "/^[0-9]{1,2}[a-yA-YÀ-ÿ]+$/";

		if(preg_match($quackPatternTwoWords, $quackName)){
			//separate each word in an array
			$quackDivideName = (preg_split("/[\s]+/", $quackName) );
			//recreate name	with second word replacement 
			$quackName = $quackDivideName[0]." ".substr_replace($quackDivideName[1], '.', 1);
			return $quackName;
		
		}elseif(preg_match($quackPatternOneWord, $quackName)){
			//Count string length less 3 
			$quackLength = strlen($quackName) - 3;
			//prepare the anonymous way by multiply "x" by string lenght less 3
			$quackRemplacement = str_repeat ("x", $quackLength);
			// replace caracters by x starting to the third caracter
			$quackName = substr_replace($quackName, $quackRemplacement, 3);
			return $quackName;

		
		}elseif(preg_match($quackPatternWithNumber, $quackName)){
			$quackInt = '';
			$quackStr = '';
			for($i = 0; $i < strlen($quackName); $i++){
			    if(is_numeric($quackName[$i])){ $quackInt .= $quackName[$i];}
			    if(!is_numeric($quackName[$i])){ $quackStr .= $quackName[$i];}
			}

			return(str_repeat ($quackStr, $quackInt));
		}else{
			return false;
		}
	}
?>