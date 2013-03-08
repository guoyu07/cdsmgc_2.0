<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ECSHOP 管理中心</title>
		<meta name="robots" content="noindex, nofollow">
		<link href="<?php echo base_url();?>source/admin/css/general.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>source/admin/css/main.css" rel="stylesheet" type="text/css">
	</head>
	<body style="cursor: auto; ">
		<h1>
			<span class="action-span1"><a href="<?php echo site_url('admin/admin');?>">Smgc.in 管理中心</a> </span>
			<span id="search_id" class="action-span1"></span>
			<div style="clear:both"></div>
		</h1>
		<div class="list-div">
			<table cellspacing="1" cellpadding="3">
				<tbody>
					<tr>
						<th colspan="4" class="group-title">统计信息</th>
					</tr>
					<tr>
						<td width="20%"><a href="#">商家数量:</a></td>
						<td width="30%"><strong><?php echo $advertiser_count;?></strong></td>
						<td width="20%"><a href="#">商家总类:</a></td>
						<td width="30%"><strong><?php echo $category_count;?></strong></td>
					</tr>
					<tr>
    					<td><a href="#">地址数量:</a></td>
    					<td><strong><?php echo $address_count;?></strong></td>
    					<td><a href="#">资讯数量:</a></td>
    					<td><strong><?php echo $news_count;?></strong></td>
  					</tr>
				</tbody>
			</table>
		</div>
		<br>	
	</body>
</html>
