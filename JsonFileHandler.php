<?php

    class JsonFileHandler {
        private $filePath;

        public function __construct($filePath) {
            $this->filePath = $filePath;
        }
    
        public function readFile() {
            if (file_exists($this->filePath)) {
                $jsonData = file_get_contents($this->filePath);
                return json_decode($jsonData, true);
            }
            return [];
        }

        public function writeFile($data)
        {
            $jsonData = json_encode($data,JSON_PRETTY_PRINT);
            file_put_contents($this->filePath,$jsonData);

        }
    }