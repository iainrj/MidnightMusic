<?php
$connect = mysqli_connect('ephesus.cs.cf.ac.uk', 'c1312579', 'berlin', 'c1312579')
?>

<!DOCTYPE html>
<html>
<head> 
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="../../CSS/basket.css"/>

	<script>
 		function ThankAlert(){
			alert('Thank you for your custom. We hope you visit us again');
			window.location.assign("http://project.cs.cf.ac.uk/I.R.Johnston/CM1102_Coursework/Home.html");
		}
        
    </script>


</head>
<body>
	<div id="header">
				<header>
		 			<h1>Midnight Music</h1>
		 			<h2>"The Home of Real Music"</h2>
		 			<h3><a href="">Basket</a></h3>

		 			<nav id="nav-menu">
 					<nav id="nav-menu">
		 			<ul>
		 				<li><a href="../../Home.html">Home</a></li>
  						<li><a href="../../music.html">Music</a>
  						<li><a href="./PHP/Main_PHP/show_all.php">Genres</a>
						<ul>
  							<li><a href="jazz.php">Jazz</a></li>
  							<li><a href="rock.php">Rock</a></li>
  							<li><a href="punk.php">Punk</a></li>
  						</ul>
  						</li>
						<li><a href="basket.php">Basket</a></li>
						<li><a href="../Search_Music.php">Search</a></li>
  					</ul>
					
  					</nav>
		 		</header>
				
			</div>

			<div id="wrapper">
				<div id="contentcolumn">
		  			<h2>Your Basket</h2>

	<?php
		$total_price = 0.0;
		$basket = array();
		if(isset($_COOKIE["shop_cookie"])){
			$user_id = $_COOKIE["shop_cookie"]; 
			$result = mysqli_query($connect, "SELECT * FROM Basket WHERE User_ID='$user_id'");
			while($product = $result->fetch_object()){
				$product_id = $product->Product_ID;
				$item = mysqli_query($connect, "SELECT * FROM Catalogue WHERE ID=$product_id");
				$basket[] = $item->fetch_object();
			}

			echo "<br />";
			echo "<br />";

		}
		if(count($basket) == 0){
			echo "<h2>Your shopping basket is empty! <a href='basket.php'>Return to Basket</a></h2>";
		}
		else{
			echo "<h2>Not finished yet? <a href='../../music.html'>Continue shopping</a></h2>";
		}

		$total_price = 0.0;
		for($i = 0; $i < count($basket); $i++){
			echo "<table>";
			echo "<tr>";
			echo "<td>".($i + 1)."</tr>";
			echo "<td><img src=".$basket[$i]->Image."></tr>";
			echo "<td>".$basket[$i]->Album."</tr>";
			echo "<td><i>&pound;".$basket[$i]->Price."</i></tr>";
			echo "<td><a href='../remove_from_basket.php?id=".$basket[$i]->ID."'>Remove from Basket</a></td>";
			echo "<br />";
			echo "</tr>";
			echo "</table>";
            $total_price = $total_price + $basket[$i]->Price;
        }


       ?>

        <h3>
		<?php 
		if(count($basket) == 0){
		}
		else{
			echo "TOTAL COST = &pound;";
			echo $total_price; 
			echo "<br />";
			echo "<button onClick='ThankAlert(this)' id='pay'><strong>Pay<strong></button>";
		}

			$item_id = (isset($_GET['id']) ? $_GET['id'] : null);
   			$user_id = null;

		    if(isset($_COOKIE["shop_cookie"])){
		        $user_id = $_COOKIE["shop_cookie"];        
		    }
		    else{
		        header('Location: ../Home.html');    
		    }

		    $connect = mysqli_connect("ephesus.cs.cf.ac.uk","c1312579","berlin","c1312579");
		    mysqli_query($connect, "DELETE FROM Basket WHERE 
		                        User_ID = '$user_id' 
		                        ");

		    mysqli_close($connect);

		?>
	</h3>

    </div>
    		<div>
		  		<footer>
		  		<a href = "../../Feedback.html">Give us Feeback</a>
		  		</footer>
		  	</div>
    	</body>
	</div>
</html>