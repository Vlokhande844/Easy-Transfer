<?php
session_start();
$sender=$_SESSION["name"];
include('NavigationBar.php');
include('config.php');
//selecting data to show
$sql = "SELECT * FROM `allusers`";
$result = mysqli_query($con, $sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="sweet\node_modules\sweetalert\dist\sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="sweet\node_modules\sweetalert\dist\sweetalert.css">


    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <section class="container transfer">
        <form action="transferComplete.php" method="POST">
            <!-- <div class="part"> -->
            <label for="Sname">Sender</label><br>
            <select name="Sname" id="Sname">
                <option value="<?php echo $sender;?>" selected><?php echo $sender;?>
                </option>
            </select><br>

            <label for="Rname">Select Receiver</label><br>
            <select name="Rname" id="Rname" required>
                <option value="" disabled selected>Select reciever</option>
                <?php
                    $query = "SELECT * FROM `allusers` ORDER BY `allusers`.`name` ASC";
                    $query_run = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                    }
                    mysqli_close($con);
                ?>
            </select>
            <label for="amount"><br>Enter Amount</label><br>
            <input type="number" name="amount" id="amount" placeholder="Amount(in Rs)" required>
            <div class="container sender-btn">
                <button class="btn" type="submit" id="amount_value">Submit &#10004;&#65039;</button>

                <a href="UserSelection.php" class="btn">Back  &#8626; </a>
        
            </div>
                <!-- </div>   END OF PART CLASS -->
        </form>
    </section>
</body>
</html>