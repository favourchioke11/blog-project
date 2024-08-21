<?php
require_once ("includes/head.php");

//checking if the user is logged in 

if (!isset($_SESSION["active_author"])) {
    redirect(ROOT . "login.php");
}

if (isset($_GET["post"])) {
    $post_slug = $_GET["post"];
    $action = $_GET["action"];

    //fetching indidviduals post
    $sql = "SELECT * FROM post WHERE slug = '$post_slug'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $post_data = $result->fetch_assoc();
        extract($post_data);
    } 

    //getting the post author

    $sql = "SELECT * FROM author WHERE author_id = '$author_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $author_data = $result->fetch_assoc();
        $post_author = $author_data["author_name"];
    }

}

?>

<body class="stretched search-overlay">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=915724525182895&autoLogAppEvents=1"></script>

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper">

        <!-- Header
        ============================================= -->

        <?php
        require_once ("includes/nav.php");


        ?>

        <!-- #header end -->

        
        
        



        <!----- WHEN ADDING A NEW POST  --->

        <?php 

            if (!isset($_GET["post"])) {

        ?>

        <!-- Content
        ============================================= -->
        <section id="content">
            <div class="content-wrap pt-5" style="overflow: visible;">
                <div class="container d-flex justify-content-center">
                    <div id="respond" style="width:50%">

                        <h3>Add a <span>Post</span></h3>

                        <?=showAlert()?>

                        <form class="row mb-0 px5" action="processor/addpost.php" method="POST" id="commentform" enctype="multipart/form-data">



                            <div class="form-group col-12">
                                <label for="email">Post Title</label>
                                <input type="text" name="post_title" id="email" value="" size="22" tabindex="2"
                                    class="form-control" placeholder="My Post Title">
                            </div>

                            <div class="form-group col-12">
                                <label for="url">Upload Image</label>
                                <input type="file" name="file" id="url" value="" size="22" tabindex="3"
                                    class="form-control">
                            </div>

                            <div class="w-100"></div>

                            <input type="hidden" name="author_id" value="<?=$author_id?>">

                            <input type="hidden" name="category" value="<?=$author_stack?>">

                            <div class="form-group col-12">
                                <label for="comment">Post Body</label>
                                <textarea name="post_body" id="comment" cols="58" rows="7" tabindex="4"
                                    class="form-control" placeholder="Post Body"></textarea>
                            </div>

                            <div class="form-group col-12 mt-4 mb-0">
                                <button name="submit_post" type="submit" id="submit-button" tabindex="5" value="Submit"
                                    class="button button-large button-black button-dark text-transform-none fw-medium ls-0 button-rounded m-0">Submit
                                    Post</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </section>


        <?php 

            }
        ?>


        <!----- WHERE ONE CAN EDIT A POST  --->

        <?php 

            if (isset($action)) {

        ?>

        <!-- Content
        ============================================= -->
        <section id="content">
            <div class="content-wrap pt-5" style="overflow: visible;">
                <div class="container d-flex justify-content-center">
                    <div id="respond" style="width:50%">

                        <h3>Edit <span><?=$title?></span></h3>

                        <?=showAlert()?>

                        <form class="row mb-0 px5" action="processor/addpost.php" method="POST" id="commentform" enctype="multipart/form-data">



                            <div class="form-group col-12">
                                <label for="email">Post Title</label>
                                <input type="text" name="post_title" value="<?=$title?>" size="22" tabindex="2"
                                    class="form-control" placeholder="My Post Title">
                            </div>

                            <div class="form-group col-12">
                                <label for="url">Upload Image</label>
                                <input type="file" name="file" id="url" value="" size="22" tabindex="3"
                                    class="form-control">
                            </div>

                            <div class="w-100"></div>

                            <input type="hidden" name="author_id" value="<?=$author_id?>">

                            <input type="hidden" name="category" value="<?=$author_stack?>">

                            <input type="hidden" name="post_id" value="<?=$post_id?>">

                            <div class="form-group col-12">
                                <label for="comment">Post Body</label>
                                <textarea name="post_body" id="comment" cols="58" rows="7" tabindex="4"
                                    class="form-control" placeholder="Post Body"><?=$body?></textarea>
                            </div>

                            <div class="form-group col-12 mt-4 mb-0">
                                <button name="edit_post" type="submit" id="edit-button" tabindex="5" value="Submit"
                                    class="button button-large button-black button-dark text-transform-none fw-medium ls-0 button-rounded m-0">Update
                                    Post</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </section>


        <?php 

            }
        ?>

        <!-- Footer
        ============================================= -->
        <?php
        require_once ("includes/footer.php");
        ?>
        <!-- #footer end -->