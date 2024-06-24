<?php
require_once './JsonFileHandler.php';


    class Income {
        
        public function index()
        {
            $jsonFileHandler = new JsonFileHandler('./income.json');
            $incomes = $jsonFileHandler->readFile();

            $headers = ['S.L', 'Amount'];
            $widths = [5, 10];

            // Print the table header
            echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
            foreach ($headers as $i => $header) {
                echo str_pad($header, $widths[$i], ' ', STR_PAD_BOTH) . " | ";
            }
            echo "\n";
            echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";

            foreach ($incomes as $i=>$row) {
                echo str_pad($i+1, $widths[0], ' ', STR_PAD_BOTH) . " | ";
                echo str_pad($row['amount'], $widths[1], ' ', STR_PAD_BOTH) . " | ". "\n";
                echo str_repeat('-', array_sum($widths) + count($widths) * 3 - 1) . "\n";
            }

        }

        public function store()
        {
            $jsonFileHandler = new JsonFileHandler('./income.json');
            // Prompt the user for income data
            echo "Enter income amount: ";
            $incomeAmount = trim(fgets(STDIN));
            if(is_numeric($incomeAmount)) {
                $incomes = $jsonFileHandler->readFile();
                $incomes[] = ["amount"=>floatval($incomeAmount)];
                $newJsonString = json_encode($incomes,JSON_PRETTY_PRINT);
                
                file_put_contents('./income.json',$newJsonString);

                echo "Income data saved successfully.\n";
            }
            else {
                echo 'Please type numeric number!'.PHP_EOL;
            }
        }
    }


    $income = new Income();
    $income->index();
    $income->store();