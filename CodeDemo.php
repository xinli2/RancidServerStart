<!DOCTYPE html>
<html>
<head>
<title>Rancid Start</title>
<link href="movie.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php 
$movieDir = $_GET['movieDir'];
// $movieDir = 'tmnt';
echo review1($movieDir);

$image = $movieDir . '/overview.png';
echo "<img src=" . "'" . $image . "'" . ' alt=overview >';

function review1 ($movieDir){
    $result = "<ol>";
    $arr = file($movieDir . '/review1.txt');
    for ($index = 0; $index < count($arr); $index +=1) {
        $result = $result . '<li>' . $arr[$index] . '</li>';
    }
    $result .= "</ol>";
    
    return $result;
}

?>
	
</body>
</html>