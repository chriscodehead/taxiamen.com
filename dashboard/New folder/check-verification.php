<?php
if($sqli->getRow($sqli->getEmail($_SESSION['user_code']),'payment_activation_status')=='no' || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'usdt')=="" || $sqli->getRow($sqli->getEmail($_SESSION['user_code']),'email_activation')=="no"){ header("location:verify-account");}
?>