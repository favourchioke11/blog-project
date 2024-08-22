<?php
require_once ("includes/head.php");

if (!isset($_SESSION['active_author'])){
    redirect(ROOT.'index.php');
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

        <!-- Page Title
        ============================================= -->
        <section class="page-title page-title-center">
            <div class="container">
                <div class="page-title-row">

                    <div class="page-title-content mw-sm mb-5">
                        <h1>My Posts</h1>
                        
                    </div>

                </div>
            </div>
        </section><!-- .page-title end -->

        <section id="content">
            <div class="content-wrap pt-0 pt-sm-6">
                <div class="container">

                    <!-- Single Page Categories
                    ============================================= -->
                    <div class="row gutter-50">
                        <div class="col-lg-3 cat-widgets position-sticky h-100" style="top: 234px;">


                            <?php
							if ($author_role == "admin") {

								?>
                            <?=showAlert()?>
                            <div class="widget widget-search">
                                <form class="input-group" action="processor/admin_processor.php" method="POST">

                                    <input class="form-control" required type="search" name="category"
                                        placeholder="Add Category" aria-label="Search">
                                    <button class="btn btn-outline-secondary uil uil-plus" name="add_category"
                                        type="submit"></button>
                                </form>
                            </div>

                            <?php
							}
							?>

                            <div class="widget widget-nav mt-md-5">
                                <ul class="nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">All Categories</a>
                                    </li>
                            <?php

                                    $sql = "SELECT * FROM categories";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($category_data = $result->fetch_assoc()) {
                                            extract($category_data);
                                ?>
                                           <li class="nav-item">
                                        <a class="nav-link" href="categorypost.php?category=<?=$category?>"><?=$category?></a>
                                    </li>


                             <?php
                                        }
                                    }
                            ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3>All Posts</h3>
                                </div>
                                <div>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Most
                                            Popular</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Latest Posts</a>
                                            <a class="dropdown-item" href="#">Most Comments</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-mb-50 posts-md">

                                <?php
                                $sql = "SELECT * FROM post WHERE author_id = '$author_id' ORDER BY post_id DESC";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    while ($post_data = $result->fetch_assoc()) {
                                        extract($post_data);

                                        ?>
                                <div class="col-md-4">
                                    <article class="entry">
                                        <div class="entry-image mb-3">
                                            <a href="postdetail.php?post=<?= $slug ?>"><img
                                                    src="./uploads/<?=$file_path?>" alt="Image 3"></a>
                                        </div>
                                        <div class="entry-title title-sm">
                                            <div class="entry-categories"><a
                                                    href="postdetail.php?post=<?= $slug ?>"><?=$category?></a></div>
                                            <h3><a href="postdetail.php?post=<?= $slug ?>"
                                                    class="color-underline stretched-link"><?=$title?></a></h3>
                                        </div>
                                        <div class="entry-meta">
                                            <ul>
                                                <li><?=$date?></li>
                                                <li><a href="addpost.php?post=<?=$slug?>&action=edit">Edit</a></li>
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
                    </div>
                    <!-- Single Page Categories End -->

                    <!-- Subscribe Section
                    ============================================= -->
                    <div class="section section-colored rounded mb-0 px-4">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-5">
                                <h3 class="mb-4 mb-lg-0">Sign up for Updates &amp; Newsletters.</h3>
                            </div>
                            <div class="col-lg-6">
                                <div class="widget subscribe-widget" data-loader="button">

                                    <div class="widget-subscribe-form-result"></div>
                                    <form id="widget-subscribe-form" action="include/subscribe.php" method="post"
                                        class="mb-0 d-flex">
                                        <input type="email" id="widget-subscribe-form-email"
                                            name="widget-subscribe-form-email"
                                            class="form-control form-control-lg not-dark required email"
                                            placeholder="Your Email Address">
                                        <button
                                            class="button button-large button-black button-dark fw-medium ls-0 button-rounded m-0 ms-3"
                                            type="submit">Subscribe Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Subscribe Section End -->

                </div>
            </div>
        </section>

        <!-- Content
        ============================================= -->


        <!--ADDING COMMENTS USING AJAX  -->

        <?php
        require_once ("includes/footer.php");
        ?>
        <!-- #footer end -->