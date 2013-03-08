
<!DOCTYPE HTML>
<html>
<head>
  <title><?php echo $title; ?></title>
  <meta name="description" content="<?php echo $description;?>" />
  <meta name="keywords" content="<?php echo $keywords; ?>" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>source/index/css/style.css" />
</head>
<script type="text/javascript">
            var childWindow;
            function toQzoneLogin()
            {
               childWindow = window.open("<?php echo site_url('login/qqlogin');?>","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
             //	  childWindow = showModalDialog("<?php echo site_url('login/qqlogin');?>","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
            } 
            
            function closeChildWindow()
            {
                childWindow.close();
            }
        </script>

<body>
	<div id="main">
    	<div id="header">
      		<div id="logo">
        		<h1>数码广场</h1>
        		<h2>--<a href="<?php echo site_url('login/logout');?>">退出</a></h2>
        		<div class="slogan">
        			
        		<?php
        		//	$userinfo = $_SESSION['userinfo'];
        			if(count($userinfo) > 2)
					{
				?>
					<div style="float: left; width:auto">
						<div style="float: left"><img src="<?php echo $userinfo['figureurl_1'];?>"></div>
						<div style="float:left; padding-top:17px; margin-left: 5px"><strong><?php echo $userinfo['nickname'];?></strong></div>
					</div>
				<?php		
					}else {
        		?>
        			<table id="loginbar" cellpadding="0" cellspacing="0">
        				<tr>
        					<td><a href="#" onclick='toQzoneLogin()'><img src="<?php echo base_url();?>source/index/images/qq_login.png"></td>
        		<!--			<td><a href="#" onclick='toQzoneLogin()'><img src="<?php echo base_url();?>source/index/images/weibo_login.png"></td>    -->
        				</tr>	
        		<?php } ?>	
        			</table>
        		</div>
      		</div>