<?php
    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
?>

<!DOCTYPE html >
<html lang="en">
<head>
 	  <title>Music</title>
 	  <meta charset="utf-8" />
 	  <link rel="stylesheet" type="text/css" href="../../CSS/music_pages.css"/>

	 <script>
	 	function changeDisplay(){
			document.forms.sort_form.submit();
		}
			// Function to submit the form for the user
		function AddAlert(){
			alert('This has been added to your basket')
		}
			// Function to alert the user when they add something to the basket 
	 </script>

</head>
	<div id="body">
		<body>

			<div id="header">
				<header>
		 			<h1>Midnight Music</h1>
		 			<h2>"The Home of Real Music"</h2>
		 			<h3><a href="">Music - Show All</a></h3>

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
			  			<li>-- Show All</li>
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
		  			<h2>All Music</h2>

					<form method="get" action="show_all_sort.php" enctype="text/plain" id="sort_form">	
					<label for="Sort">Sort By Ascending or descending</label><br /><br/>
					<select name="Sort_by" onchange="changeDisplay()">
						<option value="" selected></option>
						<option value="Price">Price</option>
						<option value="Album">Album Name</option>
						<option value="Artist">Artist Name</option>
					</select>
					<input type="radio" name="order" value="ASC" checked>Ascending</input>
					<input type="radio" name="order" value="DESC">Descending</input>

					</form>
					<br/>	

					<?php
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
           			$result = mysqli_query($connect, "SELECT * FROM Catalogue");
            		while($product = mysqli_fetch_object($result)){
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
					  	echo "<td>$product->Album</td>";
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
		  		<a href = "../../Feedback.html">Give us Feedback</a>
		  		</footer>
		  	<div>

		</body>
	</div>
</html>

<?php
    mysqli_close($connect);
?>