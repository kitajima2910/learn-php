<?php
session_start();
include_once "functions.php";
if (isset($_SESSION["user_id"])) {
	if (isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	}
}
?>
<html>

<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
	<table border="0" cellpadding="10" cellspacing="1" width="100%">
		<tr class="tableheader">
			<td align="center">User Dashboard</td>
		</tr>
		<tr class="tablerow">
			<td>
				<?php
				if (isset($_SESSION["user_name"])) {
				?>
					Welcome <?php echo $_SESSION["user_name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
					<?php
				}
					?>
			</td>
		</tr>

		<script>
			setTimeout(function() {
				window.location.href = 'logout.php?session_expired=1';
			}, <?= 5000; ?>);
		</script>
</body>

</html>