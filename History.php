<?php
 include('NavigationBar.php');
 include('config.php');
 $sql = "SELECT * FROM `transfer_history`";
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
<section>
         <div style="overflow-x:auto;">
            <table class="center">
                <tr>
                    <th>Sno.</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Time</th>
                </tr>
                <?php 
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno+1;
                        echo "<tr>
                        <th scope='row'>". $sno . "</th>
                        <td>". $row['Sender'] . "</td>
                        <td>". $row['Receiver'] . "</td>
                        <td>". $row['Amount'] . "</td>
                        <td>". $row['Time'] . "</td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </section>
 
</body>
</html>