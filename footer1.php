</div>
		
	<div id="footer">
		<p>
			<?php 
				include('config.php');
				$statement = $db->prepare("SELECT * FROM tbl_footer WHERE id=1");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{
					echo $row['description'];
				}
			?>
		</p>
	</div>
</body>
</html>