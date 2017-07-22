<?php
ob_start();
session_start();
if($_SESSION['name'] !='Rajwan')
{
	header ('location:login_page.php');
}
include("config.php");
?>
<?php include("header.php");?>


<h2> View All Posts </h2>


<table class="tbl_tag" width="100%">
<tr>
<th width="5%">Serial</th>
<th width="60%">Title</th>
<th width="25%">Action</th>
	</tr>
	
	<?php
	$i=0;
	$statement = $db->prepare("SELECT * FROM post ORDER BY post_id DESC");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$i++;
		?>
		
	<tr>
		<th><?php echo $i; ?></th>
		<th><?php echo $row['post_title']; ?></th>
		<th>
			<a class="fancybox" href="#inline<?php echo $i; ?>">View</a>
			<div id="inline<?php echo $i; ?>" style="width:700px;display: none;">
				<h3 style="border-bottom:2px solid #808080;margin-bottom:10px;">View All Data</h3>
				<p>
					<form action="" method="post">
					<table>
						<tr>
							<th><b>Title</b></th>
						</tr>
						<tr>
							<th><?php echo $row['post_title']; ?></th>
						</tr>
						<tr>
							<th><b>Description</b></th>
						</tr>
						<tr>
							<th><?php echo $row['post_description']; ?></th>
						</tr>
						<tr>
							<th><b>Featured Image</b></th>
						</tr>
						<tr>
							<th><img src="../uploads/<?php echo $row['post_image']; ?>" alt=""></th>
						</tr>
						<tr>
							<th><b>Category</b></th>
						</tr>
						<tr>
							<th>
								<?php
								$statement1 = $db->prepare("SELECT * FROM catagory WHERE cat_id=?");
								$statement1->execute(array($row['cat_id']));
								$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
								foreach($result1 as $row1)
								{
									echo $row1['cat_name'];
								}
								?>
							</th>
						</tr>
						<tr>
							<th><b>Tag</b></th>
						</tr>
						<tr>
							<th>
								<?php
								$arr = explode(",",$row['tag_id']);
								$count_arr = count(explode(",",$row['tag_id']));
								$k=0;
								for($j=0;$j<$count_arr;$j++)
								{
									
									$statement1 = $db->prepare("SELECT * FROM tag WHERE tag_id=?");
									$statement1->execute(array($arr[$j]));
									$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
									foreach($result1 as $row1)
									{
										$arr1[$k] = $row1['tag_name'];
									}
									$k++;
								}
								$tag_names = implode(",",$arr1);
								echo $tag_names;
								?>
							</th>
						</tr>
						<tr>
							<th><input type="submit" value="UPDATE"></th>
						</tr>
					</table>
					</form>
				</p>
			</div>
			&nbsp;|&nbsp;
			<a href="post_edit.php?id=<?php echo $row['post_id']; ?>">Edit</a>
			&nbsp;|&nbsp;
			<a onclick='return confirmDelete();' href="post_delete.php?id=<?php echo $row['post_id']; ?>">Delete</a></th>
	</tr>

			
		<?php
	}
	?>
	
	
</table>


<?php include("footer.php"); ?>			