<?php
if (file('txt/'.$_COOKIE['game'].'turn.txt')[0] == $_COOKIE['player']) {
	$discardFile = file('txt/'.$_COOKIE['game'].'discard.txt');
	$myfile = fopen('txt/'.$_COOKIE['game'].'discard.txt', 'w');
	fwrite($myfile, file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0]);
	foreach($discardFile as $card) {
		fwrite($myfile, $card);
	}
	fclose($myfile);
	if ($deck[0] == null) {
	        include "deck.php";
	        shuffle($deck);
	        $myfile = fopen('txt/'.$_COOKIE['game']."deck.txt", "w") or die("Unable to open file!");
	        foreach($deck as $card) {
	                fwrite($myfile, strval($card)."\n");
	        }
	        fclose($myfile);
	}
	$deck = file('deck.txt');
	unset($deck[0]);
	$myfile = fopen('txt/'.$_COOKIE['game'].$_COOKIE['player']."hand.txt", "w") or die("Unable to open file!");
	fwrite($myfile, '');
	fclose($myfile);
	$myfile = fopen('txt/'.$_COOKIE['game']."deck.txt", "w") or die("Unable to open file!");
	foreach($deck as $card) {
		fwrite($myfile, strval($card));
		fwrite($myfile);
	}
	fclose($myfile);
	$turn = file('txt/'.$_COOKIE['game'].'turn.txt')[0] % file('txt/'.$_COOKIE['game'].'players.txt')[0];
	$myfile = fopen('txt/'.$_COOKIE['game']."turn.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $turn+1);
	fclose($myfile);
	echo json_encode("success");
}
?>
