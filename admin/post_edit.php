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
<th> <textarea name="description" cols="60" rows="20">
Refers to textual data in ASCII format. Plain text is the most portable format because it is supported by nearly every application on every machine. It is quite limited, however, because it cannot contain any formatting commands
Refers to textual data in ASCII format. Plain text is the most portable format because it is supported by nearly every application on every machine. It is quite limited, however, because it cannot contain any formatting commands
Refers to textual data in ASCII format. Plain text is the most portable format because it is supported by nearly every application on every machine. It is quite limited, however, because it cannot contain any formatting commands</textarea>
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
<tr> <th>Image</th></tr>
<tr><th>
<input type="file" name=""></th></tr>


<tr><th>Select Catagory</th></tr>
<tr><th> 
<select name="">
<option value="">Tutorial</option>
<option value="">Technology</option>
<option value="">Tech World</option>
</select>
</th></tr>

<tr><th>Select Tag</th></tr>
<tr><th> 
<input type="checkbox" name="">Tutorial
<input type="checkbox" name="">Technology
<input type="checkbox" name="">Tech World

</th></tr>

<th> <input type="submit" name="" value="Save"></th>
</tr>
</table>
</form>
<?php include("footer.php");?>
