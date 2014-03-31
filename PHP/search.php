<?php
    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
?>

<!DOCTYPE html > 
<html lang="en">
	<head>
		<title>Search</title>
		<meta charset="utf-8" />
 	  	<link rel="stylesheet" type="text/css" href="../CSS/music_pages.css"/>
	</head>
	<div id="body">
		<body>

			<div id="header">
				<header>
		 			<h1>Midnight Music</h1>
		 			<h2>"The Home of Real Music"</h2>
		 			<h3>Music - Jazz</h3>

		 			<nav id="nav-menu">
 					<ul>
 						<li><a href="../../Home.html">Home</a></li>
  						<li><a href="../../music.html">Music</a>
  						<ul>
  							<li><a href="jazz.php">Jazz</a></li>
  							<li><a href="rock.php">Rock</a></li>
  							<li><a href="punk.php">Punk</a></li>
  						</ul>
  						</li>
						<li><a href="./PHP/basket.php">Basket</a></li>
  					</ul>
					
  					</nav>
		 		</header>
			
			</div>

			<div id="wrapper">
				<nav id="leftcolumn_genres">
		  			<h2>Genres</h2>
		  		</nav>

		  		<div id="rightcolumn_links">
		  			<h2>New Releases</h2>
		  		</div>

				<div id="contentcolumn">	

					<?php 	// Basket code from Will's cookie scripts
            				$basket = array();
            				if(isset($_COOKIE["shop_cookie"])){
                				$result = mysqli_query($connect, "SELECT * FROM Basket WHERE User_ID='".$_COOKIE['shop_cookie']."'");
               				while($product = mysqli_fetch_object($result)){
                    					$basket[] = $product->Product_ID;
                				}                

                			echo '<p><a href="../basket.php">Your basket ('.count($basket).')</a></p>';
            				}
        				?>

				<?php 	// Search script and output result
				$search_Term = (isset($_GET['Search_Term']) ? $_GET['Search_Term'] : null);
				$search_Field = (isset($_GET['Search_by']) ? $_GET['Search_by'] : null);

				$connect = new mysqli('ephesus.cs.cf.ac.uk', 'c1312579', 'berlin', 'c1312579');
					if (mysqli_connect_errno()) {
						printf("Connect failed: %s\n", mysqli_connect_error());
						exit();
					}			

				$query = "SELECT * FROM Catalogue WHERE " . $search_Field . " = '" . $search_Term . "'";
				$result = $connect->query($query) or die($connect->error.__LINE__);

				if($result->num_rows > 0) {
					while($product = mysqli_fetch_object($result)){
	         				echo "<table border='1'>";
		  				echo "<tr>";
		  				echo "<th></th>";
		  				echo "<th>Genre</th>";
		  				echo "<th>Artist</th>";
		  				echo "<th>Album</th>";
		  				echo "<th>Release Date</th>";
		  				echo "<th>Description</th>";
		  				echo "<th>Price</th>";
		  				echo "</tr>";

		  				echo "<tr>";
		  				echo "<td><img src='$product->Image'/></td>";
		  				echo "<td>Genre: $product->Genre</td>";
		  				echo "<td>Artist: $product->Artist</td>";
		  				echo "<td>Album: $product->Album</td>";
		  				echo "<td>Release Date: $product->Release_Date</td>";
		  				echo "<td>Description: $product->Description</td>";
		  				echo "<td><i>&pound $product->Price</i></td>";
		  				echo "</tr>";
		  				echo "</table>";
		  
		  			if(in_array($product->ID, $basket)){
                    				echo '<p>This item is in your basket</p>';
                			}
               			else{
                    				echo '<p><a href="../add_to_basket.php?id='.$product->ID.'">Add to basket</a></p>';
                			}
                			echo '</li>';
            			};

					
				} else {
					echo 'NO RESULT FOUND';	
				};


			
				mysqli_close($connect);
				?>
	</body>
</html>