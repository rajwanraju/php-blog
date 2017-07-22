<?php
ob_start();
session_start();
if($_SESSION['name'] !='Rajwan')
{
	header ('location:login_page.php');
}

?>

<?php include("header.php");?>
<h2> Welcome Admin Panel</h2>
<div style="font-weight:bold;color:blue;font-size:28px; text-align:center; padding-top:10px;">

Welcome to the dashbord of<br>
Sample Blog with my PHP work.</br>
</div>
<?php include("footer.php");?>
