<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 

	//error_reporting(0);
	
	$merchant_data='226292';
//	$working_key='C6B73D4C552683B50A859D3E0C449D33';//Shared by CCAVENUES
//	$access_code='AVMJ02FL43BM51JMMB';//Shared by CCAVENUES
	
// live credentials	
	$working_key= '449E060CE890459DE29D0679E455742D';//Shared by CCAVENUES
	$access_code= 'AVVU87GI67AS14UVSA';//Shared by CCAVENUES
	
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	//print_r($merchant_data);
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<!--<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> -->
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

