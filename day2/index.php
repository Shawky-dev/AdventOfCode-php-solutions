<?php
function printArray($array)
{
    $arrlenght = count($array);
    for ($i = 0; $i < $arrlenght; $i++) {
        echo $array[$i];
        echo ",";
    }
}
function checkIfSafe($report)
{
    $arrlength = count($report);
    $increasing = true;
    echo "arrlenght:" . $arrlength;
    for ($i = 0; $i < $arrlength - 1; $i++) {
        //i=tail
        //j=head
        $j = $i + 1;
        echo "<br>";
        echo "iteration:" . $i + 1 . "i:" . $i . " j:" . $j;
        //check for condition 1: Any two adjacent levels differ by at least one and at most three.
        $x = abs($report[$i] - $report[$j]);
        if ($x == 0 || $x > 3) {
            echo "   cond1:";
            echo $report[$i];
            echo " - ";
            echo $report[$j];
            echo " = ";
            echo $x;
            return false;
        }
        if ($report[$i] > $report[$j]) { // if decreasing
            if ($i == 0) { // if at the start then assign our case as decreasing
                $increasing = false;
            } else { //else we are not at the start so
                if ($increasing == true) { //if the assigned is increasing then return false
                    return false;
                }
                //if not then assigned is decreasing so we do nothing cause the current elements are legal
            }
        } else {
            if ($i != 0 && $increasing == false) { // if at the start then assign our case as decreasing
                return false;
            }
            //if not then assigned is decreasing so we do nothing cause the current elements are legal
        }
    }
    return true;
}
$filename = 'input.txt';
if (file_exists($filename) && is_readable($filename)) {

    $file = fopen($filename, "r");
    $score = 0;
    while (($line = fgets($file)) !== false) {
        $reportString = explode(" ", trim($line));
        $reportNum = array_map('intval', $reportString);
        printArray($reportString);
        echo "<br>";
        printArray($reportNum);
        echo '       :';
        if (checkIfSafe($reportNum) == true) {
            $score = $score + 1;
            echo "safe";
            echo '<br>';
        } else {
            echo "unsafe";
            echo '<br>';
        }
    }
}
echo $score;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="flex flex-row space-x-5">
        <div>
            <?php

            ?>
        </div>
        <div>
            <?php
            ?>
        </div>
    </div>
    <div>
        <?php
        ?>
    </div>
</body>

</html>