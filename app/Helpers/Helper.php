<?php

function discountCalculate($original_price, $discount){
    $discounted_price = $original_price - ($original_price * $discount / 100);
    return (int)$discounted_price;
}

function ratingCalculate($rating)
{
    if ($rating == 5) {
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
    } elseif ($rating >= 4) {
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="far fa-star"></i>';
    } elseif ($rating >= 3) {
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
    } elseif ($rating >= 2) {
        echo '<i class="fas fa-star"></i>';
        echo '<i class="fas fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
    } elseif ($rating >= 1) {
        echo '<i class="fas fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
    } else {
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';
        echo '<i class="far fa-star"></i>';

    }
}

function countCartItems(){
    $cartItems = \Cart::getTotalQuantity();
    return $cartItems;
}

function cartItems(){
    $items = [];
    \Cart::getContent()->each(function($item) use (&$items)
    {
        $items[] = $item;
    });

    return $items;
}
