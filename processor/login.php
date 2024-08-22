<?php
require_once ('../path.php');

if (isset($_POST['login'])) {
    $author_email = $_POST['email'];
    $author_password = $_POST['password'];

    //checking if the email is empty
    if (empty($author_email)) {
        setAlert('please enter your email', 'danger');
        redirect(ROOT . "login.php");
    }

    //checking if the password is empty
    if (empty($author_password)) {
        setAlert('please enter your password', 'danger');
        redirect(ROOT . "login.php");
    }

    date('D d: M : Y');

    //checking if the email exist
    $sql = "SELECT * FROM author WHERE author_email = '$author_email'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $author_data = $result->fetch_assoc();
        
        // checking if the password match
        if (password_verify($author_password, $author_data['author_password'])) {
            $_SESSION['active_author'] = $author_data['author_id'];
            setAlert('Login successful', 'success');
            redirect(ROOT . "index.php");  
        }else{
            setAlert('Invalid login details', 'danger');
            redirect(ROOT . "login.php");  
        }

    } else {
        setAlert('Invalid login details 2', 'danger');
        redirect(ROOT . "index.php");
    }


}


?>