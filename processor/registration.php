<?php
require_once ('../path.php');

if (isset($_POST['register'])) {
    $author_name = $_POST['full_name'];
    $author_email = $_POST['email'];
    $author_stack = $_POST['stack'];
    $author_password = $_POST['password'];
    


    if (empty($author_name)) {
        setAlert('please enter your name', 'danger');
        redirect(ROOT."register.php");
    }

    if (empty($author_email)) {
        setAlert('please enter your email', 'danger');
        redirect(ROOT."register.php");
    }

    if (empty($author_stack)) {
        setAlert('please select your stack', 'danger');
        redirect(ROOT."register.php");
    }

    if (empty($author_password)) {
        setAlert('please enter your password', 'danger');
        redirect(ROOT."register.php");
    }
    
    if (!filter_var($author_email, FILTER_VALIDATE_EMAIL)) {
        setAlert('sorry your email is not valid', 'danger');
        redirect(ROOT."register.php");
    }

    if (strlen($author_password) < 8) {
        setAlert('Sorry, Password must be up to 8 characters', 'danger');
        redirect(ROOT."register.php");
    }
    
    $date = ('D d: M : Y');

    $secure_password = password_hash($author_password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM author WHERE author_email = '$author_email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
    setAlert('Sorry, email already exist', 'danger');
    redirect(ROOT."register.php");
    }

    $sql = "INSERT INTO author (author_name,author_email,author_stack,author_password,date) 
    VALUES ('$author_name','$author_email','$author_stack','$secure_password','$date')";

    if($conn->query($sql) === TRUE){
        setAlert('Registration Successful', 'success');
        redirect(ROOT."login.php");
        }else{
        setAlert('Sorry, Error in registration, Please try again', 'danger');
        redirect(ROOT."register.php");
        }
}

?>