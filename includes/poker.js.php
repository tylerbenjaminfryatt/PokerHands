<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/8/2018
 * Time: 12:22 PM
 */
header('Content-Type: text/javascript');
require_once('poker_constants.php');
require_once('poker_code.php')
?>

var CARD_KEY = '<?php echo CARD_KEY; ?>';
var CARD_ID = '<?php echo CARD_ID; ?>';
var DRAW = '<?php echo DRAW; ?>';
var KEEP = '<?php echo KEEP; ?>';
var  CARD_SRC = '<?php echo CARD_SRC; ?>';
var CARD_CLASS = '<?php echo CARD_CLASS; ?>';
var CARD_BACK = '<?php echo CARD_BACK; ?>';
function centerContent() {
    var userPane = document.getElementById('user_pane');
    var content = document.getElementById('content');
    var windowHeight = window.innerHeight;
    var contentHeight = parseInt(window.getComputedStyle(content).height);
    var userPaneHeight = parseInt(window.getComputedStyle(userPane).height);
    var offset = (windowHeight - contentHeight) / 2;
    var spacer = document.getElementById('spacer');
    spacer.style.height = (offset - userPaneHeight) + 'px';
}
function submitForm() {
    var drawForm = document.getElementById('draw_form');

    drawForm.submit();
}

function getDraw(id) {

    return document.getElementById(CARD_KEY + id).value;

}
function setDraw(id, draw) {
    return document.getElementById(CARD_KEY + id).value = draw;
}


function toggleCard(card) {

    var id = card.getAttribute(CARD_ID);

    if(getDraw(id) == DRAW) {
        setDraw(id, KEEP);
        card.src = card.getAttribute(CARD_SRC);
    }

    else {
        setDraw(id, DRAW);
        card.src = CARD_BACK;
    }

}




function makeCardsClickable() {

    var cards = [].slice.call(document.getElementsByClassName(CARD_CLASS));
    cards.forEach(function (card) { toggleCard(card)  })
    cards.forEach(function (card) {

        card.addEventListener('click', function () {
            toggleCard(card);
        });

    });
    for(var i = 0; i < <?php echo HAND_CARDS; ?>; i++) {
        setDraw(i, KEEP);
    }


}
function showContent() {
    var content = document.getElementById('content');
    content.style.visibility = 'visible';


}
    function init(final) {
        window.addEventListener('resize', function () {
            centerContent();
            });
        centerContent();
        showContent();
        if(!final) {
            var drawButton = document.getElementById('draw_button');
            drawButton.addEventListener('click', function () {
                submitForm();

            });

            makeCardsClickable();


        }

    }


function callMeMaybe()
{
    var v1 = 1;
    var v2 = 2;

    return v1, v2;
}

function theCaller()
{
    var v1 = 0;
    var v2 = 0;

    v1, v2 = callMeMaybe();

    console.log("the value of v1 is", v1);
    console.log("the value of v2 is", v2);

}










