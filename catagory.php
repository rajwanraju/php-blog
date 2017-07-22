<?php
ob_start();
session_start();
if($_SESSION['name']!='Rajwan')
{
	header('location: login.php');
}
include("config.php");
?>
<?php

if(isset($_POST['form1']))
{
	try {
		
		if(empty($_POST['cat_name'])) {
			throw new Exception("catagory Name can not be empty.");
		}
		
		$statement = $db->prepare("SELECT * FROM catagory WHERE cat_name=?");
		$statement->execute(array($_POST['cat_name']));
		$total = $statement->rowCount();
		
		if($total>0) {
			throw new Exception("catagory Name already exists.");
		}
		
		$statement = $db->prepare("INSERT INTO catagory (cat_name) VALUES (?)");
		$statement->execute(array($_POST['cat_name']));
		
		$success_message = "catagory name has been inserted successfully.";
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
} 



if(isset($_POST['form2']))
{
	try {
		
		if(empty($_POST['cat_name'])) {
			throw new Exception("catagory Name can not be empty.");
		}
		
		$statement = $db->prepare("UPDATE tbl_catagory SET cat_name=? WHERE cat_id=?");
		$statement->execute(array($_POST['cat_name'],$_POST['hdn']));
		
		$success_message1 = "catagory Name has been updated successfully.";
		
	}
	catch(Exception $e) {
		$error_message1 = $e->getMessage();
	}
		
}

if(isset($_REQUEST['id'])) 
{
	$id = $_REQUEST['id'];
	
	$statement = $db->prepare("DELETE FROM tbl_catagory WHERE cat_id=?");
	$statement->execute(array($id));
	
	$success_message2 = "catagory Name has been deleted successfully.";
	
}

?>
<?php include("header.php"); ?>
<h2>Add New catagory</h2>
<p>&nbsp;</p>
<?php
if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
?>
<form action="" method="post">
<table class="tbl1">
<tr>
	<td>catagory Name</td>
</tr>
<tr>
	<td><input class="short" type="text" name="cat_name"></td>
</tr>
<tr>
	<td><input type="submit" value="SAVE" name="form1"></td>
</tr>
</table>	
</form>


<h2>View  All Categories</h2>
<?php
if(isset($error_message1)) {echo "<div class='error'>".$error_message1."</div>";}
if(isset($success_message1)) {echo "<div class='success'>".$success_message1."</div>";}
if(isset($success_message2)) {echo "<div class='success'>".$success_message2."</div>";}
?>
<table class="tbl2" width="100%">
	<tr>
		<th width="5%">Serial</th>
		<th width="75%">catagory Name</th>
		<th width="15%">Action</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM catagory ORDER BY cat_name ASC");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
			
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['cat_name']; ?></td>
		<td>
			<a class="fancybox" href="#inline<?php echo $i; ?>">Edit</a>
			<div id="inline<?php echo $i; ?>" style="width:400px;display: none;">
				<h3>Edit Data</h3>
				<p>
					<form action="" method="post">
					<input type="hidden" name="hdn" value="<?php echo $row['cat_id']; ?>">
					<table>
						<tr>
							<td>catagory Name</td>
						</tr>
						<tr>
							<td><input type="text" name="cat_name" value="<?php echo $row['cat_name']; ?>"></td>
						</tr>
						<tr>
							<td><input type="submit" value="UPDATE" name="form2"></td>
						</tr>
					</table>
					</form>
				</p>
			</div>
			&nbsp;|&nbsp;
			<a onclick='return confirmDelete();' href="catagory.php?id=<?php echo $row['cat_id']; ?>">Delete</a></td>
		</tr>
		
		<?php
	}
	?>
	
	
	
	
</table>


<?php include("footer.php"); ?>			