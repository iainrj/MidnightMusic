<?php
    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
?>

<!DOCTYPE html >
<html lang="en">
<head>
 	  <title>Home</title>
 	  <meta charset="utf-8" />
 	  <link rel="stylesheet" type="text/css" href="../../CSS/music_pages.css"/>

	 <script>
	 	function changeDisplay(){
			document.forms.sort_form.submit();
		}
		// Submit the form without the user needing to click a button
	 </script>
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
  						<li><a href="show_all.php">Genres</a>
  						<ul>
  							<li><a href="jazz.php">Jazz</a></li>
  							<li><a href="rock.php">Rock</a></li>
  							<li><a href="punk.php">Punk</a></li>
  							<li><a href="show_all.php">Show All</a></li>
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
		  			<li>-- Jazz</li>
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
		  			<h2>Music</h2>

					<a href="javascript:history.go(-1)">Go Back</a>	<!-- Return the user to the last page-->

					<?php 	// Basket code via Will
            				$basket = array();
           					if(isset($_COOKIE["shop_cookie"])){
                				$result = mysqli_query($connect, "SELECT * FROM Basket WHERE User_ID='".$_COOKIE['shop_cookie']."'");
                				while($product = mysqli_fetch_object($result)){
                    				$basket[] = $product->Product_ID;
                				}                

                				echo '<p><a href="basket.php">Your basket ('.count($basket).')</a></p>';
            					}
        				?>




						<?php
							// Sort the items on the page amd output the result
						    $sort_by = $_GET['Sort_by'];
						    $sort_asc_desc = $_GET['order'];
						    $genre = $_GET['Genre'];

						    $query = mysqli_query($connect, "SELECT * FROM Catalogue WHERE Genre = $genre ORDER BY $sort_by $sort_asc_desc");
						    $sort_by = preg_replace('/[^\p{L}\p{N}\s]/u', '', $sort_by);
						    echo "<h2>$sort_by</h2>";
						    
						    while($product = mysqli_fetch_object($query)){
						    	echo "<table border='1' align='center'>";
								echo "<tr>";
								echo "<th></th>";
								echo "<th>Genre</th>";
								echo "<th>Artist</th>";
								echo "<th>Album</th>";
								echo "<th>Price</th>";
								echo "</tr>";

								echo "<tr>";
								echo "<td><img src='$product->Image'/></td>";
								echo "<td>$product->Genre</td>";
								echo "<td>$product->Artist</td>";
								echo "<td> $product->Album</td>";
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
				                	echo '<a href="more_info.php?id='.$product->ID.'">More Info</a>';
				                    echo '<form onClick="AddAlert(this)" type="hidden" method="get" name="redirect" value="./Main_PHP/jazz.php"><a href="../add_to_basket.php?id='.$product->ID.'">Add to basket</a></form>';
						      		echo "<br />";
						      		echo "<br />";
						      		echo "<br />";
						      		echo "<br />";
				                }
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