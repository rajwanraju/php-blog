<html>
<head>
<title> Admin Panel</title>
<link href="style.css"  rel="stylesheet"  type="text/css"/>
<script>

function confirmDelete(){
	
	return confirm ("Do you Sure want to delete this data?");
}


</script>

<script type="text/javascript" src="fancybox/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="fancybox/main.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css" />
	
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	

</head>
<body>

<div id="wrapper">
<div id="header">
<h1> Admin Panel Dashbord.</h1>



</div>
<div id="continer"></div>
<div id="sidebar">
<h2> Page Options</h2>

<ul>
<li><a href="home.php">Home</a></li>
<li><a href="change-footer.php">Change Footer Text</a></li>
<li><a href="logout_page.php">Logout</a></li>
</ul>

<h2> Blog Options</h2>

<ul>
<li><a href="post_add.php">Add New Post</a></li>
<li><a href="post_view.php">View Post</a></li>
<li><a href="manage_catagory.php">Manage Catagory</a></li>
<li><a href="manage_tag.php">Manage tags</a></li>

</ul>




</div>
<div id="content">