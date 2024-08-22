<?php
require_once ('../path.php');

if (isset($_POST["action"]) && $_POST["action"] == "add_comment") {

    $author_name = $_POST["author_name"];
    $comment = $_POST["comment"];
    $post_id = $_POST["post_id"];


    $date = date('Dd/ M/ Y');

    $sql = "INSERT INTO comments (comment_name,comment,post_id,date) 
    VALUES ('$author_name','$comment','$post_id','$date')";

    if ($conn->query($sql) === TRUE) {
        // setAlert('Comment added', 'success');
        // redirect(ROOT."postdetail.php");

        echo 200;

    }

}

?>