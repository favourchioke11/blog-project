<?php
require_once ('../path.php');

if (isset($_POST['submit_post'])) {
    $title = $_POST['post_title'];
    $body = $_POST['post_body'];
    $author_stack = $_POST['category'];
    $author_id = $_POST['author_id'];
    $image = $_FILES['file'];

    if (empty($title)) {
        setAlert('please enter your title', 'danger');
        redirect(ROOT . "addpost.php");
    }

    if (empty($body)) {
        setAlert('Include text', 'danger');
        redirect(ROOT . "addpost.php");
    }

    //generating post_slug

    $post_slug = str_replace(" ", "_", $title);

    //converting the slug into small letter

    $post_slug = strtolower($post_slug);

    $date = ('D d: M : Y');

    //checking if the post exist
    $sql = "SELECT * FROM post WHERE slug = '$post_slug' AND category='$author_stack'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setAlert('Sorry, this post already exist', 'danger');
        redirect(ROOT . "addpost.php");
    }

    // uploading file image

    $file_name = $image['name'];
    $file_type = $image['type'];
    $file_tmp = $image['tmp_name'];
    $file_size = $image['size'];

    if ($file_size > 5000000) {
        setAlert('Your image file is too large, maximum image size is 5mb', 'danger');
        redirect(ROOT . 'addpost.php');
    }

    $ext = strtolower(end(explode('.', $file_name)));
    

    $imgtype = ['jpeg', 'jpg', 'png', 'gif', 'svg','webp'];

    if (!in_array($ext, $imgtype)) {
        setAlert('Sorry your file is not an image', 'danger');
        redirect(ROOT . 'addpost.php');
    }

    $new_filename = date('dmY') . date('his') . rand(1111, 9999);

    $new_name = $new_filename . '.' . $ext;

    $date = date('D d: M: Y');

    if (move_uploaded_file($file_tmp, DR . DS . 'uploads' . DS . $new_name) === true) {

        $sql = "INSERT INTO post (author_id,title,slug,category,body,file_path,date) 
    VALUES ('$author_id','$title','$post_slug','$author_stack', '$body','$new_name', '$date')";

        if ($conn->query($sql) === TRUE) {
            setAlert('Posted Successful', 'success');
            redirect(ROOT . "addpost.php");
        } else {
            setAlert('Sorry, Error during posting, Please try again', 'danger');
            redirect(ROOT . "addpost.php");
        }
    } else {
        setAlert('Error uploading image', 'danger');
      redirect(ROOT.'addpost.php');
    }
}

//UPDATING A POST

if (isset($_POST['edit_post'])) {
    $title = $_POST['post_title'];
    $body = $_POST['post_body'];
    $author_stack = $_POST['category'];
    $author_id = $_POST['author_id'];
    $post_id = $_POST['$post_id'];
    // $image = $_FILES['file'];

    
    if (empty($title)) {
        setAlert('please enter your title', 'danger');
        redirect(ROOT . "addpost.php?action=edit&post=".$post_slug);
    }

    if (empty($body)) {
        setAlert('Include text', 'danger');
        redirect(ROOT . "addpost.php?action=edit&post=".$post_slug);
    }

    //generating post_slug

    $post_slug = str_replace(" ", "_", $title);

    //converting the slug into small letter

    $post_slug = strtolower($post_slug);


    $date = ('D d: M : Y');

    //checking if the post exist
    $sql = "UPDATE post SET title = '$title', body = '$body', slug = '$post_slug' WHERE post_id = '$post_id'";
    $result = $conn->query($sql);

    if ($result) {
        setAlert('Post updated successfully', 'success');
        redirect(ROOT . "addpost.php?action=edit&post=".$post_slug);
    }else{
        setAlert('Error has occured', 'danger');
        redirect(ROOT . "addpost.php?action=edit&post=".$post_slug);
    }

    // uploading file image

    // $file_name = $image['name'];
    // $file_type = $image['type'];
    // $file_tmp = $image['tmp_name'];
    // $file_size = $image['size'];

    // if ($file_size > 5000000) {
    //     setAlert('Your image file is too large, maximum image size is 5mb', 'danger');
    //     redirect(ROOT . 'addpost.php');
    // }

    // $ext = strtolower(end(explode('.', $file_name)));
    

    // $imgtype = ['jpeg', 'jpg', 'png', 'gif', 'svg','webp'];

    // if (!in_array($ext, $imgtype)) {
    //     setAlert('Sorry your file is not an image', 'danger');
    //     redirect(ROOT . 'addpost.php');
    // }

    // $new_filename = date('dmY') . date('his') . rand(1111, 9999);

    // $new_name = $new_filename . '.' . $ext;

    // $date = date('Dd: M: Y');

    // if (move_uploaded_file($file_tmp, DR . DS . 'uploads' . DS . $new_name) === true) {

    //     $sql = "INSERT INTO post (author_id,title,slug,category,body,file_path,date) 
    // VALUES ('$author_id','$title','$post_slug','$author_stack', '$body','$new_name', '$date')";

    //     if ($conn->query($sql) === TRUE) {
    //         setAlert('Posted Successful', 'success');
    //         redirect(ROOT . "addpost.php");
    //     } else {
    //         setAlert('Sorry, Error during posting, Please try again', 'danger');
    //         redirect(ROOT . "addpost.php");
    //     }
    // } else {
    //     setAlert('Error uploading image', 'danger');
    //   redirect(ROOT.'addpost.php');
    // }
}
?>