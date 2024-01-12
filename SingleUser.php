<?php
include('NavigationBar.php');
include('config.php');

//selecting data to show
$sql = "SELECT * FROM `allusers`";
$result = mysqli_query($con, $sql);
// mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container sender">
        <?php
        session_start();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $sender = $_POST['name'];
                $_SESSION["name"] =  $sender;
                $query = "SELECT * FROM allusers WHERE name ='$sender'";
			    $result = mysqli_query($con,$query);
			    $customer = mysqli_fetch_assoc($result);
                echo "<h1>Sender's Details</h1><br><br><br><br><br><br>
                <h2> Name: " .$sender. "</h2><br><br><br>
                <h2> Email: " .$customer['Email']. "</h2><br><br><br>
                <h2> Current Balance(in Rs.) : " .$customer['Balance']. "</h2><br><br><br>";
            }
        ?>

        <div class="container center">
		<a href="transfer.php" class="btn">Transfer &#128176;</a>
		<a href="UserSelection.php" class="waves-effect waves-light btn black z-depth-2">Back &#8626;</a>
	<div>

    </div>
    
</body>
</html>