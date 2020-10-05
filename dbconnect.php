<?php
$DB_SERVER="localhost";
$DB_USERNAME="root";
$DB_PASSWORD=" ";
$DB_NAME="bmt";
$link=mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_NAME);
if(mysqli_connect_errno())
{
	die ("connection faild".mysqli_connect_error());
}
?>