<?php
require("config.php");
require("cookie.php");
if ($login==0){
	Header("Location: ".$uri."/webproject/login.html");
}
?>