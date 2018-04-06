<!DOCTYPE html>
<html>
<body>
<?php
    $file="cvs2.txt";

    $fopen = fopen($file, 'r+');

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "\n";

    $split = explode($remove, $fread);

    $array[] = null;
    $tab = "\t";

    foreach ($split as $string)
    {
        $row = explode($tab, $string);
        array_push($array,$row);
    }
    echo "<pre>";
    $a1 = print_r($array);
    echo "</pre>";
?>
<?php
    $file="x.txt";

    $fopen = fopen($file, 'r+');

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "\n";

    $split = explode($remove, $fread);

    $array[] = null;
    $tab = "\t";

    foreach ($split as $string)
    {
        $row = explode($tab, $string);
        array_push($array,$row);
    }
    echo "<pre>";
    $a2 = print_r($array);
    echo "</pre>";
?>
<?php
/*$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");
*/
$result=array_diff($a1,$a2);
print_r($result);
?>

</body>
</html>