<?php
if (!session_id()) {
    session_start();
}
if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
}
header('Location: landing.php');
?>
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui"> 
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nemesis Twitter Bot Landing Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
</head>

<body class="mainlanding">
    <div class="landingblock">
    <div class="landingheader">
        <div style="display: flex;flex-direction: row;justify-content: center;">
        	<h2>Nemesis Tweetbot</h2>
        </div>
			<div id="landingbuttons">
	        <button class="loginrdr"><a href="signin.php">Login</a></button>
	        <button class="signuprdr"><a href="signup.php">Signup</a></button>
			</div>
    </div>
    <div class="landingcnt">
        <h2>Enjoy your newsfeed</h2>
           <h2>in 3 simple steps:</h2>
        <div class="align">
			<img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341619/Team%20Nemesis_twitterBot/wifi_icon_mjyfgk.svg" alt="wifi icon" />
            <p>Connect twitter account</p>
            <img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341614/Team%20Nemesis_twitterBot/download_icon_njf4hm.svg" alt="download icon" />
            <p>Save Tweet directly from twitter to external drive</p>
            <img class="grow" src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341616/Team%20Nemesis_twitterBot/file_icon_a8sddq.svg" alt="file icon" />
            <p>Enjoy viewing favorite tweet on external drive at leisure</p>
        </div>
    </div>
    
    </div>
</body>

</html> -->