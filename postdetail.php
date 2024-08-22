<?php
require_once ("includes/head.php");

//checking if the user is logged in 

//checking if the post is available in url
if (isset($_GET["post"])) {
    $post_slug = $_GET["post"];
    $hasLiked = false;

    //fetching indidviduals post
    $sql = "SELECT * FROM post WHERE slug = '$post_slug'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $post_data = $result->fetch_assoc();
        // dnd($post_data);
        extract($post_data);

        //CHECKING IF USER HAS LIKED THE POST

        $sql = "SELECT * FROM post_likes WHERE post_id = '$post_id' AND author_id = '$author_id'";
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows > 0){
            $hasLiked = true;
        }

    }

    //getting the post author

    $sql = "SELECT * FROM author WHERE author_id = '$author_id'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $author_data = $result->fetch_assoc();
        $post_author = $author_data["author_name"];
    }

    if (isset($_GET["category"])) {
        $categoryName = $_GET["category"];
    }

    //GETTING COMMENTS

    $sql = "SELECT * FROM comments WHERE post_id = '$post_id'";
    $comments = $conn->query($sql);


} else if (!isset($_GET["post"])) {
    redirect(ROOT . "index.php");
}

?>

<body class="stretched search-overlay">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=915724525182895&autoLogAppEvents=1">
    </script>

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper">

        <!-- Header
        ============================================= -->

        <?php
        require_once ("includes/nav.php");


        ?>

        <!-- #header end -->

        <!-- Content
        ============================================= -->
        <section id="content">
            <div class="content-wrap pt-5" style="overflow: visible;">
                <div class="container d-flex justify-content-center">
                    <!-- Single Page Content
                    ============================================= -->
                    <div class="single-post mb-0">

                        <!-- Single Post
============================================= -->
                        <div class="entry">

                            <div class="row justify-content-center">
                                <div class="col-lg-6">

                                    <!-- Entry Title
            ============================================= -->
                                    <div class="entry-title">
                                        <div class="entry-categories"><a href="postdetail.php?post=<?= $slug ?>">
                                                <?= $post_data['category']; ?>
                                            </a></div>
                                        <h2>
                                            <?= $title ?>
                                        </h2>
                                    </div><!-- .entry-title end -->
                                </div>
                            </div>

                            <!-- Entry Meta
    ============================================= -->
                            <div class="d-flex justify-content-center mt-2 mb-3">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <?= $date ?>
                                        </li>
                                        <li>By <a href="#">
                                                <?= ucfirst($post_author) ?>
                                            </a></li>
                                    </ul>

                                </div>




                            </div><!-- .entry-meta end -->

                            <?php
                            if ($author_role == "admin") {

                                ?>
                            <center>
                                <form action="processor/admin_processor.php" method="POST">

                                    <?= showAlert() ?>

                                    <input type="hidden" value="<?= $post_id ?>" name="post_id">
                                    <input type="hidden" value="<?= $slug ?>" name="slug">

                                    <!--- shows when the post is suspended ---->
                                    <?php
                                        if ($status == 'suspended') {
                                            ?>

                                    <button class="btn btn-success" type="submit" name="publish_post">Publish</button>

                                    <?php
                                        }
                                        ?>

                                    <!--- shows when the post is published ---->
                                    <?php
                                        if ($status == 'published') {
                                            ?>

                                    <button class="btn btn-danger" type="submit" name="suspend_post">Suspend</button>

                                    <?php
                                        }
                                        ?>
                                </form>
                            </center>

                            <?php
                            }
                            ?>




                            <center>
                                <form action="processor/like_unlike.php" method="POST">

                                    <input type="hidden" value="<?= $post_id ?>" name="post_id">
                                    <input type="hidden" value="<?= $author_id ?>" name="author_id">
                                    <input type="hidden" value="<?= $slug ?>" name="slug">

                                    <!--- shows when the post is suspended ---->
                                    <?php
                                        if ($hasLiked && $is_user_logged) {
                                            ?>

                                    <button class="btn btn-success" type="submit" name="like_post"><span class="icofont-thumbs-up"></span></button>

                                    <?php
                                        }
                                        ?>

                                    <!--- shows when the post is published ---->
                                    <?php
                                        if (!$hasLiked && $is_user_logged) {
                                            ?>

                                    <button class="btn btn-warning" type="submit" name="like_post"><span class="icofont-thumbs-down"></span></button>

                                    <?php
                                        }
                                        ?>
                                </form>
                            </center>



                            <!-- Entry Image
    ============================================= -->
                            <div class="entry-image mt-5">
                                <a href="#" data-lightbox="image"><img
                                        class="rounded" src="./uploads/<?= $file_path ?>" alt="Blog Single"></a>
                            </div><!-- .entry-image end -->

                            <!-- Entry Content
    ============================================= -->
                            <div class="entry-content">

                                <div class="row">

                                    <div class="col-lg-2 media-content" data-animate="fadeIn">
                                        <div class="entry-title text-start">
                                            <h4>
                                                <?= ucfirst($title) ?>
                                            </h4>
                                        </div>
                                        <!-- Post Single - Share
                ============================================= -->
                                        <div>
                                            <h5 class="mb-2">Share this Post:</h5>
                                            <div>
                                                <a href="#"
                                                    class="social-icon si-small rounded-circle text-light border-0 bg-facebook">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                                <a href="#"
                                                    class="social-icon si-small rounded-circle text-light border-0 bg-x-twitter">
                                                    <i class="fa-brands fa-x-twitter"></i>
                                                    <i class="fa-brands fa-x-twitter"></i>
                                                </a>
                                                <a href="#"
                                                    class="social-icon si-small rounded-circle text-light border-0 bg-pinterest">
                                                    <i class="fa-brands fa-pinterest-p"></i>
                                                    <i class="fa-brands fa-pinterest-p"></i>
                                                </a>
                                                <a href="#"
                                                    class="social-icon si-small rounded-circle text-light border-0 bg-rss">
                                                    <i class="fa-solid fa-rss"></i>
                                                    <i class="fa-solid fa-rss"></i>
                                                </a>
                                            </div>
                                        </div><!-- Post Single - Share End -->
                                    </div>

                                    <div class="col-lg-1"></div>

                                    <div class="text-content col-lg-6">

                                        <p>
                                            <?= ucfirst($body) ?>
                                        </p><br>



                                        <div class="line"></div>

                                        <!-- Tag Cloud
                ============================================= -->
                                        <h4 class="mb-3">Related Tags</h4>
                                        <div class="tagcloud">
                                            <a href="#">general</a>
                                            <a href="#">information</a>
                                            <a href="#">media</a>
                                            <a href="#">press</a>
                                            <a href="#">gallery</a>
                                            <a href="#">illustration</a>
                                        </div><!-- .tagcloud end -->

                                        <div class="clear"></div>

                                        <!-- Comments
                ============================================= -->
                                        <div id="comments">

                                        

                                            <h3 id="comments-title"><span><?=$comments->num_rows?></span> Comments</h3>
                                            
                                            <input type="hidden" id="com_num" value="<?=$comments->num_rows?>">

                                            <!-- Comments List
                    ============================================= -->

                                            <div id="new_com"></div>

                                            <ol class="commentlist">
                                                <?php
                                                if($comments->num_rows > 0){
                                                    while ($data = $comments->fetch_assoc()) {
                                                        extract($data);
                                                 

                                                        ?>

                                                        <div class="comment-author card mt-3 w-100 p-4">

                                                            <div class="d-flex justify-content-between">
                                                                <span class="h6 text-capitalize text-muted">
                                                                <?= $comment_name ?>
                                                            </span>
                                                                <small class="text-muted">
                                                                <?= $date ?>
                                                            </small>
                                                            </div>

                                                            <small class="text-muted">
                                                                <?= $comment ?>
                                                            </small>

                                                            

                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                        <div class="clear"></div>


                                            <!-- Comment Form
                    ============================================= -->
                                            <div id="respond">

                                                <h3>Leave a <span>Comment</span></h3>

                                                <div id="notice" style="display: none;">

                                                    <div class="alert alert-success float-alert" role="alert">
                                                        <strong>Comment added successfully</strong>
                                                    </div>
                                                </div>

                                                <form class="row mb-0" action="processor/ajax.php" method="post" id="">



                                                    <div class="form-group col-12">
                                                        <label for="author">Name</label>
                                                        <input type="text" name="author" required id="author_name"
                                                            value="
                                                        <?php
                                                        if ($is_user_logged) {
                                                            echo trim(ucfirst($author_name));
                                                        } else {
                                                            echo '';
                                                        }

                                                        ?>" class="form-control" placeholder="<?php
                                                        if ($is_user_logged) {
                                                            echo trim(ucfirst($author_name));
                                                        } else {
                                                            echo '';
                                                        }

                                                        ?>">

                                                        <input type="hidden" id="post_id" value="<?= $post_id ?>">
                                                    </div>



                                                    <div class="w-100"></div>

                                                    <div class="form-group col-12">
                                                        <label for="comment">Comment</label>
                                                        <textarea name="comment" id="comment" required cols="58"
                                                            rows="7" tabindex="4" class="form-control"></textarea>
                                                    </div>

                                                    <div class="form-group col-12 mt-4 mb-0">
                                                        <button name="submit" type="button" id="submit_button"
                                                            tabindex="5" value="Submit"
                                                            class="button button-large button-black button-dark text-transform-none fw-medium ls-0 button-rounded m-0">Submit
                                                            Comment</button>
                                                    </div>

                                                </form>

                                            </div><!-- #respond end -->

                                        </div><!-- #comments end -->
                                    </div>
                                    <!-- Post Single - Content End -->

                                </div>

                            </div>
                        </div><!-- .entry end -->

                        <h3 class="mb-0">Related Posts</h3>

                        <div class="row posts-md">

                            <?php
                            $category = $post_data['category'];
                            $sql = "SELECT * FROM post WHERE category = '$category' ORDER BY RAND() LIMIT 4";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($post_data = $result->fetch_assoc()) {
                                    extract($post_data);
                                    
                                    ?>

                            <div class="col-lg-3 col-sm-6">
                                <article class="entry">
                                    <div class="entry-image">
                                        <a href="postdetail.php?post=<?= $slug ?>"><img src="./uploads/<?=$file_path?>"
                                                alt="Image 3"></a>
                                    </div>
                                    <div class="entry-title title-sm text-start">
                                        <div class="entry-categories"><a
                                                href="postdetail.php?post=<?= $slug ?>"><?=$category?></a>
                                        </div>
                                        <h3><a href="postdetail.php?post=<?= $slug ?>"
                                                class="color-underline stretched-link"><?=$title?></a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><a href="#"><?=$date?></a></li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                            <?php
                                }
                            }
                            ?>

                        </div>

                    </div>
                    <!-- Single Page Content -->
                </div>

            </div>
        </section><!-- #content end -->


        <?php
        require_once ("includes/footer.php");
        ?>
        <!-- #footer end -->

         <!--ADDING COMMENTS USING AJAX  -->

         <script>
        $('#submit_button').click(function(e) {
            author_name = $('#author_name').val()
            comment = $('#comment').val()
            com_num = $('#com_num').val();
            com_num++;

            new_comment = '  <div class="comment-author card mt-3 w-100 p-4"><div class="d-flex justify-content-between"><span class="h6 text-capitalize text-muted">'+author_name+'
        </span><small class="text-muted">Now</small></div><small class="text-muted">'+comment+'</small></div>'


            if (author_name == "" || comment == "") {
                alert('All fills are required', 'danger')

            } else {

                $.post("processor/ajax.php", {
                    author_name: author_name,
                    comment: comment,
                    post_id: $('#post_id').val(),
                    action: "add_comment"
                }, function(data) {
                    if (data === '200') {

                        $('#notice').css("display", "block").delay(3000).fadeOut()
                        $("#comment").val("")
                        $('#comments-title span').html(com_num);
                        $('#com_num').val(com_num)
                        $('#new_com').append(new_comment);

                    }

                });
            }

        });
        </script>