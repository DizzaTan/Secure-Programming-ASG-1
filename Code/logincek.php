<?php
session_start();
include "koneksi.php";


$username = $_POST['lgn'];
$pass     = md5($_POST['pass']);

$mySql = "SELECT * FROM member WHERE username= '$username' AND password='$pass'";
$myQry = mysqli_query($koneksidb, $mySql) or die ("Query Salah : ".mysql_error());
$row = mysqli_fetch_array($myQry);


if (isset($row['username']) && isset($row['password'])) {
    
        $_SESSION['SES_LOGIN'] = $row['username'];
        $_SESSION['SES_ID'] = $row['id'];
        $_SESSION['SES_USER'] = $row['first_name'] . " " . $row['last_name'];
        $_SESSION['SES_SECURITY'] = "34313123sdsdfsdf";
		 
        echo "<meta http-equiv='refresh' content='0; url=main_form.php'>"; 
} else {
    echo "<script>alert('Username or Password not correct...... !!!');</script>";
    echo "<script>location='index.html';</script>";
}
?>
