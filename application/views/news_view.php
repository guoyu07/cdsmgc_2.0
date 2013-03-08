<div id="content">
<?php
	if(count($news) > 0)
	{
		foreach ($news as $row) {
		echo "<table style='width:100%; border-spacing:0;'>";
		echo "<tr><td><h4>".$row['title']."</h4></td></tr>";
		echo "<tr><td>".$row['content']."</td></tr>";
		echo "<tr><td>分类：".$row['category']."</td><td>发表日期：".$row['date']."</td></tr>";
		echo "</table>";
		}
		echo "<table style='width:100%; border-spacing:0;'>";
		echo "<tr align='right'><td>".$pagination."</td></tr>";
		echo "</table>";
	}
	
?>
	
          
          
          
        
</div>