<!--Xin Li-->
<!DOCTYPE html> 
<html>
<head>
<title>Rancid Start</title>
<link href="movie.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="headline">
	<img src="images/rancidbanner.png">
</div>

<?php
$folder = $_GET ['movieDir'];
$movie = $folder . '/';
head();
echo '<div class="container">';
headline();
echo '<div class="right">';
overview();
echo '</div>';
echo '<div class="left">';
review();
echo '</div></div>';

function head() {
    global $movie;
    $title = $movie . 'info.txt';
    $arr = file($title);
    echo '<div class="head">';
    echo "<h3>" . $arr[0] . "(" . $arr[1] . ")</h3>";
    echo '</div>';
}

function headline() {
    global $movie;
    $title = $movie . 'info.txt';
    $arr = file($title);
    echo '<div class="partialhead">';
    if ($arr[2] > 50) {
        echo '<img src="images/freshlarge.png" style="width:100px;height:80px;">';
        echo '<span>' . $arr[2] . '%</span>';
    }
    else {
        echo '<img src="images/rottenlarge.png" style="width:100px;height:80px;">';
        echo '<span>' . $arr[2] . '%</span>';
    }
    echo '</div>';
}

function overview() {
    global $movie;
    echo '<div class="image">';
    echo '<img src="' . $movie . 'overview.png"/>';
    $arr = file($movie . 'overview.txt');
    for ($i = 0; $i < count($arr); $i +=1) {
        $lines = $arr[$i];
        $line = explode(":",$lines);
        echo '<dt><b>'. $line[0]."</b></dt>".'<dd>'. $line[1].'</dd>';
    }
    echo '</div>';
}

function review() {
    global $movie;
    $arr = glob('./' . $movie . '*.txt');
    $half = count($arr) / 2 + 1;
    echo '<div class="grid">';
    for ($i = 2; $i < $half; $i++)  {
        $reviews = file($arr[$i]);
        reviewBlock($reviews);
    }
    echo '</div><div class="grid">';
    for ($i = $half; $i < count($arr); $i++) {
        $reviews = file($arr[$i]);
        reviewBlock($reviews);
    }
    echo '</div>';
}

function reviewBlock($reviews) {
    echo '<p class="review">';
    if ($reviews[1][0] === 'F') {
        echo '<img src="images/fresh.gif"/>';
    }
    else {
        echo '<img src="images/rotten.gif"/>';
    }
    echo $reviews[0];
    echo '<p class="author"><img src="images/critic.gif"/>';
    echo $reviews[2] . '<br>' . $reviews[3] . '</p>';
}

?>

</body>

</html>