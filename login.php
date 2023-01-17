<?php

session_start();
// print_r($_SESSION);
if (isset($_SESSION["md_user_id"])) {
	header("location:homepage");
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8" />
	<title>MedPlants: Herbal Plants Information</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
	<link rel="stylesheet" href="vendors/sweetalert/sweetalert.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("js", new Date());

		gtag("config", "G-GBZ3SGGX85");
	</script>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				"gtm.start": new Date().getTime(),
				event: "gtm.js"
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != "dataLayer" ? "&l=" + l : "";
			j.async = true;
			j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
	</script>
	<!-- End Google Tag Manager -->
</head>

<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/medplants_cover.png" alt="" />
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-success">Login To MedPlant</h2>
						</div>
						<!--begin::Form-->
						<form class="form" method="POST" id="frm_login">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="input[username]" autocomplete="off" />
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="input[password]" autocomplete="off" />
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-success btn-lg btn-block">Sign In</button>
									</div>
									<!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373" >
											OR
										</div>
										<div class="input-group mb-0">
											<a
												class="btn btn-outline-success btn-lg btn-block"
												href="register.html"
												>Register To Create Account</a
											>
										</div> -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/sweetalert/sweetalert.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<script type="text/javascript">
		$("#frm_login").submit(function(e) {
			e.preventDefault();
			var url = "./controllers/sql.php?c=LoginUser&q=login";
			var data = $("#frm_login").serialize();
			$("#btn_submit").prop('disabled', true);
			$("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Verifying ...");
			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: function(data) {
					var json = JSON.parse(data);

					if (json.data != 0) {
						swal("Success!", "All is cool! Signed in successfully", "success");
						window.location = "homepage";
					} else {
						swal("Login Failed!", 'Your username or password is incorrect. Please try again.', "warning");
					}

					// var json = JSON.parse(data);
					console.log(json.data);

				}
			});


		});
	</script>
</body>

</html>