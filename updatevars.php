<?php
error_reporting(E_ERROR | E_PARSE);
$drawnCard = file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'hand.txt')[0];
$hand = array();
$turn = file('txt/'.$_COOKIE['game'].'turn.txt')[0];
$flipped = file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'flipped.txt') or die('Unable to open: '.$_COOKIE['player'].'flipped.txt');
$handfile = file('txt/'.$_COOKIE['game'].$_COOKIE['player'].'useCard.txt') or die("unable to open file handfile");
$discard = file('txt/'.$_COOKIE['game'].'discard.txt')[0];
$player = $_COOKIE['player'];
foreach($handfile as $handcard) {
	$hand[] = $handcard;
}
$flippedCards = array(false, false, false, false, false, false, false, false, false, false);
foreach($flipped as $numFlipp) {
	$flippedCards[substr($numFlipp, 0, strlen($numFlipp))-1] = true;
}
$finished = true;
foreach($flippedCards as $flippedCard) {
	if ($flippedCard != true) {
		$finished = false;
	}
}
if ($finished == true) {
    if ($turn != $_COOKIE['player']) {
        $output = 'gameover';
    }
    else if (file('txt/'.$_COOKIE['game'].'players.txt')[0] == 1) {
        $output = 'gameover';
    }
}
else {
	$output = array($flipped, $hand, $drawnCard, $turn, $player, $discard, $flippedCards);
}
echo json_encode($output);
?>
