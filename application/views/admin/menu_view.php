<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
		<link href="<?php echo base_url();?>source/admin/css/general.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  background: #FFF;
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url(<?php echo base_url();?>source/admin/images/menu_minus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(<?php echo base_url();?>source/admin/images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(<?php echo base_url();?>source/admin/images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
</style>

	</head>
	<body>
		<div id="tabbar-div">
			<p>
				<span style="float:right; padding: 3px 5px;">
					<a href="javascript:toggleCollapse();"><img id="toggleImg" src="<?php echo base_url();?>source/admin/images/menu_minus.gif" width="9" height="9" border="0" alt="闭合"></a>
				</span>
				<span class="tab-front" id="menu-tab">菜单</span>
			</p>
		</div>
		<div id="main-div">
			<div id="menu-list">
				<ul>
					<li class="explode" key="02_cat_and_goods" name="menu">商家管理        
						<ul>
							<li class="menu-item"><a href="<?php echo site_url('admin/advertiser');?>" target="main-frame">商家列表</a></li>
							<li class="menu-item"><a href="<?php echo site_url('admin/category/advertiser');?>" target="main-frame">商家分类</a></li>
							<li class="menu-item"><a href="#" target="main-frame"><span style="color:#ff9955;">商家点评</span></a></li>
						</ul>
					</li>
					<li class="explode" key="03_promotion" name="menu">地区管理        
						<ul>
							<li class="menu-item"><a href="<?php echo site_url('admin/area'); ?>" target="main-frame">地区列表</a></li>
						</ul>
					</li>
					<li class="explode" key="04_order" name="menu">资讯管理        
						<ul>
							<li class="menu-item"><a href="<?php echo site_url('admin/article');?>" target="main-frame">资讯列表</a></li>
							<li class="menu-item"><a href="<?php echo site_url('admin/article/add');?>" target="main-frame">添加资讯</a></li>
							<li class="menu-item"><a href="<?php echo site_url('admin/category/article');?>" target="main-frame">资讯类型</a></li>
						</ul>
					</li>
					<li class="explode" key="05_banner" name="menu">网站设置        
						<ul>
							<li class="menu-item"><a href="#" target="main-frame"><span style="color:#ff9955;">友情链接</span></a></li>
						</ul>
					</li>
<!-- 
  <li class="explode" key="07_content" name="menu">
  <li class="explode" key="08_members" name="menu">
  <li class="explode" key="10_priv_admin" name="menu">
  <li class="explode" key="11_system" name="menu"> 
  <li class="explode" key="12_template" name="menu">
  
 -->
</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>
<div id="help-content"></div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>source/admin/js/global.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>source/admin/js/utils.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>source/admin/js/transport.js"></script>
<script language="JavaScript">
<!--
var collapse_all = "闭合";
var expand_all = "展开";
var collapse = true;

function toggleCollapse()
{
  var items = document.getElementsByTagName('LI');
  for (i = 0; i < items.length; i++)
  {
    if (collapse)
    {
      if (items[i].className == "explode")
      {
        toggleCollapseExpand(items[i], "collapse");
      }
    }
    else
    {
      if ( items[i].className == "collapse")
      {
        toggleCollapseExpand(items[i], "explode");
        ToggleHanlder.Reset();
      }
    }
  }

  collapse = !collapse;
  document.getElementById('toggleImg').src = collapse ? '<?php echo base_url();?>source/admin/images/menu_minus.gif' : '<?php echo base_url();?>source/admin/images/menu_plus.gif';
  document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
}

function toggleCollapseExpand(obj, status)
{
  if (obj.tagName.toLowerCase() == 'li' && obj.className != 'menu-item')
  {
    for (i = 0; i < obj.childNodes.length; i++)
    {
      if (obj.childNodes[i].tagName == "UL")
      {
        if (status == null)
        {
          if (obj.childNodes[1].style.display != "none")
          {
            obj.childNodes[1].style.display = "none";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            obj.childNodes[1].style.display = "block";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          break;
        }
        else
        {
          if( status == "collapse")
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          obj.childNodes[1].style.display = (status == "explode") ? "block" : "none";
        }
      }
    }
  }
}
document.getElementById('menu-list').onclick = function(e)
{
  var obj = Utils.srcElement(e);
  toggleCollapseExpand(obj);
}

document.getElementById('tabbar-div').onmouseover=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-back")
  {
    obj.className = "tab-hover";
  }
}

document.getElementById('tabbar-div').onmouseout=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-hover")
  {
    obj.className = "tab-back";
  }
}

document.getElementById('tabbar-div').onclick=function(e)
{
  var obj = Utils.srcElement(e);

 // var mnuTab = document.getElementById('menu-tab');
  var hlpTab = document.getElementById('help-tab');
  var mnuDiv = document.getElementById('menu-list');
  var hlpDiv = document.getElementById('help-div');

  //if (obj.id == 'menu-tab')
//  {
//    mnuTab.className = 'tab-front';
//    hlpTab.className = 'tab-back';
//    mnuDiv.style.display = "block";
//    hlpDiv.style.display = "none";
//  }

  if (obj.id == 'help-tab')
  {
    mnuTab.className = 'tab-back';
    hlpTab.className = 'tab-front';
    mnuDiv.style.display = "none";
    hlpDiv.style.display = "block";

    loc = parent.frames['main-frame'].location.href;
    pos1 = loc.lastIndexOf("/");
    pos2 = loc.lastIndexOf("?");
    pos3 = loc.indexOf("act=");
    pos4 = loc.indexOf("&", pos3);

    filename = loc.substring(pos1 + 1, pos2 - 4);
    act = pos4 < 0 ? loc.substring(pos3 + 4) : loc.substring(pos3 + 4, pos4);
    loadHelp(filename, act);
  }
}

/**
 * 创建XML对象
 */
function createDocument()
{
  var xmlDoc;

  // create a DOM object
  if (window.ActiveXObject)
  {
    try
    {
      xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
    }
    catch (e)
    {
      try
      {
        xmlDoc = new ActiveXObject("Msxml2.DOMDocument.5.0");
      }
      catch (e)
      {
        try
        {
          xmlDoc = new ActiveXObject("Msxml2.DOMDocument.4.0");
        }
        catch (e)
        {
          try
          {
            xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
          }
          catch (e)
          {
            alert(e.message);
          }
        }
      }
    }
  }
  else
  {
    if (document.implementation && document.implementation.createDocument)
    {
      xmlDoc = document.implementation.createDocument("","doc",null);
    }
    else
    {
      alert("Create XML object is failed.");
    }
  }
  xmlDoc.async = false;

  return xmlDoc;
}

//菜单展合状态处理器
var ToggleHanlder = new Object();

Object.extend(ToggleHanlder ,{
  SourceObject : new Object(),
  CookieName   : 'Toggle_State',
  RecordState : function(name,state)
  {
    if(state == "collapse")
    {
      this.SourceObject[name] = state;
    }
    else
    {
      if(this.SourceObject[name])
      {
        delete(this.SourceObject[name]);
      }
    }
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, this.SourceObject.toJSONString(), date.toGMTString());
  },

  Reset :function()
  {
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, "{}" , date.toGMTString());
  },

  Load : function()
  {
    if (document.getCookie(this.CookieName) != null)
    {
      this.SourceObject = eval("("+ document.getCookie(this.CookieName) +")");
      var items = document.getElementsByTagName('LI');
      for (var i = 0; i < items.length; i++)
      {
        if ( items[0].getAttribute("name") == "menu")
        {
          for (var k in this.SourceObject)
          {
            if ( typeof(items[i]) == "object")
            {
              if (items[i].getAttribute('key') == k)
              {
                toggleCollapseExpand(items[i], this.SourceObject[k]);
                collapse = false;
              }
            }
          }
        }
     }
    }
    document.getElementById('toggleImg').src = collapse ? '<?php echo base_url();?>source/admin/images/menu_minus.gif' : '<?php echo base_url();?>source/admin/images/menu_plus.gif';
    document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
  }
});

ToggleHanlder.CookieName += "_1";
//初始化菜单状态
ToggleHanlder.Load();

//-->
</script>


</body></html>
