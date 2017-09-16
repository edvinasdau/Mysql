<link rel="stylesheet" type="text/css" href="style.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

$prekės = [];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
   //echo "id: " . $row["Id"]. " - Name: " . $row["Name"]. " -Price " . $row["Price"]. " - Amount: " . $row["Amount"] . " - Description: " . $row["Description"] . "<br>";
    
    		echo "<table>
    			<tr>
		    		<th>Id</th>
		    		<th>Name</th>
		    		<th>Price</th>
		    		<th>Amount</th>
		    		<th>Description</th>
		    	</tr>
	    		<tr>
		    		<td>$row[Id]</td>
		    		<td>$row[Name]</td>
		    		<td>$row[Price]</td>
		    		<td>$row[Amount]</td>
		    		<td>$row[Description]</td>
	    		</tr>
	    		</table>";

    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<pre>
				<?php
				print_r(prekės);
				?>

				<?php

					foreach ($prekės as $prekė) {
						echo prekė ['Name'] . "<br>";
					}
				?>
			</pre>
		</div>
	</div>
</body>
</html>
