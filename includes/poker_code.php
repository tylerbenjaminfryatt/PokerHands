<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/8/2018
 * Time: 12:24 PM
 */

function make_deck()
{
    $deck = [];
    for ($rank = 0; $rank < RANK_COUNT; $rank++) {
        for ($suit = 0; $suit < SUIT_COUNT; $suit++) {
            $deck[] = [$rank, $suit];

        }
    }
    shuffle($deck);
    return $deck;


}


/**
 * @param $deck
 * @return array|string
 */
function deal(&$deck)
{
    if (1 == 1) {

        $hand = array_slice($deck, 0, HAND_CARDS);
        $deck = array_slice($deck, HAND_CARDS);
        set_session_value(HAND_KEY, $hand);
        set_session_value(DECK_KEY, $deck);
        set_session_value(FINAL_KEY, FALSE);

        return $hand;

    }
     $hand = get_session_value(HAND_KEY);
        $deck = get_session_value(DECK_KEY);
        return $hand;
}
function card_name($card)
{
    $ranks = RANK_NAMES;
    $suits = SUIT_NAMES;

    return IMAGES . $ranks[$card[RANK_FIELD]] . '_of_' . $suits[$card[SUIT_FIELD]] . '.png';
}
function colored_number($number)
{
    return '<span style="color: ' . ($number <0 ? "red" : "green") . ';">' . $number . '</span>';
}

function show_user()
{
    $balance = get_session_value(BALANCE_KEY);
    $hands = get_session_value(HANDS_PLAYED_KEY);
    if ($hands !== "" && $hands !== 0){
        $ev = number_format($balance / $hands, 4);

    } else {
        $ev = 'unknown';
    }

    echo '<div id="user_pane">'. "\n";
    echo '   ' .  get_session_value(SESSION_USERNAME_KEY) . ' [<a id="logout" href="' . LOGOUT_PAGE . '"></a>]' . "<br>\n";
    echo  '</div>' . "\n";

}

function show_card($card, $id)
{
    echo '    <div class ="card">' . "\n";
    echo '      <img class="card_img"';
    echo ' ' . CARD_ID . '="'. $id . '"';
    echo ' src="' . card_name($card) . '"';
    echo ' ' . CARD_SRC . '="' . card_name($card) . '"';
    echo '>' . "\n";
    echo '    </div>' . "\n";

}

function show_hand($hand)
{
    echo '        <div id="hand">' . "\n";
    for ($card = 0; $card < HAND_CARDS; $card++) {
        show_card($hand[$card], $card);
    }
    echo '</div>' . "\n";
}
function show_draw_button()
{
    echo '     <div id="info">' . "\n";
    echo '       <span id="draw_button">Draw</span>' . "\n";
    echo '  </div>' . "\n";
    }

    function show_type($hand)
    {
        $type = hand_type($hand);
        $payoffs = PAYOFFS;
        $payoff = $payoffs[$type];
        echo '     <div id="info">' . "\n";
        echo '       <span id="hand_type">' . $type . ' &mdash; </span>' . "\n";
        echo '       <span id="payoff"';
        echo '       style ="color: ' . ($payoff > 0 ? "green" : "red") . '">';
        echo 'Payoff: ' . $payoff . '</span>' . "\n";

        echo '  </div>' . "\n";
    }


function show_content($hand, $final=FALSE)
{
    echo '<div id="content">' . "\n";
    show_hand($hand);
    if ($final) {
        echo ' <script>console.log("greetings");</script>';
    }else {



        show_draw_button();
    }

    echo '</div>' . "\n";

}
function output_form($hand, $deck) {

    echo '<form method="POST" action="draw.php" id="draw_form">' . "\n";

    for ($card = 0; $card < HAND_CARDS; $card++) {
        echo '       <input type="hidden" name="' . CARD_KEY .  $card . '" id="' . CARD_KEY .  $card . '" value="' . KEEP . '">' . "\n";
    }
    echo '</form>' . "\n";

}
function draw_cards(&$hand, &$deck)
{
    if(get_session_value(FINAL_KEY)) {
        return;
    }

    for($card = 0; $card < HAND_CARDS; $card++) {
        $draw = $_POST[CARD_KEY . $card];
        if ($draw === DRAW) {
            $hand[$card] = $deck[0];
            $deck = array_slice($deck, 1);
        }

    }
    $type = hand_type($hand);
    $payoffs = PAYOFFS;
    set_session_value(HAND_KEY, $hand);
    set_session_value(DECK_KEY, $deck);
    set_session_value(FINAL_KEY, TRUE);

}
