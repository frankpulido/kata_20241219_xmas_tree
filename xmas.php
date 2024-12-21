<?php
declare(strict_types=1);

$height = 0;
$total_blanks = 0;
$print_blanks = "";
$total_leaves = 0;
$leaves = "";
$total_blanks_trunk = 0;
$blanks_trunk = "";
$exit = 1;
const TRUNK_WIDTH = 3; // TRUNK WIDTH CANNOT BE EITHER EVEN OR LARGER THAN ($HEIGHT + 1)

do {
    echo PHP_EOL;
    /*
    $height = (int) readline("Merry Xmas!... How tall you want your Xmas tree?");
    */
    echo "Enter tree height in branches :) ";
    $height = (int)trim(fgets(STDIN));
    echo "Your Xmas tree has $height leaves height!\n";

    for($i = 1; $i <= $height; $i++) {
        $total_blanks = $height - $i;
        $print_blanks = "";
        for ($j = 1; $j<= $total_blanks; $j++) {
            $print_blanks = $print_blanks . " ";
        }
        //echo $print_blanks;
        $total_leaves = ($i * 2) - 1;
        $leaves = "";
        for ($k = 1; $k <= $total_leaves; $k++) {
            if (isEven($k)) {$leaves = $leaves . "o";}
            else {$leaves = $leaves . "*";}
        }
        if ($height == 1) {$print_blanks = " ";} // Center trunk for outlier value : $height = 1
        echo $print_blanks . $leaves . PHP_EOL;
    }
    $total_blanks_trunk = (($height*2) - 1 - TRUNK_WIDTH)/2; // TRUNK WIDTH CANNOT BE EITHER EVEN OR LARGER THAN ($HEIGHT + 1)
    $blanks_trunk = "";
    for ($r = 1; $r <= $total_blanks_trunk; $r++) {
        $blanks_trunk = $blanks_trunk . " ";
    }
    echo $blanks_trunk . "|||" . PHP_EOL;
    echo PHP_EOL;
    echo "Do you want to print another Xmas tree? Press \"0\" to quit, any other key to CONTINUE  : ";
    $exit = trim(fgets(STDIN));
} while ($exit != 0);

function isEven (int $number) : bool {
    return (($number & 1) === 0); // Usando === me aseguro que se trate de un número entero
}
?>