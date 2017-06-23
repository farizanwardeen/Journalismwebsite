<?php
require('PosTagger.php');
// little helper function to print the results
function printTag($tags) {
        $wordarr = array();
		$tagarr = array();
		$sizecount=0;
		$verbcount=0;
		$notverbcount=0;
		$uniqueoperators=0;
		$uniqueoperand=0;
        foreach($tags as $t) {
               //echo $t['token'] . "/" . $t['tag'] .  " ";
			   // if ((strpos($t['tag'], 'NN') !== FALSE) || (strpos($t['tag'], 'NNP') !== FALSE) || (strpos($t['tag'], 'NNS') !== FALSE)
			         // ||(strpos($t['tag'], 'NP') !== FALSE))
				// {
					//echo $t['token'] . "/" . $t['tag'] .  " ";
				//}
				
				if((strpos($t['tag'], 'VB')!== FALSE) ||(strpos($t['tag'], 'VBD')!== FALSE)||(strpos($t['tag'],'VBG')!== FALSE)
				||(strpos($t['tag'], 'VBN')!== FALSE)||(strpos($t['tag'], 'VBP')!== FALSE)||(strpos($t['tag'],'VBZ')!== FALSE)
				||(strpos($t['tag'], 'RB')!== FALSE) ||(strpos($t['tag'], 'RBR')!== FALSE)||(strpos($t['tag'],'RBS')!== FALSE))
				{
					//echo $t['token'] . "/" . $t['tag'] .  " ";
					$verbcount+=1;
					$sizecount+=1;
					$uniqueverbtoken= $t['token'];
					//echo $uniqueverbtoken;
					
					$checkunique=0;
					foreach($tags as $t)
					{ 
						//echo $uniqueverbtoken."--".$t['token']."<br/>";
						if($t['token'] == $uniqueverbtoken)
						{
							//echo $t['token'].'__'.$uniqueverbtoken.'<br/>' ;
							//echo "_____________________________".'<br/>';
							$checkunique+=1;
						}
					}
					if($checkunique==1){
						$uniqueoperators+=1;
					}
					
				}
				else{
					$notverbcount+=1;
					$sizecount+=1;
					
					$checkuniquenotverb=0;
					$uniquenotverbtoken= $t['token'];
					foreach($tags as $t)
					{ 
						//echo $uniqueverbtoken."--".$t['token']."<br/>";
						if($t['token'] == $uniquenotverbtoken)
						{
							//echo $t['token'].'__'.$uniqueverbtoken.'<br/>' ;
							//echo "_____________________________".'<br/>';
							$checkuniquenotverb+=1;
						}
					}
					if($checkuniquenotverb==1){
						$uniqueoperand+=1;
					}
					
				}
				
        }
		echo "Number of distinct operator= ".$uniqueoperators."</br>";
		echo "Number of distinct operand= ".$uniqueoperand."</br>";
		echo "Total Number of operators= ".$verbcount."<br/>";
		echo "Total Number of operand= ".$notverbcount."<br/>";
		echo "Length of the Article= ".$sizecount."<br/>";
		
		$n1= $uniqueoperators;
		$n2= $uniqueoperand;
		$Num1= $verbcount;
		$Num2= $notverbcount;
		
		echo '</br>';
		echo '</br>';
		echo '</br>';
		echo '</br>';
		
		$programvocabulary= $n1+$n2;
		$programlength=$Num1+$Num2;
		$volume= $programlength*log($programvocabulary,2);
		$difficulty= (($n1/2)*($Num2/$n2));
		$effort= $volume*$difficulty;
		$timerequired = $effort/18;
		echo 'Vocabulary of the article: '.$programvocabulary.'<br/>';
		echo 'Length of the article: '. $programlength.'<br/>';
		echo 'Volume: '. $volume.'<br/>';
		echo 'Difficult in understanding: '. $difficulty.'<br/>';
		echo 'Effort for mashup: '.$effort.'<br/>';
		echo 'Time required to mashup in seconds: '.$timerequired.'<br/>';
		
        echo "\n";
		
		
}


$tagger = new PosTagger('lexicon.txt');
//$tags = $tagger->tag('Barack Obama meets with Raul Castro to talk about US-Cuba relations');

$tags = $tagger->tag('

Feminist author and academic Germaine Greergave a lecture calling at Cardiff University on Wednesday despite a petition with over 3,000 signatures calling for its cancellation.Australian Greer gave the Hayden Ellis Lecture entitled "Women and Power: The Lessons of the 20th Century" under security with uniformed police officers and university security guards. The lecture covered equal pay for women, andEmmeline Pankhurst and the Suffragettes.
Ms Greer had been criticised by LGBTQ rights activists for comments made about transgenderreality television starCaitlyn Jenner, and her belief that post-operative trans women arent real women. The womens officer of the Cardiff University Student Union called for cancelling the lecture in a Change.org petition which has received over 3,000 signatures. "Im 76," Greer said in a BBC Newsnightinterview, "I dont want to go down there and be screamed at and have things thrown at me." However, ultimately she did give the lecture.
The Independent reported a group of around two dozen protestors outside the lecture. LGBTQ rights activist Emily Cotterill, who was at the protest, said she believed transphobia had no place in modern feminism. "I feel like the words Germaine Greer has spouted in recent years has no place in our movement", Ms Cotterill said.');


printTag($tags);


?>		