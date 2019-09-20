<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/8/2018
 * Time: 12:21 PM
 */
header('Content-Type: text/css');
require_once('poker_constants.php');
?>

.card_img {
    max_width: <?php echo CARD_IMAGE_PERCENT; ?>;
    max_height: <?php echo CARD_IMAGE_PERCENT; ?>;
    cursor:pointer;


}



img {
    width:97%;
    height:auto;
}



#new {
    margin-top:100px;
}
.card {
    text-align:center;
    display: inline-block;
    max-width: <?php echo 100 / HAND_CARDS; ?>%;
    min-height: 200px;
    padding:0;
    margin-left:0;
    margin-right:0;
    padding-bottom: 20px;
    margin-top: 20px;


}



#hand {
    font-size:0;
    padding: <?php echo HAND_PADDING; ?>;

    margin-left:175px;
    margin-right:175px;
    min-height: 300px;
}

#info {
    text-align:center;

}
#draw_button {
    background-color: red;
    color:white;
    max-width: fit-content;
   <?php echo POKER_FONT; ?>
    border-radius:10px;
    padding:10px 15px 10px 15px;
    margin-top: 0;
    cursor:pointer;



}

#shuffle {


    background-color: red;
    border: none;
    color: white;
    max-width: fit-content;
    text-decoration: none;
<?php echo POKER_FONT; ?>
    font-size: 45px;

    text-align: center;
    display: block;
    ;

    max-height: fit-content;
    margin: auto;
    border-radius:10px;
    cursor:pointer;


}
#hand_type {
<?php echo POKER_FONT; ?>

}
#payoff {
<?php echo POKER_FONT; ?>
}
#content {
    visibility: hidden;
}

#user_pane {
    text-align: right;
    font-family: sans-serif;
    font-weight: bold;
}
#logout {
    color:green;
    text-decoration: none;
    font-size:.75em;
}
