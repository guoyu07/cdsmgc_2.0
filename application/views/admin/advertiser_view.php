<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $title;?></title>
		<meta name="robots" content="noindex, nofollow">
		<link href="<?php echo base_url();?>source/admin/css/general.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>source/admin/css/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>
			<span class="action-span"><a href="<?php echo site_url('admin/advertiser/add');?>">添加新商家</a></span>
			<span class="action-span1"><a href="<?php echo site_url('admin/admin')?>">Smgc.in 管理中心</a> </span>
			<span id="search_id" class="action-span1"> - 商家列表 </span>
			<div style="clear:both"></div>
		</h1>
		<!-- 商品搜索 -->
		<!-- $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ -->
		<div class="form-div">
  			<form action="javascript:searchGoods()" name="searchForm">
    			<img src="<?php echo base_url();?>source/admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        		<!-- 分类 -->
    			<select name="cat_id">
    				<option value="0">所有分类</option>
    				<option value="1">笔记本</option>
    				<option value="7">&nbsp;&nbsp;&nbsp;&nbsp;戴尔</option>
    				<option value="47">&nbsp;&nbsp;&nbsp;&nbsp;惠普</option>
    				<option value="4">&nbsp;&nbsp;&nbsp;&nbsp;华硕</option>
    				<option value="8">&nbsp;&nbsp;&nbsp;&nbsp;宏基</option>
    				<option value="5">&nbsp;&nbsp;&nbsp;&nbsp;联想</option>
    				<option value="6">&nbsp;&nbsp;&nbsp;&nbsp;THINKPAD</option>
    				<option value="2">电脑配件</option>
    				<option value="10">&nbsp;&nbsp;&nbsp;&nbsp;键盘</option>
    				<option value="22">&nbsp;&nbsp;&nbsp;&nbsp;耳机音响</option>
    				<option value="60">&nbsp;&nbsp;&nbsp;&nbsp;其它</option>
    				<option value="23">&nbsp;&nbsp;&nbsp;&nbsp;手柄</option>
    				<option value="38">&nbsp;&nbsp;&nbsp;&nbsp;电脑包</option>
    			</select>
    		<!-- 大楼 -->
    			<select name="brand_id">
    				<option value="0">所有品牌</option>
    				<option value="43">新贵</option>
    				<option value="44">海威特</option>
    				<option value="31">惠普</option>
				</select>
    			<input type="submit" value=" 搜索 " class="button">
  			</form>
		</div>
<!-- 商品列表 -->
		<form method="post" action="" name="listForm">
  		<!-- start goods list -->
  			<div class="list-div" id="listDiv">
			<table cellpadding="3" cellspacing="1">
  				<tbody>
  					<tr>
    					<th>
      						<input onclick="listTable.selectAll(this, &quot;checkboxes&quot;)" type="checkbox">
      						<a href="javascript:listTable.sort('goods_id'); ">编号</a>
      						<img src="<?php echo base_url();?>source/admin/images/sort_desc.gif">    
      					</th>
    					<th>商家名称</th>
    					<th>主营业务</th>
    					<th>联系电话</th>
    					<th>QQ</th>
    					<th>网址</th>
    					<th>类型</th>
    					<th>地址</th>
        				<th>操作</th>
  					</tr>
  					<tr></tr>
  		<?php
  		//	foreach ($advertiser->result() as $row)
  			if(count($advertiser) > 0)
			{
				for($i = 0; $i < count($advertiser); $i++)
  				{
  		?>
  					<tr align="center">
    					<td style="background-color: rgb(255, 255, 255); "><input type="checkbox" name="checkboxes[]" value=<?php echo $advertiser[$i]['id'];?>><?php echo $advertiser[$i]['id'];?></td>
    					<td class="first-cell" style="background-color: rgb(255, 255, 255); "><span><?php echo $advertiser[$i]['name'];?></span></td>
    					<td style="background-color: rgb(255, 255, 255); "><span><?php echo $advertiser[$i]['business'];?></span></td>
    					<td style="background-color: rgb(255, 255, 255); "><span><?php echo $advertiser[$i]['phone'];?></span></td>
    					<td style="background-color: rgb(255, 255, 255); "><span><?php echo $advertiser[$i]['qq'];?></span></td>
    					<td style="background-color: rgb(255, 255, 255); "><span><?php echo $advertiser[$i]['website'];?></span></td>
    					<td style="background-color: rgb(255, 255, 255); "><span>
    				<?php 
    					if(is_array($advertiser[$i]['category']))
    					{
    						for($j = 0; $j < count($advertiser[$i]['category']); $j++)
							{
								echo $advertiser[$i]['category'][$j]."&nbsp;&nbsp;&nbsp;";
							}
						}else {
							echo $advertiser[$i]['category'];
						}
    				?>
    					</span></td>          
    					<td style="background-color: rgb(255, 255, 255); "><span onclick="listTable.edit(this, &#39;edit_goods_sn&#39;, 639)"><?php echo $advertiser[$i]['address'];?></span></td>
        				<td style="background-color: rgb(255, 255, 255); ">
      						<a href="<?php echo site_url('admin/advertiser/edit/'.$advertiser[$i]['id']);?>" title="编辑"><img src="<?php echo base_url();?>source/admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
      						<a href="<?php echo site_url('admin/advertiser/delete/'.$advertiser[$i]['id']);?>" onclick="javascript:confirm('你确认删除此条记录吗？')" title="回收站"><img src="<?php echo base_url();?>source/admin/images/icon_trash.gif" width="16" height="16" border="0"></a>
      						<img src="<?php echo base_url();?>source/admin/images/empty.gif" width="16" height="16" border="0">          
      					</td>
  					</tr>
  			<?php } }?>
  				</tbody>
  			</table>
<!-- end goods list -->

<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tbody>
  	<tr>
   		<td align="right" nowrap="true">
   		<?php  echo $pagination; ?>
    	</td>
  	</tr>
</tbody></table>
</div>

</form>

<div id="footer">
共执行 7 个查询，用时 0.073641 秒，Gzip 已启用，内存占用 3.207 MB<br>
版权所有 © 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>


</body></html>