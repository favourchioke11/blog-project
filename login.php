<?php

require_once ('path.php');

require_once ("includes/head.php");

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

                                <h1 class="text-center">Login</h1>
                                <div class="widget subscribe-widget" data-loader="button">

                                    <div class="widget-subscribe-form-result"></div>
                                    <form action="processor/login.php" method="POST" class="mb-0 d-flex flex-column">
                                        <div>
                                            <?= showAlert() ?>
                                            <input type="email" id="widget-subscribe-form-email" name="email"
                                                class="form-control form-control-lg not-dark required email mb-3"
                                                placeholder="Email">

                                            <input type="password" id="widget-subscribe-form-email" name="password"
                                                class="form-control form-control-lg not-dark required email mb-3"
                                                placeholder="Enter your password">


                                        </div>
                                        <div>
                                            <small>Don't av an account? <a href="register.php"> Register</a></small>


                                            <center><button
                                                    class="button button-large button-black button-dark fw-medium ls-0 button-rounded m-0 ms-3 mt-4"
                                                    name="login" type="submit">Login</button></center>
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

        <!-- Footer
        ============================================= -->

            <?php
        require_once ("includes/footer.php");
        ?>
    
    <!-- #footer end -->

   

</body>

</html>