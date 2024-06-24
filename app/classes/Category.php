#!/etc/env php
<?php
require_once './JsonFileHandler.php';

class Category
{

    public function index()
    {
        $jsonFileHandler = new JsonFileHandler('./../../categories.json');
        $categories = $jsonFileHandler->readFile();

        $headers = ['S.L', 'Type', "Name"];
        $widths = [5, 10, 20];

        // Print the table header
        echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
        foreach ($headers as $i => $header) {
            echo str_pad($header, $widths[$i], ' ', STR_PAD_BOTH) . " | ";
        }
        echo "\n";
        echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";

        foreach ($categories as $i => $row) {
            echo str_pad($i + 1, $widths[0], ' ', STR_PAD_BOTH) . " | ";
            echo str_pad($row['type'], $widths[1], ' ', STR_PAD_BOTH) . " | ";
            echo str_pad($row['name'], $widths[2], ' ', STR_PAD_BOTH) . " | " . "\n";
            echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
        }
    }
}

// $category = new Category();
// $category->index();
