<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML xmlns="http://www.w3.org/1999/xhtml">
	<HEAD>
		<TITLE>ECSHOP 管理中心 - <?php echo $title;?></TITLE>
		<META name=robots content="noindex, nofollow">
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/general.css">
		<LINK rel=stylesheet type=text/css href="<?php echo base_url();?>source/admin/css/main.css">
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>plugin/ueditor/editor_config.js"></script>
    	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>plugin/ueditor/editor_all.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plugin/ueditor/themes/default/ueditor.css"/>
		<META name=GENERATOR content="MSHTML 9.00.8112.16441">		
	</HEAD>
	<BODY>
		<H1>
			<SPAN class=action-span><A href="<?php echo site_url('admin/article');?>">资讯列表</A></SPAN> 
			<SPAN class=action-span1><A href="<?php echo site_url('admin/admin');?>">ECSHOP 管理中心</A> </SPAN>
			<SPAN id=search_id class=action-span1>- <?php echo $title;?> </SPAN>
			<DIV style="CLEAR: both"></DIV>
		</H1>
	<!-- start goods form -->
		<DIV class=tab-div>
			<DIV id=tabbody-div>
				<FORM method=post name=theForm action="<?php echo site_url('admin/article/add_action');?>">
					<TABLE id=general-table width="90%">
  						<TBODY>
  							<TR>
    							<TD class=narrow-label>资讯标题</TD>
    							<TD><INPUT name=title maxLength=60 size=30><SPAN class=require-field>*</SPAN></TD>
    						</TR><!--  -->
  							<TR>
    							<TD class=narrow-label>资讯分类 </TD>
    							<TD>
    								<SELECT name=category> 
    									<OPTION selected value=0>请选择...</OPTION> 
    							<?php
    								foreach ($category->result() as $row) {
										echo "<OPTION value=$row->id >$row->name</OPTION>";
									}
    							?>
    									
    								</SELECT> 
    								<SPAN class=require-field>*</SPAN>
    							</TD>
    						</TR><!--  -->
  							<TR>
    							<TD class=narrow-label>是否显示</TD>
    							<TD>
    								<INPUT name=statue value=1 CHECKED type=radio> 显示 
    								<INPUT name=statue value=0 type=radio> 不显示
    								<SPAN class=require-field>*</SPAN> 
    							</TD>
    						</TR>
  						</TBODY>
  					</TABLE>
  					<br>
  					<div align="center">
  						<textarea id="myEditor" name="content" style="width:800px;"></textarea>
        				<script type="text/javascript">
        					var editor = new baidu.editor.ui.Editor();
        					editor.render( 'myEditor' );
    					</script>
  					</div>
  					<br>
					<DIV class=button-div>
						<INPUT class=button value=" 确定 " type=submit> 
						<INPUT class=button value=" 重置 " type=reset> 
					</DIV>
				</FORM>
			</DIV>
		</DIV>
	</BODY>
</HTML>
