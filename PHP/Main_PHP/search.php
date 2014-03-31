<?php
    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
?>

<!DOCTYPE html > 
<html lang="en">
<head>
		<title>Search</title>
		<meta charset="utf-8" />
 	  	<link rel="stylesheet" type="text/css" href="../../CSS/music_pages.css"/>

 	<script>
 		function AddAlert(){
			alert('This has been added to your basket')
		}
	</script>
	
</head>
	<div id="body">
		<body>

			<div id="header">
				<header>
		 			<h1>Midnight Music</h1>
		 			<h2>"The Home of Real Music"</h2>
		 			<h3>Music - Search</h3>

		 			<nav id="nav-menu">
 					<ul>
 						<li><a href="../../Home.html">Home</a></li>
  						<li><a href="../../music.html">Music</a>
  						<li><a href="show_all.php">Genres</a>	
  						<ul>
  							<li><a href="jazz.php">Jazz</a></li>
  							<li><a href="rock.php">Rock</a></li>
  							<li><a href="punk.php">Punk</a></li>
  						</ul>
  						</li>
						<li><a href="basket.php">Basket</a></li>
						<li><a href="Search_Music.php">Search</a></li>
  					</ul>
					
  					</nav>
		 		</header>
				
			</div>

			<div id="wrapper">
				<div id="leftcolumn_whereami">
		  		<h2>Where Am I</h2>
		  		<ul>
		  			<li>- Music</li>
		  			<li>-- Search Result</li>
		  		</ul>
		  		<hr>
		  		<h2>Useful Links<h2>
		  			<div id="useful_links">
		  			<ul>
		  				<li><a href="http://www.glastonburyfestivals.co.uk/">Glastonbury Festival</a></li><br/>
		  				<li><a href="http://www.readingandleedsfestival.com/">Reading and Leeds</a></li><br/>
		  				<li><a href="http://www.tinthepark.com/home.aspx">T in the Park</a></li><br/>
		  				<li><a href="http://www.nme.com/">NME Magazine</a></li><br/>
		  				<li><a href="http://www.rollingstone.com">Rolling Stone</a></li><br/>
		  				<li><a href="http://www.ticketmaster.co.uk/">Ticketmaster</a></li>
		  				
		  			</ul>
		  			</div>
		  		</div>

		  		<div id="rightcolumn_newreleases">
		  			<h2>New Releases</h2>
					<p>New for Christmas!!</p>
					<a href="jazz.php">
					<img src="../../Images/FrankSinatra.jpg" alt="Go to Jazz"></a>
					<p>The Sinatra Christmas Album</p>
					<hr>
					<p>Releases from this year</p>
					<a href="rock.php">
					<img src="../../Images/ArcticMonkeys.jpg" alt="Go to Rock"></a>
					<p>AM - Arctic Monkeys</p>


		  		</div>

				<div id="contentcolumn">


					<?php
            				$basket = array();
            				if(isset($_COOKIE["shop_cookie"])){
                				$result = mysqli_query($connect, "SELECT * FROM Basket WHERE User_ID='".$_COOKIE['shop_cookie']."'");
               				while($product = mysqli_fetch_object($result)){
                    					$basket[] = $product->Product_ID;
                				}                

                			echo "<br/>";
                			echo '<p><a href="basket.php">Your basket ('.count($basket).')</a></p>';
                			echo "<br/>";
            				}
        				?>

				<?php
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
		  				echo "<td>$product->Genre</td>";
		  				echo "<td>$product->Artist</td>";
		  				echo "<td>$product->Album</td>";
		  				echo "<td>$product->Release_Date</td>";
		  				echo "<td>$product->Description</td>";
		  				echo "<td><i>&pound $product->Price</i></td>";
		  				echo "</tr>";
		  				echo "</table>";
		  
		  			if(in_array($product->ID, $basket)){
                    		echo '<p>This item is in your basket</p>';
                    		echo "<br />";
                    		echo "<br />";
                    		echo "<br />";
                			}
               			else{
                    		echo '<form onClick="AddAlert(this)" type="hidden" method="get" name="redirect" value="./Main_PHP/jazz.php"><a href="../add_to_basket.php?id='.$product->ID.'">Add to basket</a></form>';
                    		echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
                    		echo "<br />";
                    		echo "<br />";
                    		echo "<br />";
                    		echo "<br />";

                			}
            			};

					
				} else {
					echo 'NO RESULT FOUND';
					echo "<br/>";
					echo "<br/>";	
					echo "<a href=\"javascript:history.go(-1)\">Search Again</a>";
				};
				?>

				<hr>
			</div>
		</div>

		  	<div>
		  		<footer>
		  		<a href = "../../Feedback.html">Give us Feeback</a>
		  		</footer>
		  	<div>

		</body>
	</div>
</html>

<?php			
	mysqli_close($connect);
?>