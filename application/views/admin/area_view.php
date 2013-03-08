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
			<FORM method=post name=theForm action="<?php echo site_url('admin/area/add');?>">
				新增<?php echo $subtitle; ?>: 
					<INPUT name=category maxLength=150 size=40>
					<INPUT type="hidden" name=level value=<?php echo $level?>>
					<INPUT type="hidden" name=parent_id value=<?php echo $parent_id?>>
					<INPUT class=button value=" 确定 " type=submit> 
			</FORM>
		</DIV>
		<DIV class=list-div>
			<TABLE id=listTable cellSpacing=1 cellPadding=3>
  				<TBODY>
  					<TR>
    					<TH><?php echo $subtitle; ?></TH>
    				</TR>
    			</TBODY>
    		</TABLE>
    	</DIV>
	<DIV id=listDiv class=list-div>
		<TABLE id=listTable cellSpacing=1 cellPadding=3>
  			<TBODY>
  			<?php
  				$i = 0;
  				foreach ($area as $row) {
					  if($i%4 == 0)
					  {
					  	echo '<TR>';
					  }
  			?>
    				<TD class=first-cell align=left>
    					<SPAN onclick="listTable.edit(this, 'edit_area_name', '1'); return false;"><?php echo $row->name;?></SPAN> 
      					<SPAN class=link-span>
      					<?php
      						if($level != 3)
							{
						?>
							<A title=管理 href="<?php echo site_url('admin/area/index/'.$row->id.'/'.$row->level);?>">管理</A>&nbsp;&nbsp; 
						<?php
							}
      					?>
      						
      						<A title=管理 href="<?php echo site_url('admin/area/rename/'.$row->id);?>">重命名</A>&nbsp;&nbsp; 
      						<A title=删除  onclick="javascript:confirm('你确认删除此条记录吗？')" href="<?php echo site_url('admin/area/delete/'.$row->id.'/'.$row->parent_id.'/'.$row->level); ?>">删除</A> 
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
