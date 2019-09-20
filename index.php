<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/8/2018
 * Time: 12:25 PM
 */




require_once('includes/poker_constants.php');
require_once('includes/poker_code.php');
require_once ('includes/page_constants.php');
require_once('includes/utilities.php');
require_once('includes/login_constants.php');


session_start();


header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0,precheck=0");
header("Expires: Sat, 26 July 1997 05:00:00 GMT");
header("Pragma:no-cache");






$deck = make_deck();
$hand = deal($deck);


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Video Poker </title>

    <link rel="stylesheet" type="text/css" href="includes/poker.css.php">

    <script src="includes/poker.js.php">
        </script>





</head>

<body onload ="init();" id="new">

<?php show_user(); ?>
<div id="spacer">
<?php  show_content($hand); ?>



<?php output_form($hand, $deck); ?>

</div>
</body>


</html>