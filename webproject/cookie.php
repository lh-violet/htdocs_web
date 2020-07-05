<?php
if(isset($_COOKIE['username'])){
   $username = $_COOKIE['username'];
   $login    = 1;
}else{
   $login    = 0;
}
?>