<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<TITLE>ECSHOP 管理中心 - <?php echo $title;?></TITLE>
		<META name=robots content="noindex, nofollow">
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/general.css">
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/main.css">
		<META name=GENERATOR content="MSHTML 9.00.8112.16441">
	</HEAD>
	<BODY>
		<H1>
			<SPAN class=action-span><A href="<?php echo site_url('admin/article/add');?>">添加新资讯</A></SPAN> 
			<SPAN class=action-span1><A href="<?php echo site_url('admin/admin');?>">ECSHOP 管理中心</A></SPAN>
			<SPAN id=search_id class=action-span1>- <?php echo $title;?> </SPAN>
			<DIV style="CLEAR: both"></DIV>
		</H1>
		<DIV class=form-div>
			<FORM name=searchForm action=javascript:searchArticle()>
				<IMG border=0 alt=SEARCH src="<?php echo base_url();?>source/admin/images/icon_search.gif" width=26 height=22> 
				<SELECT name=category> 
  					<OPTION selected value=0>全部分类</OPTION> 
  				<?php 
  					foreach ($category['key']->result() as $row) {
						  echo "<OPTION value=$row->id> $row->name</OPTION>";
					  }
  				?>
  				</SELECT> 
  				文章标题 <INPUT id=keyword name=keyword> 
  				<INPUT class=button value=" 搜索 " type=submit> 
			</FORM>
		</DIV>
		<FORM method=post name=listForm action=>
			<DIV id=listDiv class=list-div>
				<TABLE id=list-table cellSpacing=1 cellPadding=3>
  					<TBODY>
  						<TR>
    						<TH>编号<IMG src="<?php echo base_url();?>source/admin/images/sort_desc.gif"></TH>
    						<TH>文章标题</TH>
    						<TH>文章分类</TH>
    						<TH>是否显示</TH>
    						<TH>添加日期</TH>
    						<TH>操作</TH>
    					</TR>
    				<?php
    					$count = 1;
    					foreach ($article->result() as $row) {
    				?>
  						<TR align="center">
    						<TD><SPAN><?php echo $count;?></SPAN></TD>
    						<TD class=first-cell><SPAN><?php echo $row->title;?></SPAN></TD>
    						<TD><SPAN><?php echo $row->category;?></SPAN></TD>
    					<?php
    						if($row->statue)
							{
								echo '<TD align=center><SPAN><IMG src="'.base_url().'source/admin/images/yes.gif"></SPAN></TD>';
							}else {
								echo '<TD align=center><SPAN><IMG src="'.base_url().'source/admin/images/no.gif"></SPAN></TD>';
							}
    					?>
    						<TD align=center><SPAN><?php echo date('Y-m-d h:i', $row->date);?></SPAN></TD>
    						<TD noWrap align=center>
    							<SPAN>
    								<A title=查看 href="#" target=_blank>
    								<IMG border=0 src="<?php echo base_url();?>source/admin/images/icon_view.gif" width=16 height=16></A>&nbsp; 
      								<A title=编辑 href="#">
      								<IMG border=0 src="<?php echo base_url();?>source/admin/images/icon_edit.gif" width=16 height=16></A>&nbsp; <!--  -->
      								<A title=移除 onclick="javascript:confirm('你确认删除此条记录吗？')" href="<?php echo site_url('admin/article/delete/'.$row->id);?>">
      								<IMG border=0 src="<?php echo base_url();?>source/admin/images/icon_trash.gif" width=16 height=16></A><!--  -->
      							</SPAN> 
      						</TD>
      					</TR>
      				<?php $count++;} ?>	
  						<TR> 
    						<TD colSpan=8 noWrap align=right>
      							<DIV id=turn-page>
      								总计 <SPAN id=totalRecords>10</SPAN> 
      								个记录分为 <SPAN id=totalPages>1</SPAN> 
      								页当前第 <SPAN id=pageCurrent>1</SPAN> 
      								页，每页 <INPUT id=pageSize value=15 size=3> 
      								<SPAN id=page-link>
      									<A href="javascript:listTable.gotoPageFirst()">第一页</A> 
      									<A href="javascript:listTable.gotoPagePrev()">上一页</A> 
      									<A href="javascript:listTable.gotoPageNext()">下一页</A> 
      									<A href="javascript:listTable.gotoPageLast()">最末页</A> 
      								</SPAN>
      							</DIV>
      						</TD>
      					</TR>
      				</TBODY>
      			</TABLE>
      		</DIV>
		</FORM>
	</BODY>
</HTML>
