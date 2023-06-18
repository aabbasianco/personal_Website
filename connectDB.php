<?php
include('config.php');
include('config2.php');
// $link=mysqli_connect("localhost","root","","minicms");
$minicms_link=mysqli_connect($nameserverDB,$usernameDB,$passDB,$nameDB);
$mysql_link=mysqli_connect($nameserverDB2,$usernameDB2,$passDB2,$nameDB2);
if(!mysqli_connect_errno()){
  $checkconnect=true;
}
else{
  $checkconnect=false;
}
