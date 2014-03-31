<!DOCTYPE html >
<html lang="en">
<head>
 	  <title>Search Music</title>
 	  <meta charset="utf-8" />
 	  <link rel="stylesheet" type="text/css" href="../../CSS/music_pages.css"/>

 	<script>
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
		 			<h3><a href="">Search Music</a></h3>

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
		  			<li>-- Search</li>
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
		  			<br/><br/>
		  			<p>Search the music catalogue by Artist Name, Album Name or Release Date</p><br/>
		  			<h2>Search</h2>

		  			<form method="get" action="search.php" enctype="text/plain">
		  			<select name="Search_by">
						<option value="Artist">Artist Name</option>
						<option value="Album">Album name</option>
						<option value="Release_Date">Release Date</option>
					</select>	
					<input type="text" name="Search_Term" placeholder="Search" required><br /><br/>
					<input type="submit" value="Search">
					</form>
					<br/><br/><br/>
					<img src="../../Images/Punk_Collage.jpg" alt="Go to Punk">
					<img src="../../Images/Jazz_Collage.jpg" alt="Go to Punk">
					<img src="../../Images/Jazz_Collage.jpg" alt="Go to Punk">
					<img src="../../Images/Rock_Collage.jpg" alt="Go to Punk">
					<hr>

		  		</div>
		  	</div>		
		  	
		  	<div>
		  		<footer>
		  		<a href = "../../Feedback.html">Give us Feedback</a>
		  		</footer>
		  	</div>

		</body>
	</div>
</html>