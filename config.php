<?php
// $servername = "sql313.epizy.com"; //old = sql311.epizy.com
// $username = "epiz_33718452"; //old = epiz_27654400
// $password = "Tfim1ezbexpACAP"; //old = H3yGpbbQcP6ZQU
// $database = "epiz_33718452_cash_management";  //old = epiz_27654400_cashmanagement

$servername = "localhost"; //old = sql311.epizy.com
$username = "root"; //old = epiz_27654400
$password = ""; //old = H3yGpbbQcP6ZQU
$database = "sparksfoundation";  //old = epiz_27654400_cashmanagement

$con = mysqli_connect($servername,$username,$password,$database);
if($con){
    // echo "connection successful";
}
else{
die("sorry we failed to connect:" .mysqli_connect_error());
} 
?>