<?php
function addImage(){	
	$originalFileName = basename($_FILES["fileToUpload"]['name']);
	$fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
	$newFileName = uniqid().'.'.$fileExtension;

	$target_dir = "uploads/";
	$target_file = $target_dir . $newFileName;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Allow certain file formats and check if file is to big
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $_FILES["fileToUpload"]["size"] > 50000000) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed or your file is too large.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". $target_file . " has been uploaded.";

	        $path = $target_file;

			$xml = simplexml_load_file("gallery.xml");
		    $image = $xml->addChild("image");
		    $image->addAttribute("id", "5");
		    $image->addChild("title", $_POST["fileName"]);
		    $image->addChild("date", $_POST["fileDate"]);
		    $image->addChild("text", $_POST["fileText"]);
		    $image->addChild("path", $path);

		    $xml->asXML("gallery.xml");
	        

	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}


}