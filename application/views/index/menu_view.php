	<div id="menubar">
		<ul id="menu">
        <?php
        	switch($current_menu)
			{
				case 'home':
					echo '<li class="current"><a href="'.base_url().'">首页</a></li>';
					echo '<li><a href="'.site_url('advertiser').'">商家</a></li>';
					echo '<li><a href="'.site_url('news').'">资讯</a></li>';
			//		echo '<li><a href="'.site_url('consult').'">求助</a></li>';
					echo '<li><a href="contact.html">关于我们</a></li>';
					break;
				case 'advertiser':
					echo '<li><a href="'.base_url().'">首页</a></li>';
					echo '<li class="current"><a href="'.site_url('advertiser').'">商家</a></li>';
					echo '<li><a href="'.site_url('news').'">资讯</a></li>';
			//		echo '<li><a href="'.site_url('consult').'">求助</a></li>';
					echo '<li><a href="contact.html">关于我们</a></li>';
					break;
				case 'news':
					echo '<li><a href="'.base_url().'">首页</a></li>';
					echo '<li><a href="'.site_url('advertiser').'">商家</a></li>';
					echo '<li class="current"><a href="'.site_url('news').'">资讯</a></li>';
			//		echo '<li><a href="'.site_url('consult').'">求助</a></li>';
					echo '<li><a href="contact.html">关于我们</a></li>';
					break;
		/*		case 'consult':
					echo '<li><a href="'.base_url().'">首页</a></li>';
					echo '<li><a href="'.site_url('advertiser').'">商家</a></li>';
					echo '<li><a href="'.site_url('news').'">资讯</a></li>';
					echo '<li  class="current"><a href="'.site_url('consult').'">求助</a></li>';
					echo '<li><a href="contact.html">关于我们</a></li>';
					break;      */
				case 'aboutus':
					echo '<li><a href="'.base_url().'">首页</a></li>';
					echo '<li><a href="'.site_url('advertiser').'">商家</a></li>';
					echo '<li><a href="'.site_url('news').'">资讯</a></li>';
			//		echo '<li><a href="'.site_url('consult').'">求助</a></li>';
					echo '<li class="current"><a href="contact.html">关于我们</a></li>';
					break;
			}		
        ?>
    	</ul>
	</div>    
</div>