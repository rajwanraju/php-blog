<?php
$user="root";
$pass ="";
try {
    $db = new PDO('mysql:host=localhost;dbname=my_blog', $user, $pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	 
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>