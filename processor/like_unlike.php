<?php
require_once ('../path.php');

if (isset($_POST['like_post'])) {
    $post_id = $_POST['post_id'];
    $author_id = $_POST['author_id'];
    $slug = $_POST['slug'];

    //CHECKING IF THE POST IS ALREADY LIKED

    $sql = "SELECT * FROM post_likes WHERE post_id = '$post_id' AND author_id = '$author_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $sql = "DELETE FROM post_likes WHERE post_id = '$post_id' AND author_id = '$author_id' ";
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE post SET likes = likes - 1 WHERE post_id = '$post_id'";
            $result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                redirect(ROOT.'postdetail.php?post='.$slug);
            }

        }
    } else {
        $sql = "INSERT INTO post_likes (post_id,author_id) VALUES ('$post_id','$author_id') ";
        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE post SET likes = likes + 1 WHERE post_id = '$post_id'";
            $result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                redirect(ROOT.'postdetail.php?post='.$slug);
            }

        }
    }


}

?>