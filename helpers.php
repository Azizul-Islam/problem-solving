<?php

function sanitize(string $data): string
{
    return htmlspecialchars(stripslashes(trim($data)));
}


function flash($key, $message = null)
{
    if ($message) {
        $_SESSION['flash'][$key] = $message;
    } else if ($_SESSION['flash'][$key]) {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }
}

function readFileData($filePath)
{
    $jsonData = null;
    if (file_exists($filePath)) {
        $jsonData = file_get_contents($filePath);
        return json_decode($jsonData, true);
    }
    return $jsonData;
}

function writeFileData($data, $filePath)
{
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonData);
}
