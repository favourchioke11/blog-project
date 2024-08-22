<?php
require_once ("includes/head.php");


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
                <div class="container">
                    <!-- Hero Area
                    ============================================= -->
                    <div class="row border-between">
                        <div class="col-lg-7 mb-5 mb-lg-0">
                            <!-- Post Article -->

                            <?php
                            $sql = "SELECT * FROM post WHERE status = 'published' ORDER BY post_id DESC LIMIT 1";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                $post_data = $result->fetch_assoc();
                                extract($post_data);



                                ?>



                                <article class="entry border-bottom-0 mb-0">
                                    <div class="entry-image">
                                        <a href="postdetail.php?post=<?= $slug ?>"><img src="./uploads/<?= $file_path ?>"
                                                alt="Image 3"></a>
                                    </div>
                                    <div class="entry-title">
                                        <div class="entry-categories"><a href="demo-blog-categories.html">
                                                <?= $category ?>
                                            </a></div>
                                        <h3><a href="postdetail.php?post=<?= $slug ?>"
                                                class="stretched-link color-underline"><span>
                                                    <?= $title ?>
                                                </span></a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><a href="#">
                                                    <?= $date ?>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p>
                                            <?= substr($body, 0, 300) ?>...
                                        </p>
                                    </div>
                                </article>
                                <?php

                            }

                            ?>
                        </div>

                        <div class="col-lg-5">
                            <h3 class="font-body fw-medium mb-4 h4">Highlights</h3>

                            <div class="row posts-md col-mb-30">

                                <?php
                                $sql = "SELECT * FROM post WHERE status = 'published' ORDER BY post_id DESC";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    while ($comment_data = $result->fetch_assoc()) {
                                        extract($comment_data);


                                        ?>
                                        <article class="entry col-12">
                                            <div class="grid-inner row gutter-20">
                                                <div class="col-md-4">
                                                    <a href="postdetail.php?post=<?= $slug ?>"><img
                                                            src="./uploads/<?= $file_path ?>" alt="Image"></a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="entry-title title-xs">
                                                        <div class="entry-categories"><a href="demo-blog-categories.html">
                                                                <?= $category ?>
                                                            </a></div>
                                                        <h3><a href="postdetail.php?post=<?= $slug ?>"
                                                                class="stretched-link color-underline">
                                                                <?= $title ?>
                                                            </a></h3>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li><a href="#">
                                                                    <?= $date ?>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <?php
                                    }
                                }

                                ?>


                            </div>

                        </div>
                    </div> <!-- Hero Area End -->

                    <!-- Subscribe Section
                    ============================================= -->
                    <div class="section section-colored rounded px-4">
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

                    <!-- Video Section
                    ============================================= -->
                    <!-- Video Section End -->

                </div>



                <div class="container">

                    <!-- Based On Your Reading History
                    ============================================= -->
                    <div class="row border-between">

                        <!-- Left Side of Based On Your Reading History
                        ============================================= -->
                        <div class="col-lg-8">
                            <h3 class="font-body fw-medium">Based On Your Reading History</h3>

                            <div class="row col-mb-50">

                                <?php
                                $sql = "SELECT * FROM post WHERE status = 'published' ORDER BY post_id DESC";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    while ($comment_data = $result->fetch_assoc()) {
                                        extract($comment_data);


                                        ?>
                                        <article class="col-12">
                                            <div class="row">
                                                <div class="col-md-6 mb-0">
                                                    <a href="postdetail.php?post=<?= $slug ?>" class="entry-image">
                                                        <img src="uploads/<?= $file_path ?>" alt="Image">
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="entry-title mt-lg-0 mt-3">
                                                        <div class="entry-categories"><a href="demo-blog-categories.html">
                                                                <?= $category ?>
                                                            </a>
                                                        </div>
                                                        <h3><a href="postdetail.php?post=<?= $slug ?>"
                                                                class="color-underline stretched-link">
                                                                <?= $title ?>
                                                            </a></h3>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li><a href="#">
                                                                    <?= $date ?>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="entry-content">
                                                        <p>
                                                            <?= substr($body, 0, 150) ?>...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                        <?php
                                    }
                                }

                                ?>
                            </div>
                        </div>

                        <!-- Right Side of Based On Your Reading History - Sticky
                        ============================================= -->
                        <div class="col-lg-4 mt-5 mt-lg-0 position-sticky h-100" style="top: 234px;">
                            <h3 class="font-body fw-medium">This Week</h3>

                            <ul class="week-posts posts-sm row col-mb-30">
                                <?php
                                $sql = "SELECT * FROM post WHERE status = 'published' ORDER BY post_id ASC";
                                $result = $conn->query($sql);


                                if ($result->num_rows > 0) {
                                    while ($comment_data = $result->fetch_assoc()) {
                                        extract($comment_data);


                                        ?>
                                        <li class="entry col-12">
                                            <div class="grid-inner">
                                                <div class="entry-title">
                                                    <h4><a href="postdetail.php?post=<?= $slug ?>"
                                                            class="color-underline stretched-link"><?= $title ?></a></h4>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><a href="#"><?=$date?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <?php

                                    }
                                }
                                ?>


                            </ul>

                            <div class="line line-sm"></div>

                            <h3 class="font-body fw-medium">Ad</h3>
                            <div class="fb-post"
                                data-href="https://www.facebook.com/semicolonweb/posts/2855299871172671"
                                data-width="500" data-show-text="false"></div>

                        </div>
                    </div> <!-- Based On Your Reading History End -->
                </div>

                <!-- Advertisement Section
                ============================================= -->
                <!-- Advertisement Section End -->

                <div class="container">
                    <!-- All Categories
                    ============================================= -->
                    <!-- All Categories Section End -->

                </div>
            </div>
        </section><!-- #content end -->

        <!-- Footer
        ============================================= -->
        <?php
        require_once ("includes/footer.php");
        ?>
        <!-- #footer end -->