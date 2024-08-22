<?php

require_once ('function.php');

if (isset($_GET['target'])) {
    $target = $_GET['target'];
    $url = $_GET['url'];

    unset($_SESSION[$target]);
    setAlert("Logout Successful", "warning");

    redirect($url);

} else {
    redirect(ROOT . 'index.php');
}

?>