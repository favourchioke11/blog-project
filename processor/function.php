<?php

session_start();

require_once ("dbconnect.php");

function dnd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}

function setAlert($message, $alert_type)
{
    $_SESSION['error'] = "<div class='alert alert-$alert_type float-alert' role='alert'>
    <strong>$message</strong>
</div>";
}

function showAlert()
{
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

function redirect($location)
{
    header("location: $location");
    die;
}


?>