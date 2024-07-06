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
