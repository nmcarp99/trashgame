<?php
error_reporting(0);
for ($i=1;$i<6;$i++) {
        $myfile = fopen('txt/'.$_COOKIE['game'].$i."hand.txt", "w") or die("Unable to open file!hand");
        fwrite($myfile, '');
        fclose($myfile);
}
for ($i=1;$i<6;$i++) {
        $myfile = fopen('txt/'.$_COOKIE['game'].$i."flipped.txt", "w") or die("Unable to open file!flipped");
        fwrite($myfile, ' ');
        fclose($myfile);
}
$myfile = fopen('txt/'.$_COOKIE['game']."discard.txt", "w") or die("Unable to open file!discard");
fwrite($myfile, '');
fclose($myfile);
$_COOKIE['player'] = setcookie('player', "", time()-3600);
$myfile = fopen('txt/'.$_COOKIE['game']."turn.txt", "w") or die("Unable to open file!turn");
fwrite($myfile, 1);
fclose($myfile);
if (!isset($_GET['won'])) {
$myfile = fopen('txt/'.$_COOKIE['game']."players.txt", "w") or die("Unable to open file!players");
    fwrite($myfile, $_GET['players']);
fclose($myfile);
}
include "deck.php";
shuffle($deck);
for ($i=1;$i<6;$i++) {
	$myfile = fopen('txt/'.$_COOKIE['game'].$i."useCard.txt", "w") or die("Unable to open file!usecard");
	for ($j=0;$j<10;$j++) {
		fwrite($myfile, $deck[0]."\n");
		unset($deck[0]);
	}
	fclose($myfile);
}
$myfile = fopen('txt/'.$_COOKIE['game']."deck.txt", "w") or die("Unable to open file!deck");
foreach($deck as $card) {
        fwrite($myfile, strval($card)."\n");
}
fclose($myfile);
echo json_encode(file('txt/'.$_COOKIE['game'].'players.txt')[0][0]);
?>
