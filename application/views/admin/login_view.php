<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>ECSHOP 管理中心</title>
		<link href="<?php echo base_url();?>source/admin/css/general.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>source/admin/css/main.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			body {
				color: white;
			}
		</style>
	</head>
	<body style="background: #278296">
		<form method="post" action="<?php echo site_url('login/login_action');?>" name="login_form">
			<table cellspacing="0" cellpadding="0" style="margin-top: 100px" align="center">
				<tbody>
					<tr>
						<td><img src="<?php echo base_url();?>source/admin/images/login.png" width="178" height="256" border="0" alt="ECSHOP"></td>
						<td style="padding-left: 50px">
							<table>
								<tbody>
									<tr>
										<td>管理员姓名：</td>
										<td><input type="text" name="userid"></td>
									</tr>
									<tr>
										<td>管理员密码：</td>
										<td><input type="password" name="password"></td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="checkbox" value="1" name="remember" id="remember">
											<label for="remember">请保存我这次的登录信息。</label>
										</td>
									</tr>
									<tr><td>&nbsp;</td><td><input type="submit" value="进入管理中心" class="button"></td></tr>
									<tr>
										<td colspan="2" align="right">» <a href="<?php echo base_url();?>" style="color:white">返回首页</a> » <a href="http://www.lazy360.com/admin/get_password.php?act=forget_pwd" style="color:white">您忘记了密码吗?</a></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
</body></html>
