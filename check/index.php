<?php

if (isset($_GET['path'])) {
    $path = explode("/", $_GET['path']);
}



if (isset($path[0])) {
    $credit_text = $path[0];
} else {
    echo "Not found dir";
    exit;
}
if (isset($path[2])) {
    $value_text = $path[2];
} else {
    $value_text = '';
}

if (isset($path[1])) {
    $credit_account_id = $path[1];
} else {
    echo "Not found dir";
    exit;
}
if (isset($path[3])) {
    $value = $path[3];
} else {
    $value = '';
}

$method = $_SERVER['REQUEST_METHOD'];
include __DIR__ . '/menu.php';
