<script src="js/jquery.js"></script>


<footer id="footer">
	<div class="container">

		<!-- Footer Widgets
				============================================= -->

	</div>

	<!-- Copyrights
			============================================= -->
	<div id="copyrights">
		<div class="container">

			<div class="row align-items-center justify-content-between col-mb-30">
				<div class="col-lg-auto text-center text-lg-start">
					Copyrights &copy; 2024 All Rights Reserved by Tech Connect.<br>
					<div class="copyright-links"><a href="register.php">Register</a> / <a href="login.php">Login</a>
					</div>
				</div>

				<div class="col-lg-auto text-center text-lg-start">
					<div class="copyrights-menu copyright-links m-0">
						<a href="index.php">Home</a>/<a href="#">About</a>/<a href="#">Features</a>/<a
							href="#">Portfolio</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
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

<!-- JavaScripts ============================================= -->
<script src="js/plugins.min.js"></script>
<script src="js/functions.bundle.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
	crossorigin="anonymous"></script>

<!-- ADD-ONS JS FILES -->
<script>
	// Current Date
	var weekday = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"],
		month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		a = new Date();

	document.querySelector('.date-today span').innerHTML = weekday[a.getDay()] + ', ' + month[a.getMonth()] + ' ' + a.getDate();
</script>

</body>

</html>