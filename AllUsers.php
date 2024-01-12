<?php 
include('NavigationBar.php');
include('config.php');

//selecting data to show
$sql = "SELECT * FROM `allusers` where 1";
$result = mysqli_query($con, $sql);
mysqli_close($con);

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
      <section class="container">
         <div style="overflow-x:auto;">
            <table class="center">
                <tr>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Balance</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) { 
                    $sn=1;
                    while($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $sn; ?> </td>
                            <td><?php echo $data['Name']; ?> </td>
                            <td><?php echo $data['Email']; ?> </td>
                            <td><?php echo $data['Balance']; ?> </td>

                        <tr>
                <?php
                    $sn++;}} else { ?>
                    <tr>
                        <td colspan="8">No data found</td>
                    </tr>
                <?php } ?>
                </table>
        </div>
        <div class="primary">
            <a href="./UserSelection.php" class="btn">Select User &#128204; </a>
            <a href="./index.php" class="btn">Home &#127968; </a>

        </div>
    </section> 


    
</body>
</html>
                        
    
		