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
	?>
</head>
<body>

	<button id="prevBTN" class="glyphicon glyphicon-menu-left"></button>
	<button id="nextBTN" class="glyphicon glyphicon-menu-right"></button><br>

	<img id="slideshowimg" src="">

	<div id="demo">
	</div>


	<form method="post" enctype="multipart/form-data">
		Title:<input type="text" name="fileName" id="fileName">
		Date:<input type="date" name="fileDate" id="fileDate"><br>
		Text:<textarea name="fileText" id="fileText"></textarea><br>
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="uploadFile">
	</form>


	<script action="gallery.php" type="text/javascript" src="script.js"></script>
</body>
</html>