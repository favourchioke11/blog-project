<?php

require_once ('../path.php');

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stack = $_POST['stack'];
    $author_role = $_POST['author_role'];
    $author_id = $_POST['update'];

    $sql = "UPDATE author SET author_name = '$name', author_email = '$email', author_stack = '$stack',
     author_role = '$author_role' WHERE author_id = '$author_id'";

    if ($conn->query($sql) === TRUE) {
        setAlert('Profile Updated Successful', 'success');
        redirect(ROOT."profile.php");
    } else {
        echo mysqli_error($conn);
        setAlert('Sorry, Error in updating profile, Please try again', 'danger');
        redirect(ROOT."profile.php");
    }
}



?>