<?php
require_once './JsonFileHandler.php';
class Savings
{
    public function totalSavings()
    {
        $incomeFile = new JsonFileHandler('./../../income.json');
        $expenseFile = new JsonFileHandler('./../../expenses.json');

        $incomes = $incomeFile->readFile();
        $expenses = $expenseFile->readFile();

        $totalIncome = 0;
        foreach ($incomes as $row) {
            $totalIncome += $row['amount'];
        }
        $totalExpense = 0;
        foreach ($expenses as $row) {
            $totalExpense += $row['amount'];
        }

        $totalSavings = ($totalIncome - $totalExpense);

        echo "Total Income: $totalIncome" . PHP_EOL;
        echo "Total Expense: $totalExpense" . PHP_EOL;
        echo "Total savings: $totalSavings" . PHP_EOL;
    }
}

    // $savings = new Savings();
    // $savings->totalSavings();