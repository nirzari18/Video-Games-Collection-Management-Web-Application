<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>View Collection</title>
		
	</head>
	<body>
	<?php 
				
			try{
			$db = new PDO('mysql:host=localhost;dbname=gameproject',"root","root");
			$query = $db->prepare('SELECT game.GameTitle, console.ConsoleName, publisher.PublisherName, Collection.CollectionFormat, Collection.Content, Collection.Condition, Collection.Price, Collection.MarketValue, Collection.TransactionDate, Collection.SellStatus from game_release INNER JOIN game ON game.GameID = game_release.GameID INNER JOIN console ON console.ConsoleID = game_release.ConsoleID INNER JOIN publisher ON publisher.PublisherID = game_release.PublisherID INNER JOIN Collection ON collection.ReleaseID = Game_Release.ReleaseID ORDER BY Collection.CollectionID DESC');
			$query->execute();
			}catch(PDOException $e){
				echo "Error: " . $e->getMessage();
				die();
			}
		?>
	 
<form action="SelectRelease.php" method="GET">		
	<div id="templatemo_container">
	<div id="templatemo_site_title_bar">
		<div id="site_title" style="width:80%">
			<h1 ><center>Game Collection
			<center></h1>
			
		</div>
		<div id="" style="width:20%">
		<?php
	
                if(isset($_GET['home']))
                {
                    header('Location:HomeScreen.php');
                    exit;
                }
?>	
		<input type="submit" value="Return to Home Page" name="home" style=" height:50px; width:250px;font-weight:bold" />
		</div>
	</div>
	<!-- end of templatemo_site_title_bar -->

	<br/>
	<h3>Please Select the release.</h3>
	<table border="1px">
		<tr>
			<td><b>Game Name</b></td>
			<td><b>Console Name</b></td>
			<td><b>Publisher Name</b></td>
			<td><b>Completeness</b></td>
			<td><b>Content</b></td>
			<td><b>Condition</b></td>
			<td><b>Price</b></td>
			<td><b>Market Value</b></td>
			<td><b>Transaction Date</b></td>
			<td><b>SellStatus</b></td>
			
		</tr>
		<?php 
			while($row = $query->fetch()){ ?>
			<tr>
			<td><?php echo $row["GameTitle"]; ?></td>
			<td><?php echo $row["ConsoleName"]; ?></td>
			<td><?php echo $row["PublisherName"]; ?></td>
			<td><?php echo $row["CollectionFormat"]; ?></td>
			<td><?php echo $row["Content"]; ?></td>
			<td><?php echo $row["Condition"]; ?></td>
			<td><?php echo $row["Price"]; ?></td>
			<td><?php echo $row["MarketValue"]; ?></td>
			<td><?php echo $row["TransactionDate"]; ?></td>
			<td><?php echo $row["SellStatus"]; ?></td>
			
			</tr>	
			<?php }
		?>
	</table>
	
</div>
</form>
</body>

<style>
body{ 
  background: url("./background.jpg") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body{
    width: 800px;
    height: 50px;
    overflow: scroll;
    position: relative;
    border: 1px solid #000;
	margin:10px;
 
    background-color: White;
 
  -webkit-border-radius: 5px;
  border-radius: 5px;
 
  -webkit-box-shadow: inset 0px 2px 2px rgba(0, 0, 0, .5), 0px 1px 0px rgba(250, 250, 250, .2);
  box-shadow: inset 0px 2px 2px rgba(0, 0, 0, .5), 0px 1px 0px rgba(250, 250, 250, .2);
}
table{
	font-weight:bold;
	font-size:15px;
	
}
h1{
	margin-bottom:25px;
	
}
#site_title{
margin-bottom:15px;	
}
</style>
</html>
