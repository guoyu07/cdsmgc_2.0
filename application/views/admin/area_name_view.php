<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<TITLE>Smgc.in 管理中心 - <?php echo $title;?></TITLE>
		<META name=robots content="noindex, nofollow">
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/general.css">
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/main.css">
		<META name=GENERATOR content="MSHTML 9.00.8112.16441">
	</HEAD>
	<BODY>
		<H1>
			<SPAN class=action-span1><A href="<?php echo site_url('admin/admin');?>">Smgc.in 管理中心</A> </SPAN>
			<SPAN id=search_id class=action-span1>- <?php echo $title;?> </SPAN>
			<DIV style="CLEAR: both"></DIV>
		</H1>
		<DIV class=main-div>
			<FORM  method=post name=theForm action=<?php echo site_url('admin/area/rename_action');?>>
				<TABLE cellSpacing=1 cellPadding=3 width="100%">
  					<TBODY>
  						<TR>
    						<TD class=label>地区名称:</TD>
    						<TD><INPUT name=name size=40 value=<?php echo $area->name;?>> <SPAN class=require-field>*</SPAN></TD>
    					</TR>
  						<TR align=center>
    						<TD colSpan=2>
    							<INPUT name=parent_id type=hidden value=<?php echo $area->parent_id;?>> 
    							<INPUT name=level type=hidden value=<?php echo $area->level;?>> 
    							<INPUT name=id type=hidden value=<?php echo $area->id;?>> 
    							<INPUT class=button value=" 确定 " type=submit> 
    							<INPUT class=button value=" 重置 " type=reset> 
    						</TD>
    					</TR>
    				</TBODY>
    			</TABLE>
    		</FORM>
    	</DIV>
</BODY></HTML>
