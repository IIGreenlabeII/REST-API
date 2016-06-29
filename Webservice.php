<?php
//function multiexplode($delimiters,$string)
//{
//	$ready = str_replace($delimiters, $delimiters[0], $string);
//	$launch = explode($delimiters[0], $ready);
//	return $launch;
//}
//$Url = $_SERVER['REQUEST_URI'];
//$parts = parse_url($Url);
//$explode = multiexplode(array("/","."), $parts['path']);
//$product = $explode[3];
//$q = $explode[4];
//$naam = $explode[5];
//$type = $explode[6];
$db_host        = 'stud.hosted.hr.nl';
$db_user        = '0857185';
$db_password    = '4615425c';
$db_database    = '0857185';
$db_table		= 'Api_webstore';
$dbLink = mysqli_connect($db_host, $db_user,$db_password, $db_database);

//Alle producten in JSON gesorteerd op ID
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'all' && $_GET['name'] == 'summary')
{
	header('Content-type: application/json');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table");
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	echo $output;
	mysqli_close($dbLink);
}

//Alle producten in XML gesorteerd op ID
elseif($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'all' && $_GET['name'] == 'summary')
{
	header ("Content-Type:text/xml");
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table");
		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);
}

//Alle producten in JSON gesorteerd op prijs van hoog naar laag
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'price' && $_GET['name'] == 'descent')
{
	header('Content-type: application/json');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Price 
									DESC");
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	echo $output;
	mysqli_close($dbLink);
}

//Alle producten in XML gesorteerd op prijs van hoog naar laag
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'price' && $_GET['name'] == 'descent')
{
	header('Content-type: text/xml');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Price 
									DESC");

		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);
}

//Alle producten in JSON gesorteerd op prijs van laag naar hoog
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'price' && $_GET['name'] == 'ascent')
{
	header('Content-type: application/json');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Price 
									ASC");
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	echo $output;
	mysqli_close($dbLink);
}

//Alle producten in XML gesorteerd op prijs van laag naar hoog
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'price' && $_GET['name'] == 'ascent')
{
	header('Content-type: text/xml');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Price ASC");

		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);
}

//Alle producten in JSON gesorteerd op kleur
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'colors' && $_GET['name'] == 'summary')
{
	header('Content-type: application/json');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Color");
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	echo $output;
	mysqli_close($dbLink);
}

//Alle producten in XML gesorteerd op kleur
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'colors' && $_GET['name'] == 'summary')
{
	header('Content-type: text/xml');
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									ORDER BY Color");
		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);
}

//enkele product in JSON
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['name'] == 'details')
{
	header('Content-type: application/json');
	$getid = $_GET['q'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE ProductId = $getid");
	
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	mysqli_close($dbLink);

	if(empty($jsonData))
	{
		header('HTTP/1.1 404 Not Found');
	}
	else
	{
		echo $output;
	}

}

//producten gesorteerd op kleur JSON
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'color')
{
	header('Content-type: application/json');
	$getid = $_GET['name'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE Color = '$getid'");
	
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	mysqli_close($dbLink);

	if(empty($jsonData))
	{
		header('HTTP/1.1 404 Not Found');
	}
	else
	{
		echo $output;
	}
}

//producten gesorteerd op merk JSON
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'json' && $_GET['q'] == 'brand')
{
	header('Content-type: application/json');
	$getid = $_GET['name'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE Brand = '$getid'");
	
	$jsonData = array();
		while ($array = mysqli_fetch_object($target))
			{
				$jsonData[] = $array;
			}
	$output = json_encode($jsonData);
	mysqli_close($dbLink);

	if(empty($jsonData))
	{
		header('HTTP/1.1 404 Not Found');
	}
	else
	{
		echo $output;
	}
}

//enkele product in XML
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['name'] == 'details')
{
	header('Content-type: text/xml');
	$getid = $_GET['q'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE ProductId = $getid");

	while($row = mysqli_fetch_array($target)){

		$output = '<xml version="1.0" encoding="utf-8">';
		$output .= "<product>";
		$output .= "<productid>".$row['ProductId']."</productid>";
		$output .= "<title>".$row['Title']."</title>";
		$output .= "<brand>".$row['Brand']."</brand>";
		$output .= "<price>".$row['Price']."</price>";
		$output .= "<size>".$row['Size']."</size>";
		$output .= "<productimage>".$row['ProductImage']."</productimage>";
		$output .= "<color>".$row['Color']."</color>";
		$output .= "</product>";
		$output .= '</xml>';
	}
	mysqli_close($dbLink);

	if(empty($output))
	{
		header('HTTP/1.1 404 Not Found');
	}
	else
	{
		echo $output;
	}
}

//producten gesorteerd op kleur JSON
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'color')
{
	header('Content-type: text/xml');
	$getid = $_GET['name'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE Color = '$getid'");

		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);

	if(empty($target))
	{
		header('HTTP/1.1 404 Not Found');
	}
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['type'] == 'xml' && $_GET['q'] == 'brand')
{
	header('Content-type: text/xml');
	$getid = $_GET['name'];
	$target = mysqli_query($dbLink, "SELECT * FROM $db_table 
									WHERE Brand = '$getid'");

		echo '<xml version="1.0" encoding="utf-8">';
	while($row = mysqli_fetch_array($target)){
		echo "<product>";
		echo "<productid>".$row['ProductId']."</productid>";
		echo "<title>".$row['Title']."</title>";
		echo "<brand>".$row['Brand']."</brand>";
		echo "<price>".$row['Price']."</price>";
		echo "<size>".$row['Size']."</size>";
		echo "<productimage>".$row['ProductImage']."</productimage>";
		echo "<color>".$row['Color']."</color>";
		echo "</product>";		
	}
		echo "</xml>";
	mysqli_close($dbLink);

	if(empty($target))
	{
		header('HTTP/1.1 404 Not Found');
	}
}

//een product invoeren
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
//[
//{
//	"productid": 3,
//	"title": "Cookie",
//    "brand": "Jack & Jones",
//    "price": "15 euro",
//    "size": "S",
//    "productimage": "YESS",
//    "color": "Green"
//}
//]
	$postData = file_get_contents("php://input");

		$jsonData = json_decode($postData, true);

		$title = $jsonData[0]["title"];
		$brand = $jsonData[0]["brand"];
		$price = $jsonData[0]["price"];
		$size  = $jsonData[0]["size"];
		$productimage = $jsonData[0]["productimage"];
		$color = $jsonData[0]["color"];

		$insertQuery = "INSERT INTO Api_webstore(Title, Brand, Price, Size, ProductImage, Color) 
						VALUES('$title', '$brand', '$price', '$size', '$productimage', '$color')";

		// Gooi de foutmelding er uit als hij het niet doet
        if (!mysqli_query($dbLink, $insertQuery)){
            die('Error: ' . mysqli_error());
        }
        echo "Er is een product toegevoegd";
}

//een product aanpassen
if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
//{
//	"productid": 3,
//	"title": "Cookie",
//    "brand": "Jack & Jones",
//    "price": "15 euro",
//    "size": "S",
//    "productimage": "YESS",
//    "color": "Green"
//}
		$putData = file_get_contents("php://input");

		$jsonData = json_decode($putData, true);

		$productid    = $jsonData["productid"];
		$title 		  = $jsonData["title"];
		$brand 	  	  = $jsonData["brand"];
		$price 		  = $jsonData["price"];
		$size  		  = $jsonData["size"];
		$productimage = $jsonData["productimage"];
		$color 		  = $jsonData["color"];

		$updateQeury = "UPDATE Api_webstore
						SET ProductId = '$productid', 
							Title = '$title', 
							Brand = '$brand', 
							Price = '$price', 
							Size = '$size', 
							ProductImage = '$productimage', 
							Color = '$color'
						WHERE ProductId = '$productid'";

		// Gooi de foutmelding er uit als hij het niet doet
        if (!mysqli_query($dbLink, $updateQeury)){
            die('Error: ' . mysqli_error());
        }
        echo "Het product is bijgewerkt";
}

//een product verwijderen
// /products/13/deletetrue.json
if($_SERVER['REQUEST_METHOD'] == 'DELETE' && $_GET['name'] == 'deletetrue')  
{
		$getid = $_GET['q'];
		$deleteQuery = "DELETE FROM Api_webstore
                    WHERE ProductId = $getid";

        if(!mysqli_query($dbLink, $deleteQuery)){
        	die('Error: ' . mysqli_error());
        }
        echo "Product is verwijderd!";
}
?>