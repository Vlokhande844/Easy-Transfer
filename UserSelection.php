<?php

include('NavigationBar.php');
include('config.php');

//selecting data to show
$sql = "SELECT * FROM `allusers` order by name ASC";
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
    <section class="container">
        <form action="SingleUser.php" method="POST">
            <section>

                <div>
                    <table class="center">
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Current Balance</th>
                        </tr>
                        <?php 
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;
                                echo "<tr>
                                <td scope='row'>". $sno . "</td>
                                <td>". $row['Name'] . "</td>
                                <td>". $row['Balance'] . "</td>
                                </tr>";
                            }
                                
                        ?>
                    </table>
                </div>
            </section>
            <section class="container drop-down">
                <label for="names">Select user (Sender) : </label><br>
                <select name="name" id="name" required>
                    <option value="" disabled selected>Choose user</option>
                    <?php
                        $query = "SELECT * FROM `allusers` ORDER BY `allusers`.`Name` ASC";
                        $query_run = mysqli_query($con, $query);
            
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                        }
                        mysqli_close($con);
                    ?>
                </select>
                <div class="container">
                    <button class="btn" type="submit">Submit &#10004;&#65039; </button>
                    <a href="index.php" class="btn">Home &#127968; </a> 
                </div>
            </section>
        </form>
    </section>
    
 
</body>
</html>

