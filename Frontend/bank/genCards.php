<?php
include('card.php');

validateCard('a', '340000000000009');
$cardsToGen = 100;
$writeToFile = "";

$writeFile = 'visa_cards.txt';
$cardTypeGen = 'v';
$cardLen = 13;
$startWith = 4000000000000;

$cardsCount = 0;
while ($cardsCount < $cardsToGen)
{
    $result = validateCard($cardTypeGen, $startWith);
    if ($result == true)
    {
        $writeToFile = $writeToFile.$startWith."\n";
        $cardsCount++;
    }
    $startWith++;
}


$myfile = fopen($writeFile, "w") or die("Unable to open file!");
fwrite($myfile, $writeToFile);
fclose($myfile);
?>

