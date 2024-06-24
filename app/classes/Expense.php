<?php
require_once './JsonFileHandler.php';


class Expense
{

    public function index()
    {
        $jsonFileHandler = new JsonFileHandler('./../../expenses.json');
        $expenses = $jsonFileHandler->readFile();

        $headers = ['S.L', 'Amount'];
        $widths = [5, 10];

        // Print the table header
        echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
        foreach ($headers as $i => $header) {
            echo str_pad($header, $widths[$i], ' ', STR_PAD_BOTH) . " | ";
        }
        echo "\n";
        echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";

        foreach ($expenses as $i => $row) {
            echo str_pad($i + 1, $widths[0], ' ', STR_PAD_BOTH) . " | ";
            echo str_pad($row['amount'], $widths[1], ' ', STR_PAD_BOTH) . " | " . "\n";
            echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
        }
    }

    public function store()
    {
        $jsonFileHandler = new JsonFileHandler('./../../expenses.json');
        // Prompt the user for income data
        $expenseAmount = readline("Enter expense amount: ");
        if (is_numeric($expenseAmount)) {
            $expenses = $jsonFileHandler->readFile();
            $expenses[] = ["amount" => floatval($expenseAmount)];
            $newJsonString = json_encode($expenses, JSON_PRETTY_PRINT);

            file_put_contents('./../../expenses.json', $newJsonString);

            echo "Expense data saved successfully.\n";
        } else {
            echo 'Please type numeric number!' . PHP_EOL;
        }
    }
}


    // $expense = new Expense();
    // $expense->index();
    // $expense->store();