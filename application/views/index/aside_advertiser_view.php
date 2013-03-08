  <div id="site_content">
	<div id="sidebar_container">
    	<img class="paperclip" src="<?php echo base_url();?>source/index/images/paperclip.png" alt="paperclip" />
        <div class="sidebar">
        	<!-- insert your sidebar items here -->
        	<h2>商家分类</h2>
        	<ol>
        <?php
        	foreach ($category->result() as $row) {
        		if(isset($current_aside))
				{
					if($current_aside == $row->id)
					{
						echo "<li style='color:red'><h3>$row->name</h3></li>";
					}else {
						echo "<li><h3><a href='".site_url('advertiser/index/'.$row->id)."'>$row->name</a></h3></li>";
					}
				}else {
					echo "<li><h3><a href='".site_url('advertiser/index/'.$row->id)."'>$row->name</a></h3></li>";
				}
        		
				
			}
        ?>
        	</ol>
     <!--   	<h4><a>笔记本</a></h4>
        	<h5>2011-4-19</h5>
        	<p>Put your latest news item here, or anything else you would like in the sidebar!<br /><a href="#">Read more</a></p>
       -->
        </div>
    </div>