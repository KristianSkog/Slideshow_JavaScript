<!DOCTYPE html>
<html>
<head>
	<title>Kristian_skog_inl_2</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<?php
			require "gallery.php";

			if (isset($_POST["uploadFile"])) {
				addImage();
				header("location: index.php");
			}
			if (isset($_POST["deleteImage"])) {
				deleteImg();
				header("location: index.php");
			}
		?>
</head>
<body>

<div class="container">
<!-- Buttons left, delete and right-->
	<div class="row margin-top allImages header">
		<div class="col-xs-4">
			<button id="prevBTN" class="glyphicon glyphicon-menu-left buttonStyle formButten"></button>
		</div>
		<div class="col-xs-4">
			<form id="deleteForm" method="post" action=""></form>
		</div>
		<div class="col-xs-4">
			<button id="nextBTN" class="glyphicon glyphicon-menu-right buttonStyle formButten"></button>
		</div>
 	</div>
<!-- Slideshow-->
	<div class="row">
		<div class="col-xs-12 allImages margin-bottom">
			<div class="imageFrame">
				<h1 id="imageTitle" class="text-align"></h1>
				<p id="imageDate" class="text-align"></p>
				<img id="slideshowimg" src="">
				<p id="imageText" class="text-align text padding"></p>
			</div>
		</div>
	</div>
<!-- Upload file-->
	<div class="row allImages">
		<div class="col-xs-3">
		</div>
		<div class="col-xs-6">
		<h3 class="text-align">Upload Image</h3>
			<form method="post" class="padding" enctype="multipart/form-data">
				Title:<br><input type="text" name="fileName" id="fileName"><br>
				Date:<br><input type="date" name="fileDate" id="fileDate"><br>
				Text:<br><textarea name="fileText" id="fileText" rows="4" cols="50"></textarea><br>
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="uploadFile">
		    </form>
		</div>
	</div>
<!-- All images-->
	<div id="demo">
		
	</div>
</div>

<script type="text/javascript" src="script.js"></script>
</body>
</html>