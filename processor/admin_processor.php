<?php
require_once ('../path.php');

//TO SUSPEND A POST

if (isset($_POST['suspend_post'])) {
    $post_id = $_POST['post_id'];
    $slug = $_POST['slug'];

    $sql = "UPDATE post SET status = 'suspended' WHERE post_id = '$post_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert('Post has been suspended', 'success');
        redirect(ROOT . 'postdetail.php?post=' . $slug);
    }
}


// TO PUBLISH A POST

if (isset($_POST['publish_post'])) {
    $post_id = $_POST['post_id'];
    $slug = $_POST['slug'];

    $sql = "UPDATE post SET status = 'published' WHERE post_id = '$post_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert('Post has been publishded', 'success');
        redirect(ROOT . 'postdetail.php?post=' . $slug);
    }
}


// TO ADD CATEGORY

if (isset($_POST['add_category'])) {
    $category = $_POST['category'];


    $sql = "INSERT INTO  categories (category) VALUES ('$category')";
    $result = $conn->query($sql);
    if ($result) {
        setAlert('Category added', 'success');
        redirect(ROOT . 'mypost.php');
    }
}

//MAKE A USER AN ADMIN

if (isset($_POST['make_admin'])) {
    $author_id = $_POST['author_id'];
    $author_name = $_POST['name'];

    $sql = "UPDATE author SET author_role = 'admin' WHERE author_id = '$author_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert($author_name.' is already an Admin', 'success');
        redirect(ROOT . 'author.php?post=' . $author_name);
    }
}

//MAKE AN ADMIN A USER

if (isset($_POST['make_user'])) {
    $author_id = $_POST['author_id'];
    $author_name = $_POST['name'];

    $sql = "UPDATE author SET author_role = 'user' WHERE author_id = '$author_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert($author_name.' is no longer an Admin', 'warning');
        redirect(ROOT . 'author.php?post=' . $author_name);
    }
}

// DELETING AN AUTHOR
if (isset($_POST['delete'])) {
    $author_id = $_POST['delete_id'];
  

    $sql = "DELETE FROM author WHERE author_id = '$author_id'";
    $result = $conn->query($sql);
    if ($result) {
        setAlert('Deleted', 'danger');
        redirect(ROOT . 'author.php?post=' . $author_email);
    }
}



?>
