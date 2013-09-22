<?php
  	// variables 
	$usd=0;
	$btc=1;
  	$mysql="DBURL";
  	$user="DBUser";
 	$pass="DBPass";
	$db="DB";
	$coindeskapi="http://api.coindesk.com/v1/bpi/currentprice.json";
	$btccurrency_id="6";

  	// get btc value in usd using coin desk api
  	$jsonData = file_get_contents($coindeskapi);
	$postData = json_decode($jsonData, true);
	$usd = $postData["bpi"]["USD"]["rate"];

	// calculate how many btc I would get for $1 USD rounded to 6 decimal places
	$btcusd1 = ($btc / $usd);
	$btcusd1rnd = round($btcusd1, 6);	

	// login to mysql and insert value of $btcusd1rnd into database $db table currencies row Bitcoin value
	// Create Connection
	$con = mysqli_connect($user,$mysql,$pass,$db);
	// Check connection
	if (mysqli_connect_errno())
  	{
 		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	mysqli_query($con, "UPDATE currencies SET value=$btcusd1rnd WHERE currencies_id=$btccurrency_id")
          or die (mysql_error());

	mysqli_close($con);

?>

