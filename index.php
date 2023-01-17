<?php
include 'core/config.php';

if (!isset($_SESSION["mp_user_id"])) {
	header("location:./login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8" />
	<title>MedPlants: Herbal Plants Information </title>

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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css" />

	<link rel="stylesheet" href="vendors/sweetalert/sweetalert.css">

	<script type="text/javascript" src="vendors/js/jquery.min.js"></script>

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
	<style>
		.dt-checkbox input:checked~span {
			background: #0075ff;
			border-color: #0075ff;
			color: #fff;
		}

		.sidebar-light .sidebar-menu>ul>li>.dropdown-toggle.active {
			background-color: #4caf50;
			color: #fff;
		}

		.sidebar-light .sidebar-menu>ul>li>.dropdown-toggle.hover {
			background-color: #4caf50;
			color: #fff;
		}
	</style>
</head>

<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon bi bi-list"></div>
			<div class="header-search">

			</div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown" style="padding: 15px 0;">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-name main_fullname_label"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="#" onclick="logout()"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="" />
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2" />
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3" />
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="" />
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2" />
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3" />
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="" />
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5" />
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6" />
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">
						Reset Settings
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- SIDEBAR HERE -->
	<?php include "components/sidebar.php" ?>

	<div class="mobile-menu-overlay"></div>

	<!-- ROUTES HERE -->
	<?php require 'routes/routes.php'; ?>

	<!-- js -->
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/sweetalert/sweetalert.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>

	<script type='text/javascript'>
		<?php
		echo "var route_settings = " . $route_settings . ";\n";
		echo "var user_profile = " . $user_profile . ";\n";
		?>
	</script>
	<script type="text/javascript">
		var modal_detail_status = 0;
		$(document).ready(function() {


			$(".select2").select2();

			$(".select2").css({
				"width": "100%"
			});

			$(".input-item").css({
				"color": "#fff;"
			});

			$('ul li a').click(function() {
				$('li a').removeClass("active");
				$(this).addClass("active");
			});


			$(".main_username_label").html(user_profile[0]);
			$(".main_fullname_label").html(user_profile[1]);
			$(".main_category_label").html(user_profile[2]);
			$(".main_email_label").html(user_profile[3]);
			$(".main_date_label").html(user_profile[4]);

		});

		function logout() {
			var confirm_export = confirm("You are about to logout.");
			if (confirm_export == true) {
				var url = "controllers/sql.php?c=LoginUser&q=logout";
				$.ajax({
					url: url,
					success: function(data) {

						location.reload();

					}
				});
			}

		}

		function schema() {
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + route_settings.class_name + "&q=schema",
				data: [],
				success: function(data) {
					var json = JSON.parse(data);
					console.log(json.data);
				}
			});
		}

		function success_add() {
			swal("Success!", "Successfully added entry!", "success");
		}

		function success_update() {
			swal("Success!", "Successfully updated entry!", "success");
		}

		function success_delete() {
			swal("Success!", "Successfully deleted entry!", "success");
		}

		function entry_already_exists() {
			swal("Cannot proceed!", "Entry already exists!", "warning");
		}

		function amount_is_greater() {
			swal("Cannot proceed!", "Amount is greater than balance!", "warning");
		}

		function failed_query(data) {
			swal("Failed to execute query!", data, "warning");
			//alert('Something is wrong. Failed to execute query. Please try again.');
		}

		function checkAll(ele, ref) {
			var checkboxes = document.getElementsByClassName(ref);
			if (ele.checked) {
				for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = true;
					}
				}
			} else {
				for (var i = 0; i < checkboxes.length; i++) {
					//console.log(i)
					if (checkboxes[i].type == 'checkbox') {
						checkboxes[i].checked = false;
					}
				}
			}
		}


		function addModal() {
			modal_detail_status = 0;
			$("#hidden_id").val(0);
			document.getElementById("frm_submit").reset();

			var element = document.getElementById('reference_code');
			if (typeof(element) != 'undefined' && element != null) {
				generateReference(route_settings.class_name);
			}

			$("#modalLabel").html("<i class='flaticon2-add'></i> Add Entry");
			$("#modalEntry").modal('show');
		}

		$("#frm_submit").submit(function(e) {
			e.preventDefault();

			$("#btn_submit").prop('disabled', true);
			$("#btn_submit").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

			var hidden_id = $("#hidden_id").val();
			var q = hidden_id > 0 ? "edit" : "add";
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + route_settings.class_name + "&q=" + q,
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
					getEntries();
					var json = JSON.parse(data);
					if (route_settings.has_detail == 1) {
						if (json.data > 0) {
							$("#modalEntry").modal('hide')
							hidden_id > 0 ? success_update() : success_add();
							hidden_id > 0 ? $("#modalEntry2").modal('hide') : '';
							hidden_id > 0 ? getEntryDetails2(hidden_id) : getEntryDetails2(json.data);
						} else if (json.data == -2) {
							entry_already_exists();
						} else if (json.data > 0) {
							getPlantDetails(json.data);
						} else {
							failed_query(json);
						}
					} else {
						if (json.data == 1) {
							hidden_id > 0 ? success_update() : success_add();
							$("#modalEntry").modal('hide');
						} else if (json.data == 2) {
							entry_already_exists();
						} else {
							failed_query(json);
						}
					}
					$("#btn_submit").prop('disabled', false);
					$("#btn_submit").html("Save");
				}
			});
		});

		function getEntryDetails(id, is_det = 0) {
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + route_settings.class_name + "&q=view",
				data: {
					input: {
						id: id
					}
				},
				success: function(data) {
					var jsonParse = JSON.parse(data);
					const json = jsonParse.data;

					$("#hidden_id").val(id);

					$('.input-item').map(function() {
						//console.log(this.id);
						const id_name = this.id;
						this.value = json[id_name];
					});

					//$(".select2").select2().trigger('change');

					$("#modalLabel").html("<i class='flaticon-edit'></i> Update Entry");
					$("#modalEntry").modal('show');
				}
			});

			if (is_det == 1) {
				modal_detail_status == 1 ? setTimeout(() => {
					$("#modalEntry2").modal('hide')
				}, 500) : '';
			} else {
				modal_detail_status = 0;
			}
		}

		function deleteEntry(id) {

			swal({
					title: "Are you sure?",
					text: "You will not be able to recover these entry!",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					cancelButtonClass: "btn-primary",
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel!",
					closeOnConfirm: false,
					closeOnCancel: false
				},
				function(isConfirm) {
					if (isConfirm) {

						$.ajax({
							type: "POST",
							url: "controllers/sql.php?c=" + route_settings.class_name + "&q=delete_entry",
							data: {
								input: {
									id: id
								}
							},
							success: function(data) {
								getEntries();
								var json = JSON.parse(data);
								console.log(json);
								if (json.data == 1) {
									success_delete();
								} else {
									failed_query(json);
								}
							}
						});

						$("#btn_delete").prop('disabled', true);

					} else {
						swal("Cancelled", "Entries are safe :)", "error");
					}
				});

		}

		function deleteEntries() {

			var count_checked = $("input[class='dt_id']:checked").length;

			if (count_checked > 0) {
				swal({
						title: "Are you sure?",
						text: "You will not be able to recover these entries!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-primary",
						confirmButtonText: "Yes, delete it!",
						cancelButtonText: "No, cancel!",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							var checkedValues = $("input[class='dt_id']:checked").map(function() {
								return this.value;
							}).get();

							$.ajax({
								type: "POST",
								url: "controllers/sql.php?c=" + route_settings.class_name + "&q=remove",
								data: {
									input: {
										ids: checkedValues
									}
								},
								success: function(data) {
									getEntries();
									var json = JSON.parse(data);
									console.log(json);
									if (json.data == 1) {
										success_delete();
									} else {
										failed_query(json);
									}
								}
							});

							$("#btn_delete").prop('disabled', true);

						} else {
							swal("Cancelled", "Entries are safe :)", "error");
						}
					});
			} else {
				swal("Cannot proceed!", "Please select entries to delete!", "warning");
			}
		}

		// MODULE WITH DETAILS LIKE SALES

		function getEntryDetails2(id) {
			$("#hidden_id_2").val(id);
			modal_detail_status = 1;
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + route_settings.class_name + "&q=view",
				data: {
					input: {
						id: id
					}
				},
				success: function(data) {
					var jsonParse = JSON.parse(data);
					const json = jsonParse.data;

					$('.label-item').map(function() {
						const id_name = this.id;
						const new_id = id_name.replace('_label', '');
						this.innerHTML = json[new_id];
					});

					var transaction_edit = document.getElementById("menu-edit-transaction");
					var transaction_delete_items = document.getElementById("menu-delete-selected-items");
					var transaction_finish = document.getElementById("menu-finish-transaction");
					var col_list = document.getElementById("col-list");
					var col_item = document.getElementById("col-item");

					if (json.status == 'F') {
						transaction_edit.classList.add('disabled');
						(typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.classList.add('disabled'): '';
						transaction_finish.classList.add('disabled');

						transaction_edit.setAttribute("onclick", "");
						(typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.setAttribute("onclick", ""): '';
						transaction_finish.setAttribute("onclick", "");

						(typeof(col_item) != 'undefined' && col_item != null) ? col_item.style.display = "none": '';
						(typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.remove('col-8'): '';
						(typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.add('col-12'): '';
					} else {
						transaction_edit.classList.remove('disabled');
						(typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.classList.remove('disabled'): '';
						transaction_finish.classList.remove('disabled');

						transaction_edit.setAttribute("onclick", "getEntryDetails(" + id + ",1)");
						(typeof(transaction_delete_items) != 'undefined' && transaction_delete_items != null) ? transaction_delete_items.setAttribute("onclick", "deleteEntry2()"): '';
						transaction_finish.setAttribute("onclick", "finishTransaction()");

						(typeof(col_item) != 'undefined' && col_item != null) ? col_item.style.display = "block": '';
						(typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.remove('col-12'): '';
						(typeof(col_list) != 'undefined' && col_list != null) ? col_list.classList.add('col-8'): '';
					}
					getEntries2();
					$("#modalEntry2").modal('show');
				}
			});
		}

		$("#frm_submit_2").submit(function(e) {
			e.preventDefault();

			$("#btn_submit_2").prop('disabled', true);
			$("#btn_submit_2").html("<span class='fa fa-spinner fa-spin'></span> Submitting ...");

			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + route_settings.class_name + "&q=add_detail",
				data: $("#frm_submit_2").serialize(),
				success: function(data) {
					getEntries2();
					var json = JSON.parse(data);
					if (json.data == 1) {
						success_add();
						document.getElementById("frm_submit_2").reset();
						$('.select2').select2().trigger('change');
					} else if (json.data == 2) {
						entry_already_exists();
					} else if (json.data == 3) {
						amount_is_greater();
					} else {
						failed_query(json);
						$("#modalEntry2").modal('hide');
					}
					$("#btn_submit_2").prop('disabled', false);
					$("#btn_submit_2").html("Save");
				}
			});
		});

		function deleteEntry2() {

			var count_checked = $("input[class='dt_id_2']:checked").length;

			if (count_checked > 0) {
				swal({
						title: "Are you sure?",
						text: "You will not be able to recover these entries!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-danger",
						cancelButtonClass: "btn-primary",
						confirmButtonText: "Yes, delete it!",
						cancelButtonText: "No, cancel!",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							var checkedValues = $("input[class='dt_id_2']:checked").map(function() {
								return this.value;
							}).get();

							$.ajax({
								type: "POST",
								url: "controllers/sql.php?c=" + route_settings.class_name + "&q=remove_detail",
								data: {
									input: {
										ids: checkedValues
									}
								},
								success: function(data) {
									getEntries2();
									var json = JSON.parse(data);
									console.log(json);
									if (json.data == 1) {
										success_delete();
									} else {
										failed_query(json);
									}
								}
							});

							$("#btn_delete").prop('disabled', true);

						} else {
							swal("Cancelled", "Entries are safe :)", "error");
						}
					});
			} else {
				swal("Cannot proceed!", "Please select entries to delete!", "warning");
			}
		}

		function finishTransaction() {
			var id = $("#hidden_id_2").val();

			var count_checked = $("input[class='dt_id_2']").length;
			if (count_checked > 0) {
				swal({
						title: "Are you sure?",
						text: "This entries will be finished!",
						type: "warning",
						showCancelButton: true,
						confirmButtonClass: "btn-info",
						cancelButtonClass: "btn-primary",
						confirmButtonText: "Yes, finish it!",
						cancelButtonText: "No, cancel!",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$.ajax({
								type: "POST",
								url: "controllers/sql.php?c=" + route_settings.class_name + "&q=finish",
								data: {
									input: {
										id: id
									}
								},
								success: function(data) {
									getEntries();
									var json = JSON.parse(data);
									if (json.data == 1) {
										success_add();
										$("#modalEntry2").modal('hide');
									} else {
										failed_query(json);
									}
								}
							});
						} else {
							swal("Cancelled", "Entries are safe :)", "error");
						}
					});
			} else {
				swal("Cannot proceed!", "No entries found!", "warning");
			}
		}
		// END MODULE

		function getSelectOption(class_name, primary_id, label, param = '', attributes = [], pre_value = '', pre_label = 'Please Select') {
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + class_name + "&q=show",
				data: {
					input: {
						param: param
					}
				},
				success: function(data) {
					var json = JSON.parse(data);
					if (pre_value != "remove") {
						$("#" + primary_id).html("<option value='" + pre_value + "'> &mdash; " + pre_label + " &mdash; </option>");
					}

					for (list_index = 0; list_index < json.data.length; list_index++) {
						const list = json.data[list_index];
						var data_attributes = {};
						data_attributes['value'] = list[primary_id];
						for (var attr_index in attributes) {
							const attr = attributes[attr_index];
							data_attributes[attr] = list[attr];
						}
						$('#' + primary_id).append($("<option></option>").attr(data_attributes).text(list[label]));
					}
				}
			});
		}

		function generateReference(class_name) {
			$.ajax({
				type: "POST",
				url: "controllers/sql.php?c=" + class_name + "&q=generate",
				data: [],
				success: function(data) {
					var json = JSON.parse(data);
					$("#reference_code").val(json.data);
				}
			});
		}

		function printCanvas() {
			var printContents = document.getElementById('print_canvas').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
			window.close();
			location.reload();

		}
	</script>


	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
</body>

</html>