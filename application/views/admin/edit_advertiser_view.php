<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Smgc.in 管理中心 - <?php echo $title; ?></title>
		<meta name="robots" content="noindex, nofollow">
		<link href="<?php echo base_url();?>source/admin/css/general.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>source/admin/css/main.css" rel="stylesheet" type="text/css">
		<script language='javascript' src='<?php echo base_url();?>source/admin/js/address.js' type='text/javascript' charset='utf-8'></script>
	</head> 
	<body>
		<h1>
			<span class="action-span"><a href="<?php echo site_url('admin/advertiser');?>">商家列表</a></span>
			<span class="action-span1"><a href="<?php echo site_url('admin/admin');?>">Smgc.in 管理中心</a> </span>
			<span id="search_id" class="action-span1"> - <?php echo $title; ?> </span>
			<div style="clear:both"></div>
		</h1>
		<link href="<?php echo base_url();?>source/admin/css/calendar.css" rel="stylesheet" type="text/css">
		<!-- start goods form -->
		<div class="tab-div">
			<!-- tab body -->
			<div id="tabbody-div">
				<form action="<?php echo site_url('admin/advertiser/edit_action'); ?>" method="post" name="theForm">
					<table width="90%" id="general-table" align="center">
						<tbody>
							<tr>
								<td class="label">商家名称：</td>
								<td>
									<input type="text" name="advertiser_name" value="<?php echo $advertiser[0]['name'];?>" style="float:left;color:;" size="30">
									<span class="require-field">*</span>
								</td>
							</tr>
							<tr>
								<td class="label">具体业务：</td>
								<td>
									<input type="text" name="business" value="<?php echo $advertiser[0]['business'];?>" style="float:left;color:;" size="30">
									<span class="require-field">*</span>
								</td>
							</tr>
							<tr>
								<td class="label">电话号码：</td>
								<td>
									<input type="text" name="phone" value="<?php echo $advertiser[0]['phone'];?>" style="float:left;color:;" size="30">
									<span class="require-field">*</span>
								</td>
							</tr>
							<tr>
								<td class="label">商务QQ：</td>
								<td>
									<input type="text" name="qq" value="<?php echo $advertiser[0]['qq'];?>" style="float:left;color:;" size="30">
								</td>
							</tr>
					<!--
							<tr>
								<td class="label">公司地址：</td>
								<td>
									<SELECT ID="s1" NAME="s1"  >
    									<OPTION value=<?php echo $advertiser[0]['address_id']['build']?> selected></OPTION>
   									</SELECT>
   									<SELECT ID="s2" NAME="s2"  >
    									<OPTION selected></OPTION>
   									</SELECT>
   									<SELECT ID="s3" NAME="s3">
    									<OPTION selected></OPTION>
   									</SELECT>
								</td> 
							</tr>
					-->
							<tr>
								<td class="label">公司网站：</td>
								<td>
									<input type="text" name="website" value="<?php echo $advertiser[0]['website'];?>" style="float:left;color:;" size="30">
								</td>
							</tr>
							<tr>
    							<td class="label">业务分类：</td>
    							<TD>
    						<?php
    							if(is_array($advertiser[0]['category_id']))
								{
									foreach ($category['key']->result() as $row) {
										echo '<DIV style="WIDTH: 200px; FLOAT: left">';
										echo '<LABEL for=category>';
										if(in_array($row->id, $advertiser[0]['category_id']))
										{
											echo "<INPUT id=category class=checkbox  name=categories[] value=$row->id type=checkbox checked>";
										}else {
											echo "<INPUT id=category class=checkbox  name=categories[] value=$row->id type=checkbox>";
										}
										
										echo $row->name;
										echo '</LABEL> ';
										echo '</DIV>';
									}	
								}else {
									foreach ($category['key']->result() as $row) {
										echo '<DIV style="WIDTH: 200px; FLOAT: left">';
										echo '<LABEL for=category>';
										if($row->id == $advertiser[0]['category_id'])
										{
											echo "<INPUT id=category class=checkbox  name=categories[] value=$row->id type=checkbox checked>";
										}else {
											echo "<INPUT id=category class=checkbox  name=categories[] value=$row->id type=checkbox>";
										}
										
										echo $row->name;
										echo '</LABEL> ';
										echo '</DIV>';
									}
								}
    							
    						?>
								</TD>
							</tr>
						</tbody>
					</table>
				<div align="center">
					<input type="hidden" name='address' value=<?php echo $advertiser[0]['address_id']['house'];?>>
					<input type="hidden" name="id"	value=<?php echo $advertiser[0]['id'];?>> 
					<input type="submit" value=" 确定 " class="button">
					<input type="reset" value=" 重置 " class="button">
				</div>
			</form>
		</div>
	</div>
	</body>
<script language="javascript">
	//数据源
  	var array=new Array();
	<?php
		$i=0;
		foreach ($area['key']->result_array() as $row){
			echo 'array['.$i.']=new Array("'.$row['id'].'","'.$row['parent_id'].'","'.$row['name'].'");';
			$i++;
		}
	?>
  	//这是调用代码
  	var liandong=new CLASS_LIANDONG_YAO(array) //设置数据源
  	liandong.firstSelectChange("1","s1"); //设置第一个选择框
  	liandong.subSelectChange("s1","s2"); //设置子级选择框
  	liandong.subSelectChange("s2","s3");
</script>
</html>
