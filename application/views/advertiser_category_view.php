<div id="content">
	<h2>商家列表</h2>
<!--    	<p>Tables should be used to display data and not used for laying out your website:</p>	-->
	<?php
		foreach ($advertiser as $row) {
			echo "<table style='width:100%; border-spacing:0;'>";
			echo "<tr><td>公&nbsp;&nbsp;司：</td><td>".$row['name']."</td></tr>";
			$category = '';
    		if(is_array($row['category']))
    		{
    			$count = count($row['category']);
    			for($j = 0; $j < count($row['category']); $j++)
				{
					$category .= $row['category'][$j];
					if($count > 1)
					{
						$category .= '&nbsp;&nbsp;';
						$count--;
					}
				}
			}else {
				$category = $row['category'];
			}
			echo "<tr><td>业务分类：</td><td>".$category."</td></tr>";
			echo "<tr><td>主营业务：</td><td>".$row['business']."</td></tr>";
			if(!empty($row['qq']))
			{
				echo "<tr><td>Q&nbsp;Q：</td><td>".$row['qq']."</td></tr>";
			}
			echo "<tr><td>联系电话：</td><td>".$row['phone']."</td></tr>";
			
			echo "<tr><td>公司地址：</td><td>".$row['address']."</td></tr>";
			echo "</table>";
		}
		echo "<table style='width:100%; border-spacing:0;'>";
		echo "<tr align='right'><td>".$pagination."</td></tr>";
		echo "</table>";
	//	print_r($advertiser);
	?>
</div>