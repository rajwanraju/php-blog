<?php
ob_start();
session_start();
if($_SESSION['name']!='Rajwan')
{
	header('location: login_page.php');
}
include("config.php");
?>

<?php
if(isset($_POST['form1'])) {
	
	try {
	
		if(empty($_POST['footer_text'])) {
			throw new Exception("Footer Text can not be empty");
		}
		
		$statement = $db->prepare("UPDATE tbl_footer SET description=? WHERE id=1");
		$statement->execute(array($_POST['footer_text']));
		
		$success_message = "Footer text is updated successfully.";
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
	
}
?>


<?php
$statement = $db->prepare("SELECT * FROM tbl_footer WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	$description = $row['description'];
}


?>
<?php include("header.php"); ?>
<h2>Change Footer text</h2>

<?php
if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>

<form action="" method="post">
<table class="tbl1">
<tr>
	<td>Footer Text</td>
</tr>
<tr>
	<td><input class="long" type="text" name="footer_text" value="<?php echo $description; ?>"></td>
</tr>
<tr>
	<td><input type="submit" value="SAVE" name="form1"></td>
</tr>
</table>	
</form>

<?php include("footer.php"); ?>			