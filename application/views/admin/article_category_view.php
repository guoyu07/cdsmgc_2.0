<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<TITLE>Smgc.in管理中心 - <?php echo $title; ?></TITLE>
		<META name=robots content="noindex, nofollow">
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/general.css">
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/main.css">
		<META name=GENERATOR content="MSHTML 9.00.8112.16441">
	</HEAD>
	<BODY>
		<H1>
			<SPAN class=action-span1>
				<A href="<?php echo site_url('admin/admin'); ?>">SMGC 管理中心</A> 
			</SPAN>
			<SPAN id=search_id class=action-span1>- <?php echo $title; ?> </SPAN>
			<DIV style="CLEAR: both"></DIV>
		</H1>
		<DIV class=form-div>
			<FORM method=post name=theForm action="<?php echo site_url('admin/category/add_article');?>">
				新增商家类目: <INPUT name=category maxLength=150 size=40>
							<INPUT class=button value=" 确定 " type=submit> 
			</FORM>
		</DIV>
	<!-- start category list 
		<DIV class=list-div>
			<TABLE id=listTable cellSpacing=1 cellPadding=3>
  				<TBODY>
  					<TR>
    					<TH>一级地区</TH>
    				</TR>
    			</TBODY>
    		</TABLE>
    	</DIV>
    -->
	<DIV id=listDiv class=list-div>
		<TABLE id=listTable cellSpacing=1 cellPadding=3>
  			<TBODY>
  			<?php
  				$i = 0;
  				foreach ($category['key']->result() as $row) {
					  if($i%4 == 0)
					  {
					  	echo '<TR>';
					  }
  			?>
    				<TD class=first-cell align=left>
    					<SPAN><?php echo $row->name;?></SPAN> 
      					<SPAN class=link-span>
      						<A title=管理 href="#">管理</A>&nbsp;&nbsp; 
      						<A title=删除  onclick="javascript:confirm('你确认删除此条记录吗？')" href="<?php echo site_url('admin/category/delete_article/'.$row->id); ?>">删除</A> 
      					</SPAN>
      				</TD>
      		<?php
      				$i++;
      				if($i%4 == 0)
					{
						echo '</TR>';
					}
				}
      		?>
     	 	</TBODY>
     	</TABLE>
     </DIV>
	</BODY>
</HTML>
