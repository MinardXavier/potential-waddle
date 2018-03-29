<?php
	require_once 'includes/functions.php';
	require_once 'includes/lang.php';
?>
<!DOCTYPE html>
<html lang="FR">
	<head>
		<meta charset="utf-8" />
		<title>Potential Waffle from Potential Waddle</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/less.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="row mb50">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<form action="index.php" method="post" class="f_r mr40">
					<select class="form_contact" name="lang">
						<option value="english" selected>English</option>
						<option value="french">French</option>
						<option value="spanish">Spanish</option>
						<option value="ukranian">Ukranian</option>
						<option value="japanese">Japanese</option>
						<option value="hebrew">Hebrew</option>
					</select>
					<input type="submit" name="send" value="Send it !">
				</form>
				<h1 class="mt50"><?php if(isset($quackIntro)){echo $quackIntro;}else{echo("Hello world");} ?></h1>
				<p>Current server time is <?php echo date_iso() ?></p>
				<p>Your HTTP Client IP adress is <?php echo get_ip() ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<form id="contact" method="post" action="../includes/post.php">
					<input autofocus required placeholder="Enter your name" pattern="[a-yA-YÀ-ÿ]+[ \-']?[a-yA-YÀ-ÿ]+", "gi" min="1" class="form_contact" id="name" name="name" />
					<input type="submit" name="send" value="Send it !" />
				</form>
				<div class="quotations">
					<?php blockquoteContent() ?>
			 	</div>
			</div>
		</div>
	</body>
</html>	

