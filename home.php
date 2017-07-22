<?php include('header1.php'); ?>

<?php
include "config.php";

			$adjacents = 7;
										
					
			
			
			$statement = $db->prepare("SELECT * FROM post ORDER BY post_id DESC");
			$statement->execute();
			$total_pages = $statement->rowCount();
							
			
			$targetpage = $_SERVER['PHP_SELF'];  
			$limit = 5;                                 
			$page = @$_GET['page'];
			if($page) 
				$start = ($page - 1) * $limit;        
			else
				$start = 0;
			
						
			$statement = $db->prepare("SELECT * FROM post ORDER BY post_id DESC LIMIT $start, $limit");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
			
			if ($page == 0) $page = 1;                  
			$prev = $page - 1;                         
			$next = $page + 1;                         
			$lastpage = ceil($total_pages/$limit);  
			$lpm1 = $lastpage - 1;   
			$pagination = "";
			if($lastpage > 1)
			{   
				$pagination .= "<div class=\"pagination\">";
				if ($page > 1) 
					$pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
				else
					$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
				if ($lastpage < 7 + ($adjacents * 2)) 
				{   
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))   
				{
					if($page < 1 + ($adjacents * 2))        
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
					}
					else
					{
						$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
						}
					}
				}
				if ($page < $counter - 1) 
					$pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
				else
					$pagination.= "<span class=\"disabled\">next &#187;</span>";
				$pagination.= "</div>\n";       
			}
	

foreach($result as $row)
{
	
	?>
	
	<div class="post">
		<h2><?php echo $row['post_title']; ?></h2>
		
		<div class="description">
			<img src="upload/<?php echo $row['post_image']; ?>" alt="" width="200" style="float:left;" />
			<?php
				$pieces = explode(" ", $row['post_description']);
				$final_words = implode(" ", array_splice($pieces, 0, 200));
				$final_words = $final_words.' ...';
			?>
			<?php echo $final_words; ?>
		</div>
		<p class="comments">
		Comments - 
		
		<?php
		$statement1 = $db->prepare("SELECT * FROM tbl_comment WHERE post_id=? AND active=1");
		$statement1->execute(array($row['post_id']));
		$total_num = $statement1->rowCount();
		echo $total_num;
		?>
		
		
		
		<span>|</span> <a href="home1.php?id=<?php echo $row['post_id']; ?>">Continue Reading</a></p>
	</div>
	
	
	<?php
	
}
?>


<div class="pagination">
<?php 
echo $pagination; 
?>
</div>







<?php include('footer1.php'); ?>