<?php

$sentence = "I love programming";
$convertArray = explode(" ", $sentence);

$reverseSentence = '';
foreach ($convertArray as $data) {
    $reverseSentence .= ' ' . strrev($data);
}

echo $reverseSentence;
