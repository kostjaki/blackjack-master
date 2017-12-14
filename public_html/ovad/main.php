<?php
	require("functions.php");
	$signupBirthMonth = null;
	//kas pole sisse loginud
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}

	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: login.php");
		exit();
	}
	$picsDir = "../pics/";
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	$picFiles = [];

	$allFiles = array_slice(scandir($picsDir), 2);
	//var_dump($allFiles);
	foreach ($allFiles as $file){
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($fileType, $picFileTypes) == true){
			array_push($picFiles, $file);
		}
	}

	//$picFiles = array_slice($allFiles, 2);
	//var_dump($picFiles);

	$picCount = count($picFiles);

	$picNum = mt_rand(0,($picCount -1));
	$picFile = $picFiles[$picNum];
		//Tekitame sünnikuu valiku
	$signupMonthSelectHTML = "";
	$monthNamesEt = ["Digipädevused", "Andmebaaside projekteerimine", "Operatsioonisüsteemid", "Õppimine kõrgkoolis", "Programmeerimise alused", "Veebiprogrammeerimine", "Praktiline matemaatika"];
	$signupMonthSelectHTML .= '<select name="signupBirthMonth">' ."\n";
	$signupMonthSelectHTML .= '<option value="" selected disabled>aine</option>' ."\n";
	foreach ($monthNamesEt as $key=>$month){
		if ($key + 1 === $signupBirthMonth){
			$signupMonthSelectHTML .= '<option value="' .($key + 1) .'" selected>' .$month .'</option>' ."\n";
		} else {
		$signupMonthSelectHTML .= '<option value="' .($key + 1) .'">' .$month .'</option>' ."\n";
		}
	}
	$signupMonthSelectHTML .= "</select> \n";




?>
<?PHP
  if(!empty($_FILES['uploaded_file']))
  {
    $path = $_POST['drop'];
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Ovad corparation</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">

<div id="header">

</div>
<div id="logo">
	<h1><a href="#">TLU</a></h1>
	<h2>Õppematerjalid</h2>
</div>

<hr />

<div id="page">

	<div id="content">
		<div class="post">
			<div class="entry">
			<p class="title"><strong><?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?></strong></p>

			<h3 class="title"><a href="?logout=1">Logi välja!</a></h3>
			<p><strong>Õppematerjalide jagamise leht</strong> </p>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Digipadevus/Digipadevus.php">Digipädevused</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Operatsioonisusteemid/Operatsioonisusteemid.php">Operatsioonisüsteemid</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Andmebaaside_projekteerimine/Andmebaaside_projekteerimine.php">Andmebaaside projekteerimine</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Oppimine_korgkoolis/Oppimine_korgkoolis.php">Õppimine korgkoolis</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Praktiline_matemaatika/Praktiline_matemaatika.php">Praktiline matemaatika</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Programmeerimise_alused/Programmeerimise_alused.php">Programmeerimise alused</a></h2>
			<h2 class="title"><a href="http://greeny.cs.tlu.ee/~blinkons/ovad/ained/Veebiprogrammeerimine/Veebiprogrammeerimine.php">Veebiprogrammeerimine</a></h2>
			
</body>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="main.php" method="POST">
    <p>Upload your file</p>
	<select id="drop" name="drop">
      <option value="ained/Digipadevus/">Digipädevused</option>
      <option value="ained/Andmebaaside_projekteerimine/">Andmebaaside_projekteerimine</option>
      <option value="ained/Operatsioonisusteemid/">Operatsioonisusteemid</option>
      <option value="ained/Oppimine_korgkoolis/">Oppimine_korgkoolis</option>
      <option value="ained/Programmeerimise_alused/">Programmeerimise_alused</option>
      <option value="ained/Veebiprogrammeerimine">Veebiprogrammeerimine</option>
      <option value="ained/Praktiline_matemaatika/">Praktiline_matemaatika</option>
    </select>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
      <div class="sticky-image-wrapper">
       <img src="https://media.giphy.com/media/wtgpiXTZKOyTS/giphy.gif" />
    </di>
</body>
</html>
