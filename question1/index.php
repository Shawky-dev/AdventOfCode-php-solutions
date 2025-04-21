<?php
function printArray($array)
{
    $arrlenght = count($array);
    for ($i = 0; $i < $arrlenght; $i++) {
        echo $array[$i];
        echo "<br>";
    }
}
function getDistance($arr1, $arr2)
{
    $arr1length = count($arr1);
    $arr2length = count($arr2);
    if ($arr1length > $arr2length) {
        echo "the arrays are in different lengths";
    }
    $total_distance = 0;
    for ($i = 0; $i < $arr1length; $i++) {
        $total_distance += abs($arr1[$i] - $arr2[$i]);
    }
    echo $total_distance;
}
function getArraysFromList($filename)
{
    $list1 = [];
    $list2 = [];
    if (file_exists($filename) && is_readable($filename)) {

        $file = fopen($filename, "r");

        while (($line = fgets($file)) !== false) {
            $parts = preg_split('/\s+/', $line);
            $list1[] = (int)$parts[0];
            $list2[] = (int)$parts[1];
        }

        fclose($file);
        sort($list1);
        sort($list2);
        echo getDistance($list1, $list2);
    } else {
        echo "Error: File not found or not readable.";
    }
}



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
            // printArray($list1);
            getArraysFromList("input.txt")

            ?>
        </div>
        <div>
            <?php
            //  printArray($list2);
            ?>
        </div>
    </div>
    <div>
        <?php
        //getDistance($list1, $list2)
        ?>
    </div>
</body>

</html>