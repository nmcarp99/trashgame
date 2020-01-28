<?php
if (file('txt/'.$_COOKIE['game'].'turn.txt')[0] == $_COOKIE['player'] and file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0] == '') {
	if ($deck[0] == null) {
	        include "deck.php";
	        shuffle($deck);
	        $myfile = fopen('txt/'.$_COOKIE['game']."deck.txt", "w") or die("Unable to open file!");
	        foreach($deck as $card) {
	                fwrite($myfile, strval($card)."\n");
	        }
	        fclose($myfile);
		$hand[] = $deck[0]."\n";
	}
	else {
		$deck = file('txt/'.$_COOKIE['game'].'deck.txt');
		$hand[] = $deck[0];
	}
	unset($deck[0]);
	$myfile = fopen('txt/'.$_COOKIE['game'].$_COOKIE['player']."hand.txt", "w") or die("Unable to open file!");
	foreach($hand as $card) {
		fwrite($myfile, $card);
	}
	fclose($myfile);
	$myfile = fopen('txt/'.$_COOKIE['game']."deck.txt", "w") or die("Unable to open file!");
	foreach($deck as $card) {
		fwrite($myfile, strval($card));
		fwrite($myfile);
	}
	fclose($myfile);
	echo json_encode($hand[0]);
}
?>
