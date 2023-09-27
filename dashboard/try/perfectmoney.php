<?php require_once('../../library.php');?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
 
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<title>Make Payment via Perfect Money</title>
</head>
<style>
	@media screen and (max-width: 320px){
		.img-responsive{
			width: 90% !important;
		}
	}
	</style>
 
<body bgcolor="#FFFFFF"> 
<h6 align="center">
 <img src="../../img/Perfect_Money.png" class="img-responsive"><br />
 <span style="color: #87930F; font-size: 30px;">AMOUNT $<?php print @number_format($_SESSION['amt'],2);?></span>
  <form action="https://perfectmoney.is/api/step1.asp" method="POST">
	<p>
	 <input type="hidden" name="PAYEE_ACCOUNT" value="U18896651">
	 <input type="hidden" name="PAYEE_NAME" value="Axitrex">
	 <input type="hidden" name="PAYMENT_AMOUNT" value="<?php print @$_SESSION['amt'];?>">
	 <input type="hidden" name="PAYMENT_UNITS" value="USD">
	 <input type="hidden" name="STATUS_URL" value="https://www.axitrex.com/dashboard/callbackP.php">
	 <input type="hidden" name="PAYMENT_URL" value="https://www.axitrex.com/dashboard/">
	 <input type="hidden" name="NOPAYMENT_URL" value="https://www.axitrex.com/dashboard/">
	 <input type="hidden" name="BAGGAGE_FIELDS" value="<?php print @$_SESSION['TIDer'];?> <?php print @$_SESSION['user_code']?>">
	 <input type="hidden" name="ORDER_NUM" value="<?php print @$_SESSION['TIDer'];?>">
	 <input type="hidden" name="PAYMENT_ID" value="<?php print @$_SESSION['TIDer'];?>">
	 <input type="hidden" name="CUST_NUM" value="<?php print @$_SESSION['user_code']?>">
	 <input style="padding: 20px; font-size: 18px; background: #8DB02F;" type="submit" name="PAYMENT_METHOD" value="CONTINUE TO PERFECT MONEY">
	</p>
  </form>
</h6>
 
<form method="POST">
    <a href="../../dashboard/"><p style="padding: 10px; background: #C0A5A6;" align="center">CANCEL</p></a>
</form>
</body>
</html>
