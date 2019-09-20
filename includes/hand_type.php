<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11/12/2018
 * Time: 9:18 AM
 *
 * @param $suits
 * @return bool
 */



function is_flush($suits)
{
    return in_array(5, $suits);

}
function is_royal($ranks)
{
    return $ranks[0] && $ranks[9] && $ranks[10] && $ranks[11] && $ranks[12];
}

function is_quads($ranks)
{
    return in_array(4,$ranks);
}
function is_trips($ranks)
{
    return in_array(3, $ranks);
}
function is_pair($ranks)
{
    return in_array(2, $ranks);
}
function is_pair_jacks($ranks)
{
    return $ranks[10] == 2 || $ranks[11] ==2 || $ranks[12] == 2 || $ranks[0] == 2;
}
function is_two_pair($ranks)
{
   return count(array_keys($ranks, 2)) == 2;
}
function is_boat($ranks)
{
    return is_trips($ranks) && is_pair($ranks);
}

function is_straight($ranks)
{
    if (is_royal($ranks))
    {
        return TRUE;
    }
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < HAND_CARDS; $j++) {
            if ($ranks[$i + $j] == 0) {
                continue 2;
            }
        }
        return TRUE;
    }
    return False;
}

function hand_type($hand)
{

    $ranks = [];
    $suits = [];


    for ($rank = 0; $rank < RANK_COUNT; $rank++) {
        $ranks[$rank] = 0;
    }
    for ($suit = 0; $suit < SUIT_COUNT; $suit++) {

        $suits[$suit] = 0;
    }
    foreach ($hand as $card) {
        $ranks[$card[RANK_FIELD]]++;
        $suits[$card[SUIT_FIELD]]++;
    }
    $flush = is_flush($suits);
    $royal = is_royal($ranks);
    $straight = is_straight($ranks);
    if ($flush && $royal) {
        return ROYAL_FLUSH;
    } else if ($flush && $straight) {
        return STRAIGHT_FLUSH;
    } elseif (is_quads($ranks)) {
        return QUADS;
    } elseif (is_boat($ranks)) {
        return BOAT;
    } elseif ($flush) {
        return FLUSH;
    } elseif ($straight) {
        return STRAIGHT;
    } elseif (is_trips($ranks)) {
        return TRIPS;
    } elseif (is_two_pair($ranks)) {
        return TWO_PAIR;
    } elseif (is_pair_jacks($ranks)) {
        return PAIR_JACKS;
    } elseif (is_pair($ranks)) {
        return LOW_PAIR;
    } else {
        return NOTHING;
    }


    echo '<pre>';
    print_r($ranks);
    print_r($suits);
    echo '</pre>';

}


