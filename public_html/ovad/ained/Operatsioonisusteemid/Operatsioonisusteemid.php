<h4>Operatsioonisusteemid</h4>
<?php
require("../../header.php");

	require("../functions.php");
	$signupBirthMonth = null;
	//kas pole sisse loginud
	if(!isset($_SESSION["userId"])){
		header("Location: ../../login.php");
		exit();
	}

	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: ../../login.php");
		exit();
	}
?>

<!DOCTYPE html>
<link href="../../style.css" rel="stylesheet" type="text/css" media="screen" />
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="Operatsioonisusteemid.php" method="POST">
    <h1>Upload your file</h1>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>

<h1>List of files:</h1>
<?php
$dir = opendir('.');

	if (isset($_GET['delete'])) {
		unlink($_GET['delete']);
		}

while(false !== ($filename = readdir($dir))){
	if($filename !== 'Operatsioonisusteemid.php'){
		if($filename != "." && $filename !=".."){
			$link = "<a href='?delete=$filename' class='button2'>Delete Now ->  </a><a href='./$filename'> $filename</a><br />";
			echo $link;
		}
	}
}
closedir($dir)
?>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = ".";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>