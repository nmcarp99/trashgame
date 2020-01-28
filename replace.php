<?php
if (file('txt/'.$_COOKIE['game'].'turn.txt')[0] == $_COOKIE['player'] and file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0] != '') {
	if (file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0][0] == $_GET['card'][0] and $_GET['card'] != 1 or (file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0][0] == 'A' and $_GET['card'] == 1) or file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0][0] == 'K') {
		$flippedCardsFile = file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'flipped.txt');
		$useCardsFile = file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'useCard.txt');
		$tempcard = $useCardsFile[$_GET['card']-1];
		$myfile = fopen('txt/'.$_COOKIE['game'].$_COOKIE['player'].'flipped.txt', 'w');
		if ($flippedCardsFile[0] == ' ') {
			fwrite($myfile, $_GET['card']."\n");
		}
		else {
			foreach($flippedCardsFile as $card) {
				fwrite($myfile, $card);
			}
			fwrite($myfile, $_GET['card']."\n");
		}
		fclose($myfile);
		$line = 0;
		$myfile = fopen('txt/'.$_COOKIE['game'].$_COOKIE['player'].'useCard.txt', 'w');
		foreach($useCardsFile as $card) {
			$line = $line + 1;
			if ($_GET['card'] == $line) {
				fwrite($myfile, file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0]);
			}
			else {
				fwrite($myfile, $card);
			}
		}
		fclose($myfile);
		$line = 0;
		$myfile = fopen('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt', 'w');
		fwrite($myfile, $tempcard);
		fclose($myfile);
		echo json_encode($tempcard);
	}
}
?>
