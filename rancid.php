<!-- Xin Li -->
<!DOCTYPE html>
<html>
<head>
<title>Rancid Start</title>
<link href="movie.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php 
$movieDir = $_GET['movieDir'];
//$movieDir = 'tmnt';


$image = $movieDir . '/overview.png';
echo '<h3>'.head($movieDir).'</h3>';
echo "<img src=" . "'" . $image . "'" . ' alt=overview >'.'<br>';
echo overview($movieDir);

function head ($movieDir){
    $arr = file($movieDir . '/info.txt');
    $result = $arr[0] . " was released in " . $arr[1] . 
    ". It has a rating of " . $arr[2] . ".";
    
    return $result;
}

function overview ($movieDir){
    $result = "<dl>";
    $arr = file($movieDir . '/overview.txt');
    for ($index = 0; $index < count($arr); $index +=1) {
        $lines = $arr[$index];
        $line = explode(":",$lines);
        $result=$result. '<dt>'. $line[0]."</dt>".'<dd>'. $line[1].'</dd>';
    }
    
    return $result;
}
?>
	
</body>
</html>
