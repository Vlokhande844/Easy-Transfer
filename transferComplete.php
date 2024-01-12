<?php
include('NavigationBar.php');
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
  


    <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

</head>
<body>
    <div class="container final center">
<div class="finish">
        <?php

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $sender = $_POST['Sname'];
                $receiver = $_POST['Rname'];
                $amount = $_POST['amount'];
            }

            if( $sender != $receiver && $amount>0){
                $sender_query = "SELECT * FROM allusers WHERE name ='$sender'";
                $sCon = mysqli_query($con,$sender_query);
                $sResult=mysqli_fetch_assoc($sCon);
                $sBalance=$sResult['Balance'];
                
                if($amount<$sBalance){
                    $receiver_query = "SELECT * FROM allusers WHERE name ='$receiver'";
                    $rCon = mysqli_query($con,$receiver_query);
                    $sResult = mysqli_fetch_assoc($rCon);
                    $rBalance = $sResult['Balance'];

                  
      
                   
                     echo "<h1 class='success'>Transaction Successful!</h1>
                    <p>Rs $amount has been DEBITED from $sender's account and successfully CREDITED to $receiver.</p> <br>";

                    $sBalance-=$amount;
                    $rBalance+=$amount;
                    
                    $sUpdate = "UPDATE `allusers` SET `balance` = '$sBalance' WHERE `allusers`.`name` = '$sender';";
                    $senderLogUpdate=mysqli_query($con,$sUpdate);

                    $rUpdate = "UPDATE `allusers` SET `balance` = '$rBalance' WHERE `allusers`.`name` = '$receiver';";
                    $recevierLogUpdate=mysqli_query($con,$rUpdate);

                    $history_query = "INSERT INTO `transfer_history` (`sender`, `receiver`, `amount`, `time`) VALUES ('$sender', '$receiver', '$amount', current_timestamp())";
                    $history = mysqli_query($con,$history_query);
                 
                     echo '<script> 
                     Swal.fire({
                         title: "Transaction Success",
                         text: "Congratulations! You Have Made A Successful Transaction",
                         button: "Close",  
                            
                     });
                    
                     </script>';
                   
                          
                }
                else {
                    echo "<h1 class='error'>Transaction Failed!</h1>
                <p>Insufficient balance. Please recharge your account to proceed furthur.</p>";

                echo '<script> 
                Swal.fire({
                    icon: "warning",
                    title: "Insufficient Balance",
                    text:  "Account Balance of sender is not enough to make this transaction !",
                    button: "Close",  
                       
                });
                </script>';
            }
        }
            else if($sender == $receiver){
                echo "<h1 class='error'>Transaction Failed!</h1>
                <p>Sender and receiver cannot be same. Please select a different user.</p>";
               
                // echo '<script> 
                // const Toast = Swal.mixin({
                //     toast: true,
                //     position: "bottom-end",
                //     showConfirmButton: false,
                //     timer: 3000,
                //     timerProgressBar: true,
                //     didOpen: (toast) => {
                //       toast.addEventListener("mouseenter", Swal.stopTimer)
                //       toast.addEventListener("mouseleave", Swal.resumeTimer)
                //     }
                //   })
                  
                //   Toast.fire({
                //     icon: "success",
                //     title: "Signed in successfully"
                //   })
                //   </script>';

                  echo '<script> 
                  Swal.fire({
                   icon: "warning",
                    title: "Sender and receiver cannot be the same !",
                    button: "Close",  
                     
                      });
                  </script>';

                
            }
        ?>
        <a href='./transfer.php' class="btn">Back &#8626; </a>
        <a href='./History.php' class="btn">Transaction History &#x1F50E;</a>
        </div>
    </div>
    
 
</body>
</html>