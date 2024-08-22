<?php

require_once ("includes/head.php");

?>

<header id="header" class="header-size-custom" data-sticky-shrink="false">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row justify-content-lg-between">

				<!-- Logo
						============================================= -->
				<div id="logo" class="mx-lg-auto col-auto flex-column order-lg-2 px-0">
					<a href="index.php" class="mb-4">

						<img class="logo-default mt-2" srcset="" src="images/connect1.png" alt="">
						<!-- <img class="logo-default" srcset="demos/blog/images/logo.png, demos/blog/images/logo@2x.png 2x"
							src="demos/blog/images/logo@2x.png" alt="Canvas Logo">
						 -->
					</a>
					<span class="divider divider-center date-today"><span class="divider-text"></span></span>
				</div><!-- #logo end -->

				<div class="col-auto col-lg-3 order-lg-1 d-none d-md-flex px-0">
					<div class="social-icons">

					</div>
				</div>

				<div class="header-misc col-auto col-lg-3 justify-content-lg-end ms-0 ms-sm-3 px-0">

					<!---- SHOWS WHEN USER IS LOGGED IN  --->

					<?php

					if ($is_user_logged) {



						?>


					<div class="dropdown dropdown-langs">
						<button class="btn dropdown-toggle px-1" type="button" id="dropdownMenuButton"
							data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo explode(' ', ucfirst($author_name))[0] ?>
						</button>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
							<a href="profile.php" class="dropdown-item"> <i class="icofont-user"></i>
								My Profile</a>
							<a href="addpost.php" class="dropdown-item"> <i class="icofont-login"></i>
								Add Post</a>
							<a href="mypost.php" class="dropdown-item"> <i class="icofont-ui-chat"></i>
								My Post</a>

							<?php
							if ($author_role == "admin") {

								?>
							<a href="suspendedpost.php" class="dropdown-item"> <i class="icofont-error text-danger"></i>
								Suspended Posts</a>
							<a href="author.php" class="dropdown-item"> <i class="icofont-users-social"></i> All
								Authors</a>
							<!-- <a href="categorypost.php" class="dropdown-item"> <i class="icofont-ui-message"></i> Add
								Category</a> -->

							<?php
							}
							?>

							<a href="processor/logout.php?target=active_author&url=<?= ROOT ?>index.php"
								class="dropdown-item"><span class="icofont-logout"></span>Log Out</a>
						</div>
					</div>
					<?php

					}

					?>

					<!---- SHOWS WHEN USER IS NOT LOGGED IN  --->
					<?php

					if (!$is_user_logged) {

						?>


					<div class="dropdown dropdown-langs">
						<button class="btn dropdown-toggle px-1" type="button" id="dropdownMenuButton"
							data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Account
						</button>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
							<a href="login.php" class="dropdown-item"> <i class="icofont-user"></i>
								Login</a>
							<a href="register.php" class="dropdown-item"> <i class="icofont-login"></i>
								Register</a>

						</div>
					</div>
					<?php

					}

					?>

					<!-- Top Search
							============================================= -->
					<div id="top-search" class="header-misc-icon d-lg-block d-none">
						<a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
					</div><!-- #top-search end -->


				</div>

				<div class="primary-menu-trigger d-lg-none d-sm-block btn-group">

					<button class="cnvs-hamburger" type="button" title="Open Mobile Menu" id="ctr-btn">
						<span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
					</button>


					
				</div>

				<div id="nav-list" class="d-lg-none dropdown-menu">
					<nav>
						<ul class="list-unstyled">

							<?php

							$sql = "SELECT * FROM categories";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								while ($category_data = $result->fetch_assoc()) {
									extract($category_data);
									?>
									<li class="menu-item m-3"><a class="text-dark font-weight-bolder font-40"
											href="categorypost.php?category=<?= $category ?>">
											<?= ucfirst($category) ?>
										</a></li>
									<?php
								}
							}
							?>
						</ul>
					</nav>
				</div>

			</div>
		</div>

		<div class="container">
			<div class="d-lg-block d-none">
				<nav>
					<ul class="d-flex justify-content-between list-unstyled">

						<?php

						$sql = "SELECT * FROM categories";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while ($category_data = $result->fetch_assoc()) {
								extract($category_data);
								?>
								<li class="menu-item m-3"><a class="text-dark font-weight-bolder font-40"
										href="categorypost.php?category=<?= $category ?>">
										<?= ucfirst($category) ?>
									</a></li>
								<?php
							}
						}
						?>
					</ul>
				</nav>
			</div>
		</div>




	</div>
	<div class="header-wrap-clone"></div>

</header>

<script>

	$("#nav-list").hide();

	$("#ctr-btn").click(function () {
		$("#nav-list").toggle(500);
	});
</script>