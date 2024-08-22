<?php
require_once ("includes/head.php");
if (!isset($_SESSION['active_author'])) {
    redirect(ROOT . 'index.php');
    $author_id = $_SESSION['active_author'];
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

        <!-- Page Title
        ============================================= -->
        <section class="page-title page-title-center">
            <div class="container">
                <div class="page-title-row">

                    <div class="page-title-content mw-sm mb-5">
                        <h1>All Authors</h1>
                    </div>

                </div>
            </div>
        </section><!-- .page-title end -->

        <section id="content">
            <div class="content-wrap pt-0 pt-sm-6 mt-3">
                <div class="container">

                    <!-- Single Page Categories
                    ============================================= -->
                    <div class="row gutter-50">


                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3>All Authors</h3>
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


                                <div class="col-12 overflow-auto">
                                    <?= showAlert() ?>
                                    <table class="w-100">
                                        <tr>
                                            <th>Authors name</th>
                                            <th>Email</th>
                                            <th>Stack</th>
                                            <th>Author Role</th>
                                            <th>Actions</th>
                                        </tr>

                                        <?php

                                        if ($author_role == 'admin') {

                                            $sql = "SELECT * FROM author";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($author_data = $result->fetch_assoc()) {
                                                    extract($author_data);

                                                    ?>
                                                    <tr>

                                                        <td>
                                                            <?= ucfirst($author_name) ?>
                                                        </td>
                                                        <td>
                                                            <?= $author_email ?>
                                                        </td>
                                                        <td>
                                                            <?= ucfirst($author_stack) ?>
                                                        </td>

                                                        <?php
                                                        if ($author_role == "user") {

                                                            ?>
                                                            <td style="background: #cac531;">
                                                                <?= ucfirst($author_role) ?>
                                                            </td>

                                                            <?php
                                                        } ?>

                                                        <?php
                                                        if ($author_role == "admin") {

                                                            ?>
                                                            <td style="background: #bb2d3b;">
                                                                <?= ucfirst($author_role) ?>
                                                            </td>

                                                            <?php
                                                        } ?>

                                                        <td class="">

                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Actions</button>
                                                                <div class="dropdown-menu">

                                                                    <form action="processor/admin_processor.php" method="POST">

                                                                        <input type="hidden" value="<?= $author_id ?>"
                                                                            name="author_id">
                                                                        <input type="hidden" value="<?= $author_name ?>"
                                                                            name="name">

                                                                        <?php
                                                                        if ($author_role == "user") {


                                                                            ?>
                                                                            <button
                                                                                class="dropdown-item btn btn-success icofont-user-suited"
                                                                                type="submit" name="make_admin">Make
                                                                                <?= $author_name ?> an Admin
                                                                            </button>
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($author_role == "admin") {

                                                                            ?>
                                                                            <button class="dropdown-item btn btn-warning icofont-user"
                                                                                type="submit" name="make_user">Make
                                                                                <?= $author_name ?> a User
                                                                            </button>

                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </form>
                                                                    <a href="#!" class="dropdown-item btn btn-danger"
                                                                        data-toggle="modal" data-target="#modelId"
                                                                        onclick="delete_item('<?= $author_name ?>','<?= $author_id ?>')"><span
                                                                            class="icofont-ui-delete"></span> Delete</a>

                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }

                                        ?>
                                    </table>


                                    <!-- Modal -->
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Are you sure you want to delete this User
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="processor/admin_processor.php" method="POST">

                                                        <div class="container-fluid">

                                                            <input type="muted" id="delete_name"
                                                                style="border: none !important;">
                                                            <input type="hidden" id="delete_id" name="delete_id">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="delete"
                                                        id="delete_btn">Delete User</button>
                                                </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                            // Use above variables to manipulate the DOM

                                        });
                                    </script>
                                </div>

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

        <script>
            function delete_item(name, id) {
                $('#delete_name').val(name);
                $('#delete_id').val(id);

            }


    //         $('#delete_btn').click(function(e){
    //             e.preventDefault();
    //         $.post("processor/admin_processor.php",{
    //         id: $('#delete_id').val(),
    //         action: 'delete'
    //     },
    //     function(data){
    //         if(data === 'successful' ){
    //             alert('User has been deleted successfully');
    //             window.location.replace(authur.php);
    //         }else{
    //             alert(data)
    //         }
    //     });
    // });

        </script>
        <!-- #footer end -->