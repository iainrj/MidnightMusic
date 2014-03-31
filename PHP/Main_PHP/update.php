<!DOCTYPE html >
<html lang="en">
<head>
 	  <title>Update</title>
 	  <meta charset="utf-8" />
 	  <link rel="stylesheet" type="text/css" href="../../CSS/basket.css"/>
</head>
	<div id="body">
		<body>

			<div id="header">
				<header>
		 			<h1>Midnight Music</h1>
		 			<h2>"The Home of Real Music"</h2>
		 			<h3><a href="../../Home.html">Go Home</a></h3>

		 		</header>
					
			</div>
			<?php
				$connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");


				mysqli_query($connect, "INSERT INTO Catalogue (Genre, Artist, Image, Description, Album) VALUES ('$_GET[Genre]', '$_GET[Artist]', '$_GET[Image]', '$_GET[Description]', '$_GET[Album]' )");
			 
			    mysqli_close($connect);
			    echo "<h1>You have succesfully added this to the catalogue</h1>";
			    
			    echo "<p> Genre: ";
			    echo "$_GET[Genre]";
			    echo "</p>";

			    echo "<p> Artist: ";
			    echo "$_GET[Artist]";
			    echo "</p>";

			    echo "<p> Album: ";
			    echo "$_GET[Album]";
			    echo "</p>";

			    echo "<p> Image: ";
			    echo "$_GET[Image]";
			    echo "</p>";

			    echo "<p> Description: ";
			    echo "$_GET[Description]";
			    echo "</p>";

			?>


		</body>
	</div>
</html>		