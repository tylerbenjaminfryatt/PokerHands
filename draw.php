<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/8/2018
 * Time: 7:50 PM
 *
 *
 */






require_once('includes/poker_constants.php');
require_once('includes/poker_code.php');
require_once ('includes/page_constants.php');
require_once('includes/utilities.php');
require_once('includes/login_constants.php');
require_once('includes/hand_type.php');


session_start();



$deck = get_session_value(DECK_KEY);
$hand = get_session_value(HAND_KEY);

draw_cards($hand,$deck);

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Video Poker </title>

    <link rel="stylesheet" type="text/css" href="includes/poker.css.php">
    <script src="includes/poker.js.php"></script>
    <?php show_user(); ?>
    <?php show_type($hand) ?>
    <?php show_content($hand, TRUE); ?>


</head>

<body onload="init(true);">


<div id="spacer">


<form id="shuffle" method="POST" action="logout.php" role="form" >

    <input type="submit" id="shuffle" value="Shuffle">

</form>
</div>
</body>


</html>