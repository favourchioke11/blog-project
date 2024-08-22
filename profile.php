<?php
require_once ("includes/head.php");

if (!isset($_SESSION['active_author'])) {
    redirect(ROOT . "index.php");
}

if (isset($_GET["category"])) {
    $categoryName = $_GET["category"];
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
                <div class="container">
                    <!-- Hero Area
                    ============================================= -->

                    <!-- Hero Area End -->

                    <!-- Subscribe Section
                    ============================================= -->
                    <div class="section section-colored rounded px-4">
                        <div class="row justify-content-center align-items-center">

                            <div class="col-lg-6">

                                <h1 class="text-center">My Profile</h1>
                                <div class="widget subscribe-widget" data-loader="button">

                                    <div class="widget-subscribe-form-result"></div>
                                    <form action="processor/profile.php" method="POST" class="mb-0 d-flex flex-column">
                                        <div>
                                            <?= showAlert() ?>

                                            <input type="text" id="widget-subscribe-form-email" name="name"
                                                class="form-control form-control-lg not-dark required email mb-3"
                                                value="<?= $author_name ?>">

                                            <input type="email" id="widget-subscribe-form-email" name="email"
                                                class="form-control form-control-lg not-dark required email mb-3"
                                                value="<?= $author_email ?>" readonly>


                                            <select name="stack" id=""
                                                class="form-control form-control-lg not-dark required email mb-3">
                                                <option>
                                                    <?= $author_stack ?>
                                                </option>

                                                <?php

                                                $sql = "SELECT * FROM categories";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($category_data = $result->fetch_assoc()) {
                                                        extract($category_data);
                                                        ?>
                                                        <option value="<?= $category ?>">
                                                            <?= $category ?>
                                                        </option>


                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>


                                            <input type="text" id="widget-subscribe-form-email" name="author_role"
                                                class="form-control form-control-lg not-dark required email mb-3"
                                                value="<?= $author_role ?>" readonly>

                                            <input type="hidden" id="widget-subscribe-form-email" name=""
                                                class="form-control form-control-lg not-dark required email mb-3">


                                        </div>
                                        <div>

                                            <center><button
                                                    class="button button-large button-black button-dark fw-medium ls-0 button-rounded mt-4 m-0 ms-3"
                                                    name="update" type="submit" value="<?= $author_id ?>">Update
                                                    Profile</button></center>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Subscribe Section End -->

                    <!-- Video Section
                    ============================================= -->
                </div>
        </section><!-- #content end -->


        <footer id="footer">
            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
            </div>
    </div>

    <!-- Copyrights
            ============================================= -->
    <div id="copyrights">
        <div class="container">

            <div class="row align-items-center justify-content-between col-mb-30">
                <div class="col-lg-auto text-center text-lg-start">
                    Copyrights &copy; 2023 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a>
                    </div>
                </div>

                <div class="col-lg-auto text-center text-lg-start">
                    <div class="copyrights-menu copyright-links m-0">
                        <a href="#">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a href="#">Portfolio</a>/<a
                            href="#">FAQs</a>/<a href="#">Contact</a>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- #copyrights end -->
    </footer>
    <!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up rounded-circle" style="left: 30px; right: auto;"></div>

    <!-- JavaScripts
    ============================================= -->
    <script src="js/plugins.min.js"></script>
    <script src="js/functions.bundle.js"></script>

    <!-- ADD-ONS JS FILES -->
    <script>
        // Current Date
        var weekday = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"],
            month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                "November", "December"
            ],
            a = new Date();

        document.querySelector('.date-today span').innerHTML = weekday[a.getDay()] + ', ' + month[a.getMonth()] + ' ' + a
            .getDate();
    </script>