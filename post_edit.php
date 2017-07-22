<?php
ob_start();
session_start();
if($_SESSION['name'] !='Rajwan')
{
	header ('location:login_page.php');
}

?>
<?php include("header.php");?>
<h2> Edit Post </h2>

<form action="">

<table>
<tr>
<th>Title</th>
</tr>
<tr>
<th> <input class="long" type="text" name="" value="Tutorial"></th>
</tr>  

<tr>
<th> <textarea name="description" cols="90" rows="30">
<script type="text/javascript">
	if ( typeof CKEDITOR == 'undefined' )
	{
		document.write(
			'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
			'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
			'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
			'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
			'value (line 32).' ) ;
	}
	else
	{
		var editor = CKEDITOR.replace( 'description' );
		//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
	}

</script>



</th></tr>
<tr><th>Featured Image</th></tr>
<tr><th><input type="file" name="post_image"></th></tr>
<tr><th>Select a Catagory</th></tr>
<tr>
<th>
<select name="cat_id">
<option value="">Select a Category</option>
<?php
$statement = $db->prepare("SELECT * FROM catagory ORDER BY cat_name ASC");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	?>
	<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
	<?php
}
?>
</select>
</th>
</tr>
<tr><th>Select a Tag</th></tr>
<tr>
<th>
<?php
$statement = $db->prepare("SELECT * FROM tag ORDER BY tag_name ASC");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
{
	?>
	<input type="checkbox" name="tag_id[]" value="<?php echo $row['tag_id']; ?>">&nbsp;<?php echo $row['tag_name']; ?><br>
	<?php
}
?>
</th>
</tr>

<th> <input type="submit" name="" value="Save"></th>
</tr>
</table>
</form>
<?php include("footer.php");?>
