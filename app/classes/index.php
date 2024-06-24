#!/usr/bin/env php
<?php
require_once "./Income.php";
require_once "./Expense.php";
require_once "./Savings.php";
require_once "./Category.php";

$options = ["1" => "Add income", "2" => "Add expense", "3" => "View incomes", "4" => "View expenses", "5" => "View savings", "6" => "View categories"];

foreach ($options as $i => $row) {
    echo $i . ". " . $row . PHP_EOL;
}
$input = readline('Enter your option: ');
if (array_key_exists($input, $options)) {
    if ($options[$input] == "Add income") {
        $income = new Income();
        $income->store();
    }
    if ($options[$input] == "View incomes") {
        $income = new Income();
        $income->index();
    }
    if ($options[$input] == "Add expense") {
        $expense = new Expense();
        $expense->store();
    }
    if ($options[$input] == "View expenses") {
        $expense = new Expense();
        $expense->index();
    }
    if ($options[$input] == "View savings") {
        $saving = new Savings();
        $saving->totalSavings();
    }
    if ($options[$input] == "View categories") {
        $saving = new Category();
        $saving->index();
    }
} else {
    echo "Please enter a valid option!" . PHP_EOL;
}
