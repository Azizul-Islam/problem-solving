<?php

$myFile = file_get_contents("paragraph.txt");
echo str_word_count($myFile);
